<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password = 'password';

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'language' => fake()->languageCode(),
            'is_child' => false,
            'is_owner' => false,
            'is_admin' => false,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
    
    /**
     * Custom seeder for Admin.
     */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'email' => 'admin@kitflix.be',
            'is_admin' => true,
        ]);
    }
    
    /**
     * Custom seeder for Owner.
     */
    public function owner(): static
    {
        return $this->state(fn (array $attributes) => [
            'email' => 'owner@kitflix.be',
            'is_owner' => true,
        ]);
    }
    
    /**
     * Custom seeder for Child.
     */
    public function child(): static
    {
        return $this->state(fn (array $attributes) => [
            'email' => 'child@kitflix.be',
            'is_child' => true,
        ]);
    }
}
