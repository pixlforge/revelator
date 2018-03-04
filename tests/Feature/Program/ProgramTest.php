<?php

namespace Tests\Feature\Program;

use App\User;
use App\Program;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProgramTest extends TestCase
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
    function devs_can_create_new_programs()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->dev);

        $this->assertCount(0, Program::all());

        $this->postJson(route('api.programs.store'), [
            'title' => 'Weight Loss',
            'code' => 'Wloss'
        ])->assertStatus(200);

        $this->assertCount(1, Program::all());
    }

    /** @test */
    function admins_can_create_new_programs()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Program::all());

        $this->postJson(route('api.programs.store'), [
            'title' => 'Weight Loss',
            'code' => 'Wloss'
        ])->assertStatus(200);

        $this->assertCount(1, Program::all());
    }

    /** @test */
    function users_cannot_create_new_programs()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->user);

        $this->assertCount(0, Program::all());

        $this->postJson(route('api.programs.store'), [
            'title' => 'Weight Loss',
            'code' => 'Wloss'
        ])->assertStatus(401);

        $this->assertCount(0, Program::all());
    }

    /** @test */
    function unauthenticated_users_cannot_create_new_programs()
    {
        $this->withExceptionHandling();

        $this->assertCount(0, Program::all());

        $this->postJson(route('api.programs.store'), [
            'title' => 'Weight Loss',
            'code' => 'Wloss'
        ])->assertStatus(401);

        $this->assertCount(0, Program::all());
    }

    /** @test */
    function add_new_program_validation_fails_if_title_is_missing()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Program::all());

        $this->postJson(route('api.programs.store'), [
            'code' => 'Wloss'
        ])->assertStatus(422);

        $this->assertCount(0, Program::all());
    }

    /** @test */
    function add_new_program_validation_fails_if_title_is_not_a_string()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Program::all());

        $this->postJson(route('api.programs.store'), [
            'title' => 42,
            'code' => 'Wloss'
        ])->assertStatus(422);

        $this->assertCount(0, Program::all());
    }

    /** @test */
    function add_new_program_validation_fails_if_title_is_shorter_than_3_characters()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Program::all());

        $this->postJson(route('api.programs.store'), [
            'title' => 'Wl',
            'code' => 'Wloss'
        ])->assertStatus(422);

        $this->assertCount(0, Program::all());
    }

    /** @test */
    function add_new_program_validation_fails_if_title_is_longer_than_255_characters()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Program::all());

        $this->postJson(route('api.programs.store'), [
            'title' => str_repeat('a', 256),
            'code' => 'Wloss'
        ])->assertStatus(422);

        $this->assertCount(0, Program::all());
    }

    /** @test */
    function add_new_program_validation_fails_if_code_is_not_a_string()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Program::all());

        $this->postJson(route('api.programs.store'), [
            'title' => 'Weight Loss',
            'code' => 42
        ])->assertStatus(422);

        $this->assertCount(0, Program::all());
    }

    /** @test */
    function add_new_program_validation_fails_if_code_is_shorter_than_3_characters()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Program::all());

        $this->postJson(route('api.programs.store'), [
            'title' => 'Weight Loss',
            'code' => 'Wl'
        ])->assertStatus(422);

        $this->assertCount(0, Program::all());
    }

    /** @test */
    function add_new_program_validation_fails_if_code_is_longer_than_45_characters()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Program::all());

        $this->postJson(route('api.programs.store'), [
            'title' => 'Weight Loss',
            'code' => str_repeat('a', 46)
        ])->assertStatus(422);

        $this->assertCount(0, Program::all());
    }

    /** @test */
    function add_new_program_validation_fails_if_description_is_not_a_string()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Program::all());

        $this->postJson(route('api.programs.store'), [
            'title' => 'Weight Loss',
            'code' => 'Wloss',
            'description' => 42
        ])->assertStatus(422);

        $this->assertCount(0, Program::all());
    }

    /** @test */
    function add_new_program_validation_fails_if_description_is_shorter_than_5_characters()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Program::all());

        $this->postJson(route('api.programs.store'), [
            'title' => 'Weight Loss',
            'code' => 'Wloss',
            'description' => 'lore'
        ])->assertStatus(422);

        $this->assertCount(0, Program::all());
    }

    /** @test */
    function add_new_program_validation_fails_if_description_is_longer_than_3000_characters()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(0, Program::all());

        $this->postJson(route('api.programs.store'), [
            'title' => 'Weight Loss',
            'code' => 'Wloss',
            'description' => str_repeat('a', 3001)
        ])->assertStatus(422);

        $this->assertCount(0, Program::all());
    }

    /** @test */
    function devs_can_update_existing_programs()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->dev);

        $programs = factory(Program::class)->create([
            'title' => 'Weight Loss'
        ]);

        $this->assertDatabaseHas('programs', [
            'title' => 'Weight Loss'
        ]);

        $this->patchJson(route('api.programs.update', $programs), [
            'title' => 'Weight Loss+',
            'code' => 'Wloss'
        ])->assertStatus(200);

        $this->assertDatabaseMissing('programs', [
            'title' => 'Weight Loss'
        ]);

        $this->assertDatabaseHas('programs', [
            'title' => 'Weight Loss+'
        ]);
    }

    /** @test */
    function admins_can_update_existing_programs()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->admin);

        $programs = factory(Program::class)->create([
            'title' => 'Weight Loss'
        ]);

        $this->assertDatabaseHas('programs', [
            'title' => 'Weight Loss'
        ]);

        $this->patchJson(route('api.programs.update', $programs), [
            'title' => 'Weight Loss+',
            'code' => 'Wloss'
        ])->assertStatus(200);

        $this->assertDatabaseMissing('programs', [
            'title' => 'Weight Loss'
        ]);

        $this->assertDatabaseHas('programs', [
            'title' => 'Weight Loss+'
        ]);
    }

    /** @test */
    function users_cannot_update_existing_programs()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->user);

        $programs = factory(Program::class)->create([
            'title' => 'Weight Loss'
        ]);

        $this->assertDatabaseHas('programs', [
            'title' => 'Weight Loss'
        ]);

        $this->patchJson(route('api.programs.update', $programs), [
            'title' => 'Weight Loss+',
            'code' => 'Wloss'
        ])->assertStatus(401);

        $this->assertDatabaseMissing('programs', [
            'title' => 'Weight Loss+'
        ]);

        $this->assertDatabaseHas('programs', [
            'title' => 'Weight Loss'
        ]);
    }

    /** @test */
    function unauthenticated_users_cannot_update_existing_programs()
    {
        $this->withExceptionHandling();

        $programs = factory(Program::class)->create([
            'title' => 'Weight Loss'
        ]);

        $this->assertDatabaseHas('programs', [
            'title' => 'Weight Loss'
        ]);

        $this->patchJson(route('api.programs.update', $programs), [
            'title' => 'Weight Loss+',
            'code' => 'Wloss'
        ])->assertStatus(401);

        $this->assertDatabaseMissing('programs', [
            'title' => 'Weight Loss+'
        ]);

        $this->assertDatabaseHas('programs', [
            'title' => 'Weight Loss'
        ]);
    }

    /** @test */
    function devs_can_delete_existing_programs()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->dev);

        $program = factory(Program::class)->create();

        $this->assertCount(1, Program::all());

        $this->deleteJson(route('api.programs.destroy', $program))
            ->assertStatus(204);

        $this->assertCount(0, Program::all());
    }

    /** @test */
    function admins_can_delete_existing_programs()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->admin);

        $program = factory(Program::class)->create();

        $this->assertCount(1, Program::all());

        $this->deleteJson(route('api.programs.destroy', $program))
            ->assertStatus(204);

        $this->assertCount(0, Program::all());
    }

    /** @test */
    function users_cannot_delete_existing_programs()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->user);

        $program = factory(Program::class)->create();

        $this->assertCount(1, Program::all());

        $this->deleteJson(route('api.programs.destroy', $program))
            ->assertStatus(401);

        $this->assertCount(1, Program::all());
    }

    /** @test */
    function unauthenticated_users_cannot_delete_existing_programs()
    {
        $this->withExceptionHandling();

        $program = factory(Program::class)->create();

        $this->assertCount(1, Program::all());

        $this->deleteJson(route('api.programs.destroy', $program))
            ->assertStatus(401);

        $this->assertCount(1, Program::all());
    }

}
