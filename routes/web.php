<?php

Auth::routes();
Route::get('{any}', 'VueMainRedirect@redirect')
->where('any', '.*');




