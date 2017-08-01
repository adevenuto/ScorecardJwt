<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
// Root
Route::get('/', 'PagesController@getIndex');

Route::get('course/create', 'CoursesController@create');
Route::post('course/create', 'CoursesController@store');
Route::get('/courses', 'CoursesController@index');

// courses.create form countries/state/city
Route::post("/getcountries", "CountriesController@getCountries");
Route::post("/getstates/{id}", "StatesController@getStates");
Route::post("/getcities/{id}", "CitiesController@getCities");