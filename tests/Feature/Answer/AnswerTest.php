<?php

namespace Tests\Feature\Answer;

use App\Answer;
use App\Option;
use App\Question;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AnswerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $this->dev = factory(User::class)->states('dev')->create();
        $this->admin = factory(User::class)->states('admin')->create();
        $this->user = factory(User::class)->create();
        $this->guest = factory(User::class)->states('guest')->create();
    }

    /** @test */
    function guests_can_store_a_new_answer()
    {
        $this->withoutExceptionHandling();

        $guest = factory(User::class)->states('guest')->create();
        $this->actingAs($guest);

        $this->assertCount(0, Answer::all());

        $question = factory(Question::class)->create();
        $option = factory(Option::class)->create([
            'question_id' => $question->id
        ]);

        $this->postJson(route('api.answers.store'), [
            'user_id' => $guest->id,
            'question_id' => $question->id,
            'option_id' => $option->id
        ])->assertStatus(200);

        $this->assertCount(1, Answer::all());
    }

    /** @test */
    function unauthenticated_users_cannot_store_a_new_answer()
    {
        $this->withExceptionHandling();

        $guest = factory(User::class)->states('guest')->create();

        $this->assertCount(0, Answer::all());

        $question = factory(Question::class)->create();
        $option = factory(Option::class)->create([
            'question_id' => $question->id
        ]);

        $this->postJson(route('api.answers.store'), [
            'user_id' => $guest->id,
            'question_id' => $question->id,
            'option_id' => $option->id
        ])->assertStatus(401);

        $this->assertCount(0, Answer::all());
    }

    /** @test */
    function guests_can_fetch_their_own_existing_answers()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->guest);

        factory(Answer::class)->create([
            'user_id' => $this->guest->id
        ]);

        $this->getJson(route('api.answers.index'))
            ->assertStatus(200);

        $this->assertCount(1, Answer::own()->get());
    }
}
