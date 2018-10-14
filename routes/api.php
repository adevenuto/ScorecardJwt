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

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
	Route::post('course/create', 'CoursesController@store');
	Route::get('courses', 'CoursesController@allCourses');
	

	
});

	// Route::get('course/{id}/create/holes', 'HolesController@create');
	// Route::post('hole/create', 'HolesController@store');

	// Route::post("/getcountries", "CountriesController@getCountries");
	// Route::post("/getstates/{id}", "StatesController@getStates");
	// Route::post("/getcities/{id}", "CitiesController@getCities");