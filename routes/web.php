<?php

Auth::routes();
Route::get('{any}', function () {
    return view('main');
})->where('any', '.*');




