<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "text" => fake()->sentence(),
            "likes" => fake()->numberBetween(0, 999999),
            "comments" => fake()->numberBetween(0, 555555),
            "reposts" => fake()->numberBetween(0, 111111),
            "group_id" => fake()->numberBetween(1, 10)
        ];
    }
}
