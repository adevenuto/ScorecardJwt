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

// Courses
Route::get('course/create', 'CoursesController@create');
Route::post('course/create', 'CoursesController@store');
Route::get('/courses', 'CoursesController@index');

// Holes
Route::get('course/{id}/create/holes', 'HolesController@create');
// Route::post('hole/create', 'HolesController@store');

// Courses.create form countries/state/city
Route::post("/getcountries", "CountriesController@getCountries");
Route::post("/getstates/{id}", "StatesController@getStates");
Route::post("/getcities/{id}", "CitiesController@getCities");