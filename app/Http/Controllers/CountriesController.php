<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountriesController extends Controller
{
    public function getCountries() {
        $countries = Country::all();
        return $countries;
    }
}
