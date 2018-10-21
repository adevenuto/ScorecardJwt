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

Route::get('courses', 'CoursesController@allCourses');

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('register', 'AuthController@register');
		Route::post('refresh', 'AuthController@refresh');
});

Route::group(['middleware' => 'jwt.auth'], function($router){
	Route::get('user/courses', 'CoursesController@userCourses');
});
	