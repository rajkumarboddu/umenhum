<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'MainController@loadIndexPage');
Route::get('login', 'MainController@loadLoginPage');
Route::get('signup', 'MainController@loadSignupPage');
Route::post('signup/sendOtp','UserController@sendOtpForSignup');
Route::post('signup/verifyOtp','UserController@verifyOtpForSignup');
Route::post('doLogin','UserController@doLogin');

Route::group(['middleware' => 'auth'],function(){
    Route::get('dashboard','MainController@loadDashboardPage');
    Route::get('getSubTree/{parent_id}','TreePathController@getFullTree');
    Route::get('logout','UserController@doLogout');
});

Route::get('test/{id}','TreePathController@getFullTree');