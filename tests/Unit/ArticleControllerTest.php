<?php

namespace Tests\Feature\Controller;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ArticleControllerTest extends TestCase
{
    /** @test */
    public function it_stores_new_article(): void
    {
        $this->withoutMiddleware();
        $user = User::factory()->create();
        $articleCat = ArticleCategory::factory()->create();

        $this->actingAs($user)
            ->post(
                route('article.store'),
                [
                    'title' => fake()->sentence(),
                    'content' => fake()->paragraph(),
                    'category_id' => $articleCat->id,
                    'date' => fake()->date(),
                    'author' => fake()->name()
                ]
            )
            ->assertRedirect('/article');
    }

    /** @test */
    public function it_updates_an_existing_article(): void
    {
        $this->withoutMiddleware();
        $user = User::factory()->create();

        $this->actingAs($user)
            ->put(route('article.update', 3), [
                'title' => 'New Title',
                'content' => 'New Content',
                'category_id' => 11,
                'date' => '2024-07-25',
                'author' => 'New Author'
            ])
            ->assertRedirect('/article');
    }

    /** @test */
    public function it_removes_an_existing_article(): void
    {
        $this->withoutMiddleware();
        $user = User::factory()->create();

        $this->actingAs($user)
            ->delete(route('article.delete', 3))
            ->assertRedirect('/article');
    }
}
