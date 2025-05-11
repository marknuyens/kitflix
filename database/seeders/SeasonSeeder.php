<?php

namespace Database\Seeders;

use App\Models\Season;
use App\Models\Content;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Season::factory(5)->create()->each(fn($season) =>
            Content::where('season_id', null)->take(10)->get()
                ->each(fn($content, $index) => $content->update([
                    'season_id' => $season->id,
                    'episode'   => $index + 1,
                ])));
    }
}
