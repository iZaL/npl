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
        'firstname_en'    => 'zal',
        'firstname_ar'    => 'zal',
        'email'           => 'admin@test.com',
        'password'        => 'password',
        'remember_token'  => str_random(10),
        'active'          => 1,
        'admin'           => 1,
        'np_code'         => 'NP1234',
        'activation_code' => str_random(30)
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
        'user_id'  => '1',
        'level_id' => '1',
    ];
});

$factory->define(App\Src\Subject\UserSubject::class, function (Faker\Generator $faker) {
    return [
        'user_id'    => '1',
        'subject_id' => '1',
        'active'     => '1'
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

$factory->define(App\Src\Educator\Educator::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 2,
    ];
});

$factory->define(App\Src\Student\Student::class, function (Faker\Generator $faker) {
    return [

        'user_id' => 3,
    ];
});


$factory->define(App\Src\Answer\Answer::class, function (Faker\Generator $faker) {
    return [
        'user_id'     => 3,
        'parent_id'   => 0,
        'body_en'     => 'bla bla',
        'question_id' => 1
    ];
});

