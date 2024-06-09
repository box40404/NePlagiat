<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->slug(2),
            "followers" => fake()->numberBetween(0, 999999),
            "description" => fake()->sentence(),
            "tags" => fake()->word(),
            'img' => 'default',
            'user_id' => random_int(1, 255)
        ];
    }
}
