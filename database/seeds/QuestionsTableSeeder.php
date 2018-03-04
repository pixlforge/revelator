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
            'name' => 'Birthdate',
            'type' => 'dropdown',
            'pos' => 0
        ]);

        factory(\App\Question::class)->create([
            'name' => 'Gender',
            'type' => 'multiple',
            'pos' => 1
        ]);

        factory(\App\Question::class)->create([
            'name' => 'Country',
            'type' => 'dropdown',
            'pos' => 2
        ]);

        factory(\App\Question::class)->create([
            'name' => 'Sleep',
            'type' => 'multiple',
            'pos' => 3
        ]);

        factory(\App\Question::class)->create([
            'name' => 'Stress',
            'type' => 'multiple',
            'pos' => 4
        ]);

        factory(\App\Question::class)->create([
            'name' => 'Sickness',
            'type' => 'multiple',
            'pos' => 5
        ]);

        factory(\App\Question::class)->create([
            'name' => 'Nutrition',
            'type' => 'multiple',
            'pos' => 6
        ]);

        factory(\App\Question::class)->create([
            'name' => 'Nutrition Followup',
            'type' => 'multiple',
            'pos' => 7
        ]);

        factory(\App\Question::class)->create([
            'name' => 'Exercise',
            'type' => 'multiple',
            'pos' => 8
        ]);

        factory(\App\Question::class)->create([
            'name' => 'Exercise Followup',
            'type' => 'multiple',
            'pos' => 9
        ]);

        factory(\App\Question::class)->create([
            'name' => 'Health',
            'type' => 'multiple',
            'pos' => 10
        ]);

        factory(\App\Question::class)->create([
            'name' => 'Beauty',
            'type' => 'multiple',
            'pos' => 11
        ]);

        factory(\App\Question::class)->create([
            'name' => 'Freetime',
            'type' => 'multiple',
            'pos' => 12
        ]);

        factory(\App\Question::class)->create([
            'name' => 'LOS',
            'type' => 'multiple',
            'pos' => 13
        ]);
    }
}
