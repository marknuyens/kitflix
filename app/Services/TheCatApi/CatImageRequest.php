<?php

namespace App\Services\TheCatApi;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class CatImageRequest
{
    /**
     * @param  PendingRequest  $request
     */
    protected PendingRequest $request;

    /**
     * @param  string  $path
     */
    protected string $path = 'search';
    
    /**
     * @param  Collection  $params
     */
    protected Collection $params;

    /**
     * Construct a new instance of The Cat API service.
     *
     * @source https://developers.thecatapi.com/view-account/ylX4blBYT9FaoVd6OhvR?report=bOoHBz-8t
     */
    public function __construct()
    {
        $this->params = collect();

        $this->request = Http::baseUrl($this->config('base_url').'/images')
            ->withHeaders(['x-api-key' => $this->config('api_key')])
            ->timeout(seconds: 5)
            ->retry(times: 3, sleepMilliseconds: 500)
            ->throw(fn() => $this->fallback());
    }

    /**
     * Limit the request's results by a specific number.
     *
     * @param  int  $limit  The maximum amount of results to load.
     */
    public function limit(int $limit = 1): self
    {
        $this->params->put('limit', $limit);

        return $this;
    }

    /**
     * Limit the request's results by a specific number.
     *
     * @param  ?int  $amount  The maximum amount of results to load.
     */
    public function page(?int $page = 0): self
    {
        $this->params->put('page', $page);

        return $this;
    }

    /**
     * The order to return the images in by their upload date.
     *
     * @param  Order  $order  The specific order to use.
     */
    public function order(Order $order): self
    {
        $this->params->put('page', $order->value);

        return $this;
    }

    /**
     * Only return images that have breed information.
     *
     * @param  bool  $has_breads  To include breads or not.
     */
    public function has_breeds(?bool $has_breeds = false): self
    {
        $this->params->put('has_breeds', $has_breeds ? 1 : 0);

        return $this;
    }

    /**
     * The IDs of the breeds to filter the images. e.g. ?breed_ids=beng,abys.
     *
     * @param  string|array|null  $breed_ids  The ids of the breeds (e.g. "beng" or "abys")
     */
    public function breed_ids(string | array | null $breed_ids)
    {
        $breed_ids = Arr::wrap($breed_ids);
        $breed_ids = count($breed_ids) > 0 ? implode(',', $breed_ids) : null;

        $this->params->put('breed_ids', $breed_ids);

        return $this;
    }

    /**
     * The IDs of the categories to filter the images. e.g. ?breed_ids=1,5,14  (docs might not be accurate).
     *
     * @param  string|array|null  $category_ids  The ids of the breeds (e.g. "beng" or "abys")
     */
    public function category_ids(string | array | null $category_ids)
    {
        $category_ids = Arr::wrap($category_ids);
        $category_ids = count($category_ids) > 0 ? implode(',', $category_ids) : null;

        $this->params->put('category_ids', $category_ids);

        return $this;
    }

    /**
     * Get all cat breeds.
     */
    public function breeds(): self
    {
        $this->path = 'breeds';

        return $this;
    }

    /**
     * Make a request to The Cat API.
     */
    public function get(array $params = [])
    {
        $params = $params ?: $this->params->toArray();
        $params = count($params) > 0 ? '?'.http_build_query($params) : null;
        
        return rescue(
            callback: fn() => $this->request->send('get', '/'.$this->path.$params)->collect(),
            rescue: fn()   => $this->fallback()
        );
    }

    /**
     * Get the fallback image in case something went wrong.
     *
     * @param  ?string  $key  The key to look for.
     * @param  ?string  $default  Any fallback value.
     */
    public function config(?string $key = null, ?string $default = null)
    {
        return config('thecatapi' . ($key ? '.' . $key : null), $default);
    }

    /**
     * Get the fallback image in case something went wrong.
     *
     * @param  array<string, string>  $params
     */
    public function fallback(): array
    {
        return [
            'url'    => url('/images/fallback_image.jpg'),
            'width'  => 772,
            'height' => 514,
        ];
    }
}
