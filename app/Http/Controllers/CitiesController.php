<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use DB;

class CitiesController extends Controller
{
    public function getCities($id) {
        $cities = DB::table('cities')->where('state_id', '=', $id)->get();
        return $cities;
    }
}
