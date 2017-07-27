<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\States;
use DB;

class StatesController extends Controller
{
    public function getStates($id) {   
        $states = DB::table('states')->where('country_id','=',$id)->get();
        return $states;
    }
}
