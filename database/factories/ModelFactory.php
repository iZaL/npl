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
        'password'        => bcrypt('password'),
        'remember_token'  => str_random(10),
        'active'          => 1,
        'admin'           => 0,
        'np_code'         => 'NP1234',
        'activation_code' => str_random(30)
    ];
});

$factory->define(App\Src\Subject\Subject::class, function (Faker\Generator $faker) {
    return [

        'name_en'        => 'physics'.uniqid(),
        'name_ar'        => 'physics'.uniqid(),
        'description_en' => 'physics'.uniqid(),
        'description_ar' => 'physics'.uniqid()
    ];
});

$factory->define(App\Src\Level\Level::class, function (Faker\Generator $faker) {
    return [
        'name_en' => 'university'.uniqid(),
        'name_ar' => 'university'.uniqid(),
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

$factory->define(App\Src\Blog\Blog::class, function (Faker\Generator $faker) {
    return [
        'user_id'     => 1,
        'title_en'   => $faker->sentence(100),
        'description_en'   => $faker->sentence(1000),
    ];
});

$factory->define(App\Src\Notification\Notification::class, function (Faker\Generator $faker) {
    return [
        'user_id'     => 3,
        'notifiable_id'=>1,
        'notifiable_type'=>'Question',
        'read'=> 0
    ];
});
