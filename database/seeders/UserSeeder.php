<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->owner()->create();
        User::factory()->admin()->create();
        User::factory()->child()->create();

        User::factory(10)->create();
    }
}
