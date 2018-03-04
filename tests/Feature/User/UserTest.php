<?php

namespace Tests\Feature\User;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
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
    function devs_can_add_news_admins()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->dev);

        $this->assertCount(3, User::all());

        $this->postJson(route('api.users.store'), [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            'role' => 'admin'
        ])->assertStatus(200);

        $this->assertCount(4, User::all());
    }

    /** @test */
    function admins_can_add_news_admins()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(3, User::all());

        $this->postJson(route('api.users.store'), [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            'role' => 'admin'
        ])->assertStatus(200);

        $this->assertCount(4, User::all());
    }

    /** @test */
    function users_cannot_add_news_admins()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->user);

        $this->assertCount(3, User::all());

        $this->postJson(route('api.users.store'), [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            'role' => 'admin'
        ])->assertStatus(401);

        $this->assertCount(3, User::all());
    }

    /** @test */
    function unauthenticated_users_cannot_add_news_admins()
    {
        $this->withExceptionHandling();

        $this->assertCount(3, User::all());

        $this->postJson(route('api.users.store'), [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            'role' => 'admin'
        ])->assertStatus(401);

        $this->assertCount(3, User::all());
    }

    /** @test */
    function add_new_user_validation_fails_if_no_name_is_provided()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(3, User::all());

        $response = $this->postJson(route('api.users.store'), [
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            'role' => 'admin'
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('name');

        $this->assertCount(3, User::all());
    }

    /** @test */
    function add_new_user_validation_fails_if_name_is_not_a_string()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(3, User::all());

        $response = $this->postJson(route('api.users.store'), [
            'name' => 42,
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            'role' => 'admin'
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('name');

        $this->assertCount(3, User::all());
    }

    /** @test */
    function add_new_user_validation_fails_if_name_is_shorter_than_3_characters()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(3, User::all());

        $response = $this->postJson(route('api.users.store'), [
            'name' => 'Jo',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            'role' => 'admin'
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('name');

        $this->assertCount(3, User::all());
    }

    /** @test */
    function add_new_user_validation_fails_if_name_is_longer_than_255_characters()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(3, User::all());

        $response = $this->postJson(route('api.users.store'), [
            'name' => str_repeat('a', 256),
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            'role' => 'admin'
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('name');

        $this->assertCount(3, User::all());
    }

    /** @test */
    function add_new_user_validation_fails_if_email_is_missing()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(3, User::all());

        $response = $this->postJson(route('api.users.store'), [
            'name' => 'John Doe',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            'role' => 'admin'
        ]);
        $response->assertStatus(422)
            ->assertJsonValidationErrors('email');

        $this->assertCount(3, User::all());
    }

    /** @test */
    function add_new_user_validation_fails_if_email_format_is_wrong()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(3, User::all());

        $response = $this->postJson(route('api.users.store'), [
            'name' => 'John Doe',
            'email' => 'johndoe.example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            'role' => 'admin'
        ]);
        $response->assertStatus(422)
            ->assertJsonValidationErrors('email');

        $this->assertCount(3, User::all());
    }

    /** @test */
    function add_new_user_validation_fails_if_email_is_already_in_use()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        factory(User::class)->create([
            'email' => 'johndoe@example.com'
        ]);

        $this->assertCount(4, User::all());

        $response = $this->postJson(route('api.users.store'), [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            'role' => 'admin'
        ]);
        $response->assertStatus(422)
            ->assertJsonValidationErrors('email');

        $this->assertCount(4, User::all());
    }

    /** @test */
    function add_new_user_validation_fails_if_email_is_longer_than_255_characters()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(3, User::all());

        $response = $this->postJson(route('api.users.store'), [
            'name' => 'John Doe',
            'email' => str_repeat('a', 250) . '@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            'role' => 'admin'
        ]);
        $response->assertStatus(422)
            ->assertJsonValidationErrors('email');

        $this->assertCount(3, User::all());
    }

    /** @test */
    function add_new_user_validation_fails_if_password_is_missing()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(3, User::all());

        $response = $this->postJson(route('api.users.store'), [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'role' => 'admin'
        ]);
        $response->assertStatus(422)
            ->assertJsonValidationErrors('password');

        $this->assertCount(3, User::all());
    }

    /** @test */
    function add_new_user_validation_fails_if_password_is_not_a_string()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(3, User::all());

        $response = $this->postJson(route('api.users.store'), [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 42,
            'password_confirmation' => 42,
            'role' => 'admin'
        ]);
        $response->assertStatus(422)
            ->assertJsonValidationErrors('password');

        $this->assertCount(3, User::all());
    }

    /** @test */
    function add_new_user_validation_fails_if_password_is_shorter_than_6_characters()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(3, User::all());

        $response = $this->postJson(route('api.users.store'), [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => str_repeat('a', 5),
            'password_confirmation' => str_repeat('a', 5),
            'role' => 'admin'
        ]);
        $response->assertStatus(422)
            ->assertJsonValidationErrors('password');

        $this->assertCount(3, User::all());
    }

    /** @test */
    function add_new_user_validation_fails_if_passwords_do_not_match()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(3, User::all());

        $response = $this->postJson(route('api.users.store'), [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'password_confirmation' => 'something else',
            'role' => 'admin'
        ]);
        $response->assertStatus(422)
            ->assertJsonValidationErrors('password');

        $this->assertCount(3, User::all());
    }

    /** @test */
    function add_new_user_validation_fails_if_role_is_missing()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(3, User::all());

        $response = $this->postJson(route('api.users.store'), [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'password_confirmation' => 'something else'
        ]);
        $response->assertStatus(422)
            ->assertJsonValidationErrors('role');

        $this->assertCount(3, User::all());
    }

    /** @test */
    function add_new_user_validation_fails_if_role_is_not_among_those_suggested()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->admin);

        $this->assertCount(3, User::all());

        $response = $this->postJson(route('api.users.store'), [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'password_confirmation' => 'something else',
            'role' => 'moderator'
        ]);
        $response->assertStatus(422)
            ->assertJsonValidationErrors('role');

        $this->assertCount(3, User::all());
    }

    /** @test */
    function admins_can_update_existing_users()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->admin);

        $user = factory(User::class)->create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com'
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com'
        ]);

        $this->patchJson(route('api.users.update', $user), [
            'id' => $user->id,
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'role' => 'admin'
        ])->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'role' => 'admin'
        ]);
    }

    /** @test */
    function users_cannot_update_existing_users()
    {
        $this->withExceptionHandling();

        $this->actingAs($this->user);

        $user = factory(User::class)->create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com'
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'role' => 'user'
        ]);

        $this->patchJson(route('api.users.update', $user), [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'role' => 'admin'
        ])->assertStatus(401);

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'role' => 'user'
        ]);
    }

    /** @test */
    function unauthenticated_users_cannot_update_existing_users()
    {
        $this->withExceptionHandling();

        $user = factory(User::class)->create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com'
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'role' => 'user'
        ]);

        $this->patchJson(route('api.users.update', $user), [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'role' => 'admin'
        ])->assertStatus(401);

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'role' => 'user'
        ]);
    }

    /** @test */
    function admins_can_delete_existing_users()
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->admin);

        $user = factory(User::class)->create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'role' => 'user'
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'role' => 'user'
        ]);

        $this->deleteJson(route('api.users.destroy', $user))
            ->assertStatus(204);

        $this->assertDatabaseMissing('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'role' => 'user'
        ]);
    }
}
