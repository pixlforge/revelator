<?php

namespace Tests\Feature\Option;

use App\Program;
use App\User;
use App\Option;
use App\Question;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OptionTest extends TestCase
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
    function devs_can_create_new_options()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->dev);

        $this->assertCount(0, Option::all());

        $question = factory(Question::class)->create([
            'name' => 'Generic Question',
            'type' => 'multiple',
            'pos' => 0
        ]);

        $this->postJson(route('api.options.store'), [
            'name' => 'Possible answer',
            'pos' => 0,
            'question_id' => $question->id
        ])->assertStatus(200);

        $this->assertCount(1, Option::all());
    }

    /** @test */
    function admins_can_create_new_options()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Option::all());

        $question = factory(Question::class)->create([
            'name' => 'Generic Question',
            'type' => 'multiple',
            'pos' => 0
        ]);

        $this->postJson(route('api.options.store'), [
            'name' => 'Possible answer',
            'pos' => 0,
            'question_id' => $question->id
        ])->assertStatus(200);

        $this->assertCount(1, Option::all());
    }

    /** @test */
    function users_cannot_create_new_options()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->user);

        $this->assertCount(0, Option::all());

        $question = factory(Question::class)->create([
            'name' => 'Generic Question',
            'type' => 'multiple',
            'pos' => 0
        ]);

        $this->postJson(route('api.options.store'), [
            'name' => 'Possible answer',
            'pos' => 0,
            'question_id' => $question->id
        ])->assertStatus(401);

        $this->assertCount(0, Option::all());
    }

    /** @test */
    function unauthenticated_users_cannot_create_new_options()
    {
        $this->withExceptionHandling();

        $this->assertCount(0, Option::all());

        $question = factory(Question::class)->create([
            'name' => 'Generic Question',
            'type' => 'multiple',
            'pos' => 0
        ]);

        $this->postJson(route('api.options.store'), [
            'name' => 'Possible answer',
            'pos' => 0,
            'question_id' => $question->id
        ])->assertStatus(401);

        $this->assertCount(0, Option::all());
    }

    /** @test */
    function add_new_option_validation_fails_if_name_is_missing()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $question = factory(Question::class)->create([
            'name' => 'Generic Question',
            'type' => 'multiple',
            'pos' => 0
        ]);

        $this->assertCount(0, Option::all());

        $this->postJson(route('api.options.store'), [
            'pos' => 1,
            'question_id' => $question->id
        ])->assertStatus(422);

        $this->assertCount(0, Option::all());
    }

    /** @test */
    function add_new_option_validation_fails_if_name_is_not_a_string()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $question = factory(Question::class)->create([
            'name' => 'Generic Question',
            'type' => 'multiple',
            'pos' => 0
        ]);

        $this->assertCount(0, Option::all());

        $this->postJson(route('api.options.store'), [
            'name' => 42,
            'pos' => 1,
            'question_id' => $question->id
        ])->assertStatus(422);

        $this->assertCount(0, Option::all());
    }

    /** @test */
    function add_new_option_validation_fails_if_name_is_shorter_than_2_characters()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $question = factory(Question::class)->create([
            'name' => 'Generic Question',
            'type' => 'multiple',
            'pos' => 0
        ]);

        $this->assertCount(0, Option::all());

        $this->postJson(route('api.options.store'), [
            'name' => 'K',
            'pos' => 1,
            'question_id' => $question->id
        ])->assertStatus(422);

        $this->assertCount(0, Option::all());
    }

    /** @test */
    function add_new_option_validation_fails_if_name_is_longer_than_255_characters()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $question = factory(Question::class)->create([
            'name' => 'Generic Question',
            'type' => 'multiple',
            'pos' => 0
        ]);

        $this->assertCount(0, Option::all());

        $this->postJson(route('api.options.store'), [
            'name' => str_repeat('a', 256),
            'pos' => 1,
            'question_id' => $question->id
        ])->assertStatus(422);

        $this->assertCount(0, Option::all());
    }

    /** @test */
    function add_new_option_validation_fails_if_pos_is_not_numeric()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $question = factory(Question::class)->create([
            'name' => 'Generic Question',
            'type' => 'multiple',
            'pos' => 0
        ]);

        $this->assertCount(0, Option::all());

        $this->postJson(route('api.options.store'), [
            'name' => 'Option name',
            'pos' => 'something',
            'question_id' => $question->id
        ])->assertStatus(422);

        $this->assertCount(0, Option::all());
    }

    /** @test */
    function add_new_option_validation_fails_if_pos_is_negative()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $question = factory(Question::class)->create([
            'name' => 'Generic Question',
            'type' => 'multiple',
            'pos' => 0
        ]);

        $this->assertCount(0, Option::all());

        $this->postJson(route('api.options.store'), [
            'name' => 'Option name',
            'pos' => -1,
            'question_id' => $question->id
        ])->assertStatus(422);

        $this->assertCount(0, Option::all());
    }

    /** @test */
    function add_new_option_validation_fails_if_pos_is_larger_than_999()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $question = factory(Question::class)->create([
            'name' => 'Generic Question',
            'type' => 'multiple',
            'pos' => 0
        ]);

        $this->assertCount(0, Option::all());

        $this->postJson(route('api.options.store'), [
            'name' => 'Option name',
            'pos' => 999999999,
            'question_id' => $question->id
        ])->assertStatus(422);

        $this->assertCount(0, Option::all());
    }

    /** @test */
    function add_new_option_validation_fails_if_question_id_is_missing()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $question = factory(Question::class)->create([
            'name' => 'Generic Question',
            'type' => 'multiple',
            'pos' => 0
        ]);

        $this->assertCount(0, Option::all());

        $this->postJson(route('api.options.store'), [
            'name' => 'Option name',
            'pos' => 1
        ])->assertStatus(422);

        $this->assertCount(0, Option::all());
    }

    /** @test */
    function add_new_option_validation_fails_if_question_id_does_not_exist()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Option::all());

        $this->postJson(route('api.options.store'), [
            'name' => 'Option name',
            'pos' => 1,
            'question_id' => 42
        ])->assertStatus(422);

        $this->assertCount(0, Option::all());
    }

    /** @test */
    function a_new_option_has_as_much_associated_programs_as_there_are_programs()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->dev);

        $this->assertCount(0, Option::all());

        $question = factory(Question::class)->create([
            'name' => 'Generic Question',
            'type' => 'multiple',
            'pos' => 0
        ]);

        factory(Program::class, 12)->create();

        $option = $this->postJson(route('api.options.store'), [
            'name' => 'Possible answer',
            'pos' => 1,
            'question_id' => $question->id
        ])->assertStatus(200);

        $this->assertCount(1, Option::all());

        $option = Option::find(1);
        $this->assertCount(12, $option->programs);
    }

    /** @test */
    function devs_can_update_existing_options()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->dev);

        $question = factory(Question::class)->create([
            'name' => 'Generic Question',
            'type' => 'multiple',
            'pos' => 0
        ]);

        $option = factory(Option::class)->create([
            'name' => 'Possible answer',
            'pos' => 1,
            'question_id' => $question->id
        ]);

        $this->assertDatabaseHas('options', [
            'name' => 'Possible answer',
            'pos' => 1,
            'question_id' => $question->id
        ]);

        $this->patchJson(route('api.options.update', $option), [
            'name' => 'Another possible answer',
            'pos' => 2,
            'question_id' => $question->id
        ])->assertStatus(200);

        $this->assertDatabaseMissing('options', [
            'name' => 'Possible answer',
            'pos' => 1,
            'question_id' => $question->id
        ]);

        $this->assertDatabaseHas('options', [
            'name' => 'Another possible answer',
            'pos' => 2,
            'question_id' => $question->id
        ]);
    }

    /** @test */
    function admins_can_update_existing_options()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->admin);

        $question = factory(Question::class)->create([
            'name' => 'Generic Question',
            'type' => 'multiple',
            'pos' => 0
        ]);

        $option = factory(Option::class)->create([
            'name' => 'Possible answer',
            'pos' => 1,
            'question_id' => $question->id
        ]);

        $this->assertDatabaseHas('options', [
            'name' => 'Possible answer',
            'pos' => 1,
            'question_id' => $question->id
        ]);

        $this->patchJson(route('api.options.update', $option), [
            'name' => 'Another possible answer',
            'pos' => 2,
            'question_id' => $question->id
        ])->assertStatus(200);

        $this->assertDatabaseMissing('options', [
            'name' => 'Possible answer',
            'pos' => 1,
            'question_id' => $question->id
        ]);

        $this->assertDatabaseHas('options', [
            'name' => 'Another possible answer',
            'pos' => 2,
            'question_id' => $question->id
        ]);
    }

    /** @test */
    function users_cannot_update_existing_options()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->user);

        $question = factory(Question::class)->create([
            'name' => 'Generic Question',
            'type' => 'multiple',
            'pos' => 0
        ]);

        $option = factory(Option::class)->create([
            'name' => 'Possible answer',
            'pos' => 1,
            'question_id' => $question->id
        ]);

        $this->assertDatabaseHas('options', [
            'name' => 'Possible answer',
            'pos' => 1,
            'question_id' => $question->id
        ]);

        $this->patchJson(route('api.options.update', $option), [
            'name' => 'Another possible answer',
            'pos' => 2,
            'question_id' => $question->id
        ])->assertStatus(401);

        $this->assertDatabaseHas('options', [
            'name' => 'Possible answer',
            'pos' => 1,
            'question_id' => $question->id
        ]);

        $this->assertDatabaseMissing('options', [
            'name' => 'Another possible answer',
            'pos' => 2,
            'question_id' => $question->id
        ]);
    }

    /** @test */
    function unauthenticated_users_cannot_update_existing_options()
    {
        $this->withExceptionHandling();

        $question = factory(Question::class)->create([
            'name' => 'Generic Question',
            'type' => 'multiple',
            'pos' => 0
        ]);

        $option = factory(Option::class)->create([
            'name' => 'Possible answer',
            'pos' => 1,
            'question_id' => $question->id
        ]);

        $this->assertDatabaseHas('options', [
            'name' => 'Possible answer',
            'pos' => 1,
            'question_id' => $question->id
        ]);

        $this->patchJson(route('api.options.update', $option), [
            'name' => 'Another possible answer',
            'pos' => 2,
            'question_id' => $question->id
        ])->assertStatus(401);

        $this->assertDatabaseHas('options', [
            'name' => 'Possible answer',
            'pos' => 1,
            'question_id' => $question->id
        ]);

        $this->assertDatabaseMissing('options', [
            'name' => 'Another possible answer',
            'pos' => 2,
            'question_id' => $question->id
        ]);
    }

    /** @test */
    function devs_can_delete_existing_options()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->dev);

        $option = factory(Option::class)->create();

        $this->assertCount(1, Option::all());

        $this->deleteJson(route('api.options.destroy', $option))
            ->assertStatus(204);

        $this->assertCount(0, Option::all());
    }

    /** @test */
    function admins_can_delete_existing_options()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->admin);

        $option = factory(Option::class)->create();

        $this->assertCount(1, Option::all());

        $this->deleteJson(route('api.options.destroy', $option))
            ->assertStatus(204);

        $this->assertCount(0, Option::all());
    }

    /** @test */
    function users_cannot_delete_existing_options()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->user);

        $option = factory(Option::class)->create();

        $this->assertCount(1, Option::all());

        $this->deleteJson(route('api.options.destroy', $option))
            ->assertStatus(401);

        $this->assertCount(1, Option::all());
    }

    /** @test */
    function unauthenticated_users_cannot_delete_existing_options()
    {
        $this->withExceptionHandling();

        $option = factory(Option::class)->create();

        $this->assertCount(1, Option::all());

        $this->deleteJson(route('api.options.destroy', $option))
            ->assertStatus(401);

        $this->assertCount(1, Option::all());
    }
}
