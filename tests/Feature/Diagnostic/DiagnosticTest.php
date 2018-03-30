<?php

namespace Tests\Feature\Diagnostic;

use App\User;
use Tests\TestCase;
use App\Mail\SendMeMyResultsEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DiagnosticTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_guest_can_opt_to_save_his_personal_infos_after_his_diagnostic_is_done()
    {
        $this->withoutExceptionHandling();

        $guest = factory(User::class)->states('guest')->create();
        $this->actingAs($guest);

        $this->patchJson(route('api.diagnostics.update', $guest->id), [
            'user_consents' => true,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'guest_email' => 'johndoe@example.com'
        ])->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'user_consents' => true,
            'name' => $guest->name,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'guest_email' => 'johndoe@example.com'
        ]);
    }

    /** @test */
    function a_guest_can_ask_for_an_email_of_his_results_to_be_sent()
    {
        $this->withoutExceptionHandling();

        Mail::fake();

        $guest = factory(User::class)->states('guest')->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'guest_email' => 'johndoe@example.com'
        ]);
        $this->actingAs($guest);

        $this->getJson(route('api.diagnostics.send'))
            ->assertStatus(204);

        Mail::assertQueued(SendMeMyResultsEmail::class);
    }

    /** @test */
    function a_guest_can_log_in_again_to_see_his_results()
    {
        $this->withoutExceptionHandling();

        $guest = factory(User::class)->states('guest')->create();

        $this->get(route('api.diagnostics.login', $guest->name))
            ->assertStatus(200);

        $this->assertAuthenticatedAs($guest);
    }
}
