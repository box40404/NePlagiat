<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $user_ids = [2, 4, 5];

        return [
            'text' => fake()->sentence(),
            'likes' => fake()->numberBetween(0, 111),
            'user_id' => $user_ids[array_rand($user_ids)],
            'post_id' => fake()->numberBetween(1, 10)
        ];
    }
}
