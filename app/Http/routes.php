<?php

Route::get('home', 'HomeController@index');

Route::get('/', 'HomeController@index');

/*********************************************************************************************************
* Admin Routes
********************************************************************************************************/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['admin']], function () {

    Route::get('/', 'HomeController@index');

});