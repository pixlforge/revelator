<?php

use Faker\Generator as Faker;

$factory->define(App\Program::class, function (Faker $faker) {
    return [
        'title' => $title = $faker->sentence,
        'code' => str_slug($title, '-'),
        'description' => null
    ];
});
