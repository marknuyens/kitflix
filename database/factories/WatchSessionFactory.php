<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class WatchSessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'       => rand(1,3),
            'content_id'    => rand(1, 50),
            'played_length' => rand(1, 120),
            'is_complete'   => false,
            'is_favorite'   => collect([0, 0, 0, 0, 0, 0, 1])->random(),
            'is_offline'    => collect([0, 0, 0, 0, 0, 0, 1])->random(),
            'review_score'  => rand(1, 5),
        ];
    }
}
