<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Quality;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
