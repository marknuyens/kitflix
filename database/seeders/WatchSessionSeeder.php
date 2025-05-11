<?php

namespace Database\Seeders;

use App\Models\WatchSession;
use Illuminate\Database\Seeder;

class WatchSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WatchSession::factory(50)->create();
    }
}
