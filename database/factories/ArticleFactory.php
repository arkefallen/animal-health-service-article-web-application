<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Article::class;

    public function definition(): array
    {
        return [
            'title' => fake()->words(4, false),
            'content' => fake()->words(150, true),
            'category_id' => 1,
            'date' => fake()->date(),
            'author' => fake()->name()
        ];
    }
}
