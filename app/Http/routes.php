<?php

use App\Events\UserRegistered;
use Illuminate\Support\Facades\Auth;

Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::get('/register/student', 'Auth\AuthController@studentRegistration');
Route::post('/register/student', 'Auth\AuthController@postStudentRegistration');
Route::get('/register/educator', 'Auth\AuthController@educatorRegistration');
Route::post('/register/educator', 'Auth\AuthController@postEducatorRegistration');

Route::get('student','StudentController@index');

Route::get('educator','EducatorController@index');

Route::resource('question', 'QuestionController');

Route::resource('subject', 'SubjectController');

Route::resource('level', 'LevelController');

Route::get('home', 'HomeController@index');

Route::get('test', function () {

    $user = Auth::loginUsingId(2);
//    dd($user->getType());
//    dd($user->educator);
//    event(new UserRegistered($user));

});
Route::get('/', 'HomeController@index');

/*********************************************************************************************************
 * Admin Routes
 ********************************************************************************************************/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['admin']], function () {

    Route::get('/', 'HomeController@index');

});