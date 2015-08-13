<?php

use App\Events\UserRegistered;
use Illuminate\Support\Facades\Auth;

Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);


Route::resource('question','QuestionController');

Route::resource('subject','SubjectController');

Route::get('home', 'HomeController@index');

Route::get('test', function(){

    $user = Auth::loginUsingId(1);
    event(new UserRegistered($user));

});
Route::get('/', 'HomeController@index');

/*********************************************************************************************************
* Admin Routes
********************************************************************************************************/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['admin']], function () {

    Route::get('/', 'HomeController@index');

});