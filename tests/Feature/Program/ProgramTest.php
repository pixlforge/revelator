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
}
