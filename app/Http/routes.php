<?php

use App\Events\UserRegistered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

Route::resource('answer', 'AnswerController');

Route::get('question/{question_id}/reply/{answer_id}','AnswerController@createReply');

Route::post('question/reply','AnswerController@storeReply');

Route::get('question/{id}/answer', 'AnswerController@createAnswer');

Route::resource('subject', 'SubjectController');

Route::resource('level', 'LevelController');

Route::get('profile/edit','ProfileController@editProfile');

Route::get('profile/questions','ProfileController@getQuestions');

Route::get('home', 'HomeController@index');

Route::get('test', function () {

    dd(Auth::attempt(['email'=>'admin@test.com','password'=>'admin']));
    $user = Auth::loginUsingId(1);
    dd($user->password);
//    $hash = Hash::make('admin');
    dd(password_verify('password',$user->password));
    dd($user->password);
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