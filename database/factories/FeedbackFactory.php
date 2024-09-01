<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->name(),
            'comment' => fake()->paragraph(),
            'score' => fake()->numberBetween(1,5),
            'checkup_id' => fake()->numberBetween(1,10),
            'checkup_category' => fake()->sentence(),
            'feedback_category'=> fake()->sentence(),
            'animal_category' => fake()->sentence()
        ];
    }
}
