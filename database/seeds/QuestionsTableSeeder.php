<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Question::class)->create([
            'name' => "I'm in the age range...",
            'type' => 'dropdown',
            'pos' => 0
        ]);

        factory(\App\Question::class)->create([
            'name' => "I am a...",
            'type' => 'multiple',
            'pos' => 1
        ]);

        factory(\App\Question::class)->create([
            'name' => "I currently live in...",
            'type' => 'dropdown',
            'pos' => 2
        ]);

        factory(\App\Question::class)->create([
            'name' => "About sleep...",
            'type' => 'multiple',
            'pos' => 3
        ]);

        factory(\App\Question::class)->create([
            'name' => "About stress...",
            'type' => 'multiple',
            'pos' => 4
        ]);

        factory(\App\Question::class)->create([
            'name' => "About sickness...",
            'type' => 'multiple',
            'pos' => 5
        ]);

        factory(\App\Question::class)->create([
            'name' => "About nutrition...",
            'type' => 'multiple',
            'pos' => 6
        ]);

        factory(\App\Question::class)->create([
            'name' => 'About nutrition followup',
            'type' => 'multiple',
            'pos' => 7
        ]);

        factory(\App\Question::class)->create([
            'name' => "About exercise...",
            'type' => 'multiple',
            'pos' => 8
        ]);

        factory(\App\Question::class)->create([
            'name' => 'About exercise followup',
            'type' => 'multiple',
            'pos' => 9
        ]);

        factory(\App\Question::class)->create([
            'name' => "About my health...",
            'type' => 'multiple',
            'pos' => 10
        ]);

        factory(\App\Question::class)->create([
            'name' => "About my skin, my main concern is...",
            'type' => 'multiple',
            'pos' => 11
        ]);

        factory(\App\Question::class)->create([
            'name' => "About freetime...",
            'type' => 'multiple',
            'pos' => 12
        ]);

        factory(\App\Question::class)->create([
            'name' => "About length of stay...",
            'type' => 'multiple',
            'pos' => 13
        ]);
    }
}
