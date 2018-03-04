<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'type' => array_random(['dropdown', 'multiple', 'infos']),
        'pos' => rand(0, 20)
    ];
});
