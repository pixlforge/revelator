<?php

namespace Tests\Feature\Diagnostic;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'johndoe@example.com'
        ])->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'name' => $guest->name,
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'johndoe@example.com'
        ]);
    }
}
