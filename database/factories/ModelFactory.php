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
        'firstname_en'   => 'zal',
        'firstname_ar'   => 'zal',
        'email'          => 'admin@test.com',
        'password'       => 'password',
        'remember_token' => str_random(10),
        'active'         => 1,
        'admin'          => 1,
        'np_code'   => 'NP1234'
    ];
});

$factory->define(App\Src\Subject\Subject::class, function (Faker\Generator $faker) {
    return [

        'name_en'        => 'physics',
        'name_ar'        => 'physics',
        'description_en' => 'physics',
        'description_ar' => 'physics'
    ];
});

$factory->define(App\Src\Level\Level::class, function (Faker\Generator $faker) {
    return [

        'name_en' => 'university',
        'name_ar' => 'university',
        'slug'    => 'university'
    ];
});


$factory->define(App\Src\Level\UserLevel::class, function (Faker\Generator $faker) {
    return [
        'user_id' => '1',
        'level_id' => '1',
    ];
});

$factory->define(App\Src\Level\UserSubject::class, function (Faker\Generator $faker) {
    return [
        'user_id' => '1',
        'subject_id' => '1',
    ];
});



$factory->define(App\Src\Question\Question::class, function (Faker\Generator $faker) {
    return [

        'user_id'    => 1,
        'subject_id' => 1,
        'body_en'    => 'whats up physics',
        'body_ar'    => 'whats up physics'
    ];
});


