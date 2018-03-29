<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
        'role' => 'user',
        'remember_token' => str_random(10),
        'agrees_to_share_details' => false,
        'first_name' => null,
        'last_name' => null,
        'guest_email' => null
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

$factory->state(App\User::class, 'guest', function () {
    return [
        'name' => 'Guest ' . str_random(8),
        'email' => null,
        'password' => null,
        'role' => 'user'
    ];
});