<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ArticleCategoryControllerTest extends TestCase
{
    /** @test */
    public function it_stores_new_article_category(): void
    {
        $this->withoutMiddleware();
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(
                route('category.store'),
                [
                    'category_name' => fake()->word()
                ]
            )
            ->assertRedirect('/category');
    }

    /** @test */
    public function it_updates_an_article_category(): void
    {
        $this->withoutMiddleware();
        $user = User::factory()->create();

        $this->actingAs($user)
            ->put(
                route('category.update', 12),
                [
                    'category_name' => 'New Category Name'
                ]
            )
            ->assertRedirect('/category');
    }

    /** @test */
    public function it_removes_an_article_category(): void
    {
        $this->withoutMiddleware();
        $user = User::factory()->create();

        $this->actingAs($user)
            ->delete(route('category.destroy', 12))
            ->assertRedirect('/category');
    }
}
