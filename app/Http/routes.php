<?php

/*********************************************************************************************************
 * Auth Routes
 ********************************************************************************************************/
Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('account/activate/{token}', ['as' => 'user.token.confirm', 'uses' => 'Auth\AuthController@getActivate']);

Route::get('register/student', 'Auth\AuthController@studentRegistration');
Route::post('register/student', 'Auth\AuthController@postStudentRegistration');

Route::get('register/educator', 'Auth\AuthController@educatorRegistration');
Route::post('register/educator', 'Auth\AuthController@postEducatorRegistration');

/*********************************************************************************************************
 * Educator Routes
 ********************************************************************************************************/
Route::get('educator', 'EducatorController@index');

Route::get('educator/questions', 'EducatorController@getQuestions');

Route::get('educator/answers', 'EducatorController@getAnswers');

/*********************************************************************************************************
 * Student Routes
 ********************************************************************************************************/
Route::get('student', 'StudentController@index');

Route::get('student/questions', 'StudentController@getQuestions');

/*********************************************************************************************************
 * Questions Controller
 ********************************************************************************************************/
Route::resource('question', 'QuestionController');

/*********************************************************************************************************
 * Answer Routes
 ********************************************************************************************************/
Route::get('question/{question_id}/reply/{answer_id}', 'AnswerController@createReply');

Route::get('question/{id}/answer', 'AnswerController@createAnswer');

Route::post('question/reply', 'AnswerController@storeReply');

Route::resource('answer', 'AnswerController');

/*********************************************************************************************************
 * Profile Routes
 ********************************************************************************************************/
Route::get('profile/edit', 'ProfileController@editProfile');

/*********************************************************************************************************
 * Misc Routes
 ********************************************************************************************************/

Route::resource('subject', 'SubjectController');

Route::resource('level', 'LevelController');

Route::get('contact', ['as' => 'contact', 'uses' => 'PageController@getContact']);

Route::post('contact', 'PageController@postContact');

Route::get('home', ['as' => 'home', 'uses' => 'HomeController@home']);

Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);

Route::get('test', function () {

    $user = Auth::loginUsingId(2);
    dd($user->subjects->toArray());
});

/*********************************************************************************************************
 * Admin Routes
 ********************************************************************************************************/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['admin']], function () {

    Route::post('educator/{educator}/de-activate-subjects', 'EducatorController@deActivateSubjects');

    Route::post('educator/{educator}/activate-subjects', 'EducatorController@activateSubjects');

    Route::resource('user', 'UserController');
    Route::resource('subject', 'SubjectController');
    Route::resource('level', 'LevelController');
    Route::resource('educator', 'EducatorController');
    Route::resource('student', 'StudentController');
    Route::resource('question', 'QuestionController');
    Route::resource('answer', 'AnswerController');

    Route::get('/', 'HomeController@index');

});