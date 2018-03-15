<?php

use Faker\Generator as Faker;

$factory->define(App\Answer::class, function (Faker $faker) {

    $question = factory(\App\Question::class)->create();
    $option = factory(\App\Option::class)->create([
        'question_id' => $question->id
    ]);

    return [
        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        },
        'question_id' => $question->id,
        'option_id' => $option->id
    ];
});
