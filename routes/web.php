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
Route::get('/courses', 'CoursesController@index');