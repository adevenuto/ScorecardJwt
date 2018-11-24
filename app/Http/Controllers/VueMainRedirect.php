<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VueMainRedirect extends Controller
{
    public function redirect() {
        return view('main');
    }
}
