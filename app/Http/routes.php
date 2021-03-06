<?php

/*********************************************************************************************************
 * Auth Routes
 ********************************************************************************************************/

use Carbon\Carbon;

Route::get('test',function() {

});
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
 * Misc Routes
 ********************************************************************************************************/
Route::resource('subject', 'SubjectController');
Route::resource('level', 'LevelController');
Route::get('contact', ['as' => 'contact', 'uses' => 'PageController@getContact']);
Route::post('contact', 'PageController@postContact');
Route::get('blog/list', 'BlogController@getList');
Route::resource('blog', 'BlogController');
Route::get('blog/category/{id}/posts', 'BlogController@getSubjectPosts');
Route::get('home', ['as' => 'home', 'uses' => 'HomeController@home']);
Route::get('student', 'PageController@getStudentPage');
Route::get('educator','PageController@getEducatorPage');
Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);

/*********************************************************************************************************
 * Auth Routes
 ********************************************************************************************************/
Route::group([ 'middleware' => ['auth']], function () {
    Route::resource('profile','ProfileController');
    Route::get('profile/{id}/questions', 'ProfileController@getQuestions');
    Route::get('profile/{id}/answers', 'ProfileController@getAnswers');
    Route::get('profile/{id}/articles', 'ProfileController@getArticles');
});

/*********************************************************************************************************
 * Educator Routes
 ********************************************************************************************************/
Route::group([ 'middleware' => ['educator']], function () {
    Route::get('educator/questions', 'EducatorController@getQuestions');
    Route::get('educator/answers', 'EducatorController@getAnswers');
});

/*********************************************************************************************************
 * Student Routes
 ********************************************************************************************************/
Route::group([ 'middleware' => ['student']], function () {
    Route::resource('question', 'QuestionController');
    Route::get('student/questions', 'StudentController@getQuestions');
});
/*********************************************************************************************************
 * Student Or Educator Routes
 ********************************************************************************************************/
Route::group([ 'middleware' => ['auth','studentOrEducator']], function () {
    Route::get('question/{question_id}/reply/{answer_id}', 'AnswerController@createReply');
    Route::get('question/{id}/answer', 'AnswerController@createAnswer');
    Route::post('question/reply', 'AnswerController@storeReply');
    Route::resource('answer', 'AnswerController');
    Route::resource('notification','NotificationController');
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
    Route::get('question/archived', 'QuestionController@getArchived');
    Route::resource('question', 'QuestionController');
    Route::resource('answer', 'AnswerController');
    Route::resource('blog', 'BlogController');
    Route::get('/', 'BlogController@index');
});