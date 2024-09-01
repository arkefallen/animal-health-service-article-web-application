<?php

namespace Tests\Feature\Unit;

use App\Models\Feedback;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ReviewControllerTest extends TestCase
{
        /** @test */
        public function it_updates_a_rating(): void
        {
            $this->withoutMiddleware();
            $user = User::factory()->create();
            $feedback = Feedback::factory()->create();
    
            $this->actingAs($user)
                ->put(
                    route('review.update', $feedback->id),
                    [
                        'comment' => 'New Comment',
                        'score' => 4,
                    ]
                )
                ->assertRedirect('/reviews');
        }
    
        /** @test */
        public function it_removes_a_rating(): void
        {
            $this->withoutMiddleware();
            $user = User::factory()->create();
    
            $this->actingAs($user)
                ->delete(route('review.destroy', 3))
                ->assertRedirect('/reviews');
        }
}
