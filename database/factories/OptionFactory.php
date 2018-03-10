<?php

use Faker\Generator as Faker;

$factory->define(App\Option::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'pos' => 0,
        'question_id' => function () {
            return factory(\App\Question::class)->create()->id;
        }
    ];
});
