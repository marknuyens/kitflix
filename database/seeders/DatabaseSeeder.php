<?php

namespace Database\Seeders;

use Database\Seeders\PlanSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * ! Please note that the running order is important
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(ContentSeeder::class);
        $this->call(SeasonSeeder::class);
        $this->call(WatchSessionSeeder::class);
    }
}
