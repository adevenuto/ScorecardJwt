<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('courses', 'CoursesController@index');


Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('register', 'AuthController@register');
    Route::get('user/verify/{verification_code}', 'AuthController@verifyUser');
    Route::post('user/send/activation/email', 'AuthController@sendActivationEmail');
    Route::post('user/password/reset/request', 'AuthController@sendPasswordResetEmail');
    Route::post('user/password/reset', 'AuthController@resetUserPassword');
    Route::get('user/verify-uuid', 'AuthController@verifyUuid');
});

Route::group(['middleware' => ['jwtRequestIntercept', 'jwt.auth']], function($router){
    Route::get('user/courses', 'CoursesController@userCourses');
    Route::post('user/course/create', 'CoursesController@store');


    Route::get('user/token/exp', 'AuthController@checkTokenExp');
    Route::get('user', 'AuthController@authUser');
});
	