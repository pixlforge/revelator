<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
        'role' => 'user',
        'remember_token' => str_random(10),
    ];
});

$factory->state(App\User::class, 'dev', function () {
    return [
        'role' => 'dev'
    ];
});

$factory->state(App\User::class, 'admin', function () {
    return [
        'role' => 'admin'
    ];
});

$factory->state(App\User::class, 'diagnostic', function () {
    return [
        'name' => 'diagnostic user',
        'email' => null,
        'password' => null,
        'role' => 'user'
    ];
});