<?php

namespace Tests\Feature\Question;

use App\User;
use App\Question;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();

        $this->dev = factory(User::class)->states('dev')->create();
        $this->admin = factory(User::class)->states('admin')->create();
        $this->user = factory(User::class)->create();
    }

    /** @test */
    function devs_can_create_new_questions()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->dev);

        $this->assertCount(0, Question::all());

        $this->postJson(route('api.questions.store'), [
            'name' => 'I was born',
            'type' => 'dropdown',
            'pos' => 0
        ])->assertStatus(200);

        $this->assertCount(1, Question::all());
    }

    /** @test */
    function admins_can_create_new_questions()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Question::all());

        $this->postJson(route('api.questions.store'), [
            'name' => 'I was born',
            'type' => 'dropdown',
            'pos' => 0
        ])->assertStatus(200);

        $this->assertCount(1, Question::all());
    }

    /** @test */
    function users_cannot_add_new_questions()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->user);

        $this->assertCount(0, Question::all());

        $this->postJson(route('api.questions.store'), [
            'name' => 'I was born',
            'type' => 'dropdown',
            'pos' => 0
        ])->assertStatus(401);

        $this->assertCount(0, Question::all());
    }

    /** @test */
    function unauthenticated_users_cannot_add_new_questions()
    {
        $this->withExceptionHandling();

        $this->assertCount(0, Question::all());

        $this->postJson(route('api.questions.store'), [
            'name' => 'I was born',
            'type' => 'dropdown',
            'pos' => 0
        ])->assertStatus(401);

        $this->assertCount(0, Question::all());
    }

    /** @test */
    function add_new_question_validation_fails_if_name_is_missing()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Question::all());

        $this->postJson(route('api.questions.store'), [
            'type' => 'dropdown',
            'pos' => 0
        ])->assertStatus(422);

        $this->assertCount(0, Question::all());
    }

    /** @test */
    function add_new_question_validation_fails_if_name_is_not_a_string()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Question::all());

        $this->postJson(route('api.questions.store'), [
            'name' => 42,
            'type' => 'dropdown',
            'pos' => 0
        ])->assertStatus(422);

        $this->assertCount(0, Question::all());
    }

    /** @test */
    function add_new_question_validation_fails_if_name_is_shorter_than_3_characters()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Question::all());

        $this->postJson(route('api.questions.store'), [
            'name' => 'I',
            'type' => 'dropdown',
            'pos' => 0
        ])->assertStatus(422);

        $this->assertCount(0, Question::all());
    }

    /** @test */
    function add_new_question_validation_fails_if_name_is_longer_than_255_characters()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Question::all());

        $this->postJson(route('api.questions.store'), [
            'name' => str_repeat('a', 256),
            'type' => 'dropdown',
            'pos' => 0
        ])->assertStatus(422);

        $this->assertCount(0, Question::all());
    }

    /** @test */
    function add_new_question_validation_fails_if_type_is_missing()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Question::all());

        $this->postJson(route('api.questions.store'), [
            'name' => 'I was born',
            'pos' => 0
        ])->assertStatus(422);

        $this->assertCount(0, Question::all());
    }

    /** @test */
    function add_new_question_validation_fails_if_type_is_not_one_of_those_suggested()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Question::all());

        $this->postJson(route('api.questions.store'), [
            'name' => 'I was born',
            'type' => 'something else',
            'pos' => 0
        ])->assertStatus(422);

        $this->assertCount(0, Question::all());
    }

    /** @test */
    function add_new_question_validation_fails_if_pos_is_missing()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Question::all());

        $this->postJson(route('api.questions.store'), [
            'name' => 'I was born',
            'type' => 'dropdown'
        ])->assertStatus(422);

        $this->assertCount(0, Question::all());
    }

    /** @test */
    function add_new_question_validation_fails_if_pos_is_a_string()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Question::all());

        $this->postJson(route('api.questions.store'), [
            'name' => 'I was born',
            'type' => 'dropdown',
            'pos' => 'something'
        ])->assertStatus(422);

        $this->assertCount(0, Question::all());
    }

    /** @test */
    function add_new_question_validation_fails_if_pos_is_negative()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Question::all());

        $this->postJson(route('api.questions.store'), [
            'name' => 'I was born',
            'type' => 'dropdown',
            'pos' => -1
        ])->assertStatus(422);

        $this->assertCount(0, Question::all());
    }

    /** @test */
    function add_new_question_validation_fails_if_pos_is_greater_than_999()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Question::all());

        $this->postJson(route('api.questions.store'), [
            'name' => 'I was born',
            'type' => 'dropdown',
            'pos' => 9999
        ])->assertStatus(422);

        $this->assertCount(0, Question::all());
    }

    /** @test */
    function devs_can_update_existing_questions()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->dev);

        $question = factory(Question::class)->create([
            'name' => 'Something'
        ]);

        $this->assertDatabaseHas('questions', [
            'name' => 'Something'
        ]);

        $this->patchJson(route('api.questions.update', $question), [
            'name' => 'Something else',
            'type' => 'multiple',
            'pos' => 1
        ])->assertStatus(200);

        $this->assertDatabaseMissing('questions', [
            'name' => 'Something'
        ]);

        $this->assertDatabaseHas('questions', [
            'name' => 'Something else'
        ]);
    }

    /** @test */
    function admins_can_update_existing_questions()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->admin);

        $question = factory(Question::class)->create([
            'name' => 'Something'
        ]);

        $this->assertDatabaseHas('questions', [
            'name' => 'Something'
        ]);

        $this->patchJson(route('api.questions.update', $question), [
            'name' => 'Something else',
            'type' => 'multiple',
            'pos' => 1
        ])->assertStatus(200);

        $this->assertDatabaseMissing('questions', [
            'name' => 'Something'
        ]);

        $this->assertDatabaseHas('questions', [
            'name' => 'Something else'
        ]);
    }

    /** @test */
    function users_cannot_update_existing_questions()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->user);

        $question = factory(Question::class)->create([
            'name' => 'Something'
        ]);

        $this->assertDatabaseHas('questions', [
            'name' => 'Something'
        ]);

        $this->patchJson(route('api.questions.update', $question), [
            'name' => 'Something else',
            'type' => 'multiple',
            'pos' => 1
        ])->assertStatus(401);

        $this->assertDatabaseMissing('questions', [
            'name' => 'Something else'
        ]);

        $this->assertDatabaseHas('questions', [
            'name' => 'Something'
        ]);
    }

    /** @test */
    function unauthenticated_users_cannot_update_existing_questions()
    {
        $this->withExceptionHandling();

        $question = factory(Question::class)->create([
            'name' => 'Something'
        ]);

        $this->assertDatabaseHas('questions', [
            'name' => 'Something'
        ]);

        $this->patchJson(route('api.questions.update', $question), [
            'name' => 'Something else',
            'type' => 'multiple',
            'pos' => 1
        ])->assertStatus(401);

        $this->assertDatabaseMissing('questions', [
            'name' => 'Something else'
        ]);

        $this->assertDatabaseHas('questions', [
            'name' => 'Something'
        ]);
    }

    /** @test */
    function devs_can_delete_existing_questions()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->dev);

        $question = factory(Question::class)->create();

        $this->assertCount(1, Question::all());

        $this->deleteJson(route('api.questions.destroy', $question))
            ->assertStatus(204);

        $this->assertCount(0, Question::all());
    }

    /** @test */
    function admins_can_delete_existing_questions()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->admin);

        $question = factory(Question::class)->create();

        $this->assertCount(1, Question::all());

        $this->deleteJson(route('api.questions.destroy', $question))
            ->assertStatus(204);

        $this->assertCount(0, Question::all());
    }
}
