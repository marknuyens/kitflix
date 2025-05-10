<?php

namespace Database\Seeders;

use App\Models\Content;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Plan;
use App\Models\Season;
use App\Models\User;
use App\Models\WatchSession;
use App\Quality;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->owner()->create();
        User::factory()->admin()->create();
        User::factory()->child()->create();
        
        User::factory(10)->create();

        Content::factory(300)->create();

        WatchSession::factory(20)->create();

        Season::factory(5)->create();

        Season::all()->each(function ($season) {
            $contents = Content::where('season_id', null)->take(10)->get();
            foreach ($contents as $index => $content) {
                // Update the content record with the current season_id and episode number
                $content->update([
                    'season_id' => $season->id,
                    'episode'   => $index + 1,
                ]);
            }
        });

        Plan::insert([
            [
                'name'         => 'Free',
                'description'  => 'Limited watching, supported by ads.',
                'price'        => 0.00,
                'max_users'    => 1,
                'max_quality'  => Quality::LOW,
                'contains_ads' => 3,
            ],
            [
                'name'         => 'Free',
                'description'  => 'Unlimited watching, and fewer ads.',
                'price'        => 2.99,
                'max_users'    => 1,
                'max_quality'  => Quality::MEDIUM,
                'contains_ads' => 2,
            ],
            [
                'name'         => 'Couple',
                'description'  => 'Shared, unlimited watching, with little ads. Perfect for couples or friends.',
                'price'        => 4.99,
                'max_users'    => 2,
                'max_quality'  => Quality::MEDIUM,
                'contains_ads' => 1,
            ],
            [
                'name'         => 'Family',
                'description'  => 'Shared, unlimited watching, with no ads. Great for families and groups.',
                'price'        => 9.99,
                'max_users'    => 6,
                'max_quality'  => Quality::HIGH,
                'contains_ads' => 0,
            ],
        ]);
    }
}
