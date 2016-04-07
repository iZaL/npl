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
 * Misc Routes
 ********************************************************************************************************/
Route::resource('subject', 'SubjectController');
Route::resource('level', 'LevelController');
Route::get('contact', ['as' => 'contact', 'uses' => 'PageController@getContact']);
Route::post('contact', 'PageController@postContact');
Route::resource('blog', 'BlogController');
Route::get('home', ['as' => 'home', 'uses' => 'HomeController@home']);
Route::get('student', 'PageController@getStudentPage');
Route::get('educator','PageController@getEducatorPage');
Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
Route::get('test', ['middleware' => 'studentOrEducator', function () {}]);
Route::get('mail',function(){
    try {
        Mail::send('emails.welcome', [], function ($m)  {
            $m->from(env('MAIL_FROM'), env('MAIL_FROM_NAME'));
            $m->to('z4ls@live.com', 'zal')->subject('Your Reminder!');
        });
    }catch(Exception $e) {
        dd($e->getMessage());
    }
});

/*********************************************************************************************************
 * Auth Routes
 ********************************************************************************************************/
Route::group([ 'middleware' => ['auth']], function () {
    Route::resource('profile','ProfileController');
    Route::get('profile/{id}/questions', 'ProfileController@getQuestions');
    Route::get('profile/{id}/answers', 'ProfileController@getAnswers');
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
    Route::resource('question', 'QuestionController');
    Route::resource('answer', 'AnswerController');
    Route::resource('blog', 'BlogController');
    Route::get('/', 'BlogController@index');
});