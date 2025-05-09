<?php

namespace Database\Factories;

use App\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Content>
 */
class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'season_id' => array_rand([null, rand(0,30)]),
            // 'episode'   => rand(0,10),
            'title'       => ucfirst(implode(' ', fake()->words())),
            'description' => fake()->paragraph(),
            'genre'       => Genre::random(),
            'subgenre'    => null,
            'length'      => rand(60, 120),
            'language'    => fake()->languageCode(),
            'released_at' => fake()->date(),
            'cast'        => [
                'director'         => fake()->name(),
                'producer'         => fake()->company(),
                'lead_roles'       => [fake()->name(), fake()->name(), fake()->name()],
                'supporting_roles' => [
                    fake()->name(), 
                    fake()->name(), 
                    fake()->name(), 
                    fake()->name(), 
                ],
            ],
            'safe_for_children' => rand(0, 1),
            'content_labels' => ['Explicit language', 'Violence', 'Fluffy kittens'],
            'meta_data' => [
                'Original publisher' => fake()->company(), 
                'Based on the book '.ucfirst(implode(' ', fake()->words()))
            ],
        ];
    }
}
