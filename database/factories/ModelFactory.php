<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Src\User\User::class, function (Faker\Generator $faker) {
    return [
        'name'           => 'zal',
        'email'          => 'admin@test.com',
        'password'       => bcrypt('admin'),
        'remember_token' => str_random(10),
        'active'         => 1,
        'admin'        => 1
    ];
});

