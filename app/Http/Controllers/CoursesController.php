<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class CoursesController extends Controller
{
    
    public function index()
    {
        return view('courses.index');
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        // validate incoming data
        $this->validate($request, array(
            'course_name' => 'required|max:255',
            'course_address'  => 'required|max:255',
            'course_phone_number'  => 'max:50',
            'course_postal_code'  => 'required|max:18',
            'course_website'  => 'max:255',
            'course_email'  => 'max:255',
            'course_membership'  => 'boolean',
            'course_price'  => 'max:4',
            'country_id'  => 'required',
            'state_id'  => 'required',
            'city_id'  => 'required',
            'course_holes'  => 'max:36',
            'tournament_tee_length' => 'nullable|max:4', 
            'back_tee_length' => 'nullable|max:4',
            'middle_tee_length' => 'nullable|max:4',
            'front_tee_length' => 'nullable|max:4',
            'tournament_tee_slope_rating' => 'nullable',
            'back_tee_slope_rating' => 'nullable',
            'middle_tee_slope_rating' => 'nullable',
            'front_tee_slope_rating' => 'nullable',
            'driving_range' => 'nullable',
            'chipping_green' => 'nullable',
            'putting_green' => 'nullable',
            'practice_bunker' => 'nullable',
            'pull_carts' => 'nullable',
            'motorized_carts' => 'nullable',
            'pro_shop' => 'nullable',
            'golf_lessons' => 'nullable',
            'caddies' => 'nullable',
            'lockers' => 'nullable',
            'restaurant' => 'nullable'
        ));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
