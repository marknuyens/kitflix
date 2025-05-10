<?php

namespace App\Models;

use App\Genre;
use App\Services\TheCatApi\CatImageRequest;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class Content extends Model
{
    /** @use HasFactory<\Database\Factories\ContentFactory> */
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string|null
     */
    protected $table = 'content';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'season_id',
        'episode',
        'title',
        'description',
        'trailer_url',
        'movie_url',
        'images',
        'genre',
        'subgenre',
        'length',
        'language',
        'released_at',
        'cast',
        'safe_for_children',
        'content_labels',
        'meta_data',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'released_at'       => 'date',
            'cast'              => 'json',
            'safe_for_children' => 'boolean',
            'content_labels'    => 'json',
            'meta_data'         => 'json',
            'images'            => 'json',
            'genre'             => Genre::class,
        ];
    }

    /**
     * Get all of the seasons of the current content (show).
     */
    public function seasons(): hasMany
    {
        return $this->hasMany(Season::class);
    }

    /**
     * Get the season of the current content (episode).
     */
    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    /**
     * Get the image of the content.
     */
    public function image(): Attribute
    {
        return Attribute::get(fn() => Cache::remember(
            'content_image_' . $this->id, now()->addDay(),
            fn() => (new CatImageRequest)->get()->first() ?? null
        ));
    }
}
