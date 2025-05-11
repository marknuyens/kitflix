<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Services\TheCatApi\CatImageRequest;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $image_urls = (new CatImageRequest)
            ->limit(10)->get()
            ->map(fn($image) => ['image_url' => $image['url']])
            ->toArray();

        Content::factory(500)->state(new Sequence(...$image_urls))->create();
    }
}
