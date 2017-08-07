<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\Course;

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
            'course_price'  => 'required',
            'course_holes'  => 'max:36'
        ));
        
        $course = new Course;
        $course->course_name = $request->course_name;
        $course->course_address = $request->course_address;
        $course->course_phone_number = $request->course_phone_number;
        $course->course_postal_code = $request->course_postal_code;
        $course->course_website = $request->course_website;
        $course->course_email = $request->course_email;
        $course->course_price = $request->course_price;
        $course->country_id = $request->course_country;
        $course->state_id = $request->course_state;
        $course->city_id = $request->course_city;
        $course->course_holes = $request->course_holes;
        $course->driving_range = $request->driving_range;
        $course->chipping_green = $request->chipping_green;
        $course->putting_green = $request->putting_green;
        $course->practice_bunker = $request->practice_bunker;
        $course->pull_carts = $request->pull_carts;
        $course->motorized_carts = $request->motorized_carts;
        $course->pro_shop = $request->pro_shop;
        $course->golf_lessons = $request->golf_lessons;
        $course->caddies = $request->caddies;
        $course->lockers = $request->lockers;
        $course->restaurant = $request->restaurant;
        $course->save();

        Log::info($course);
        Log::info($request);
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















// 'tournament_tee_length' => 'nullable|max:4', 
// 'back_tee_length' => 'nullable|max:4',
// 'middle_tee_length' => 'nullable|max:4',
// 'front_tee_length' => 'nullable|max:4',
// 'tournament_tee_slope_rating' => 'nullable|max:6',
// 'back_tee_slope_rating' => 'nullable|max:6',
// 'middle_tee_slope_rating' => 'nullable|max:6',
// 'front_tee_slope_rating' => 'nullable|max:6',


// $course->tournament_tee_length = $request->tournament_tee_length;
// $course->back_tee_length = $request->back_tee_length;
// $course->middle_tee_length = $request->middle_tee_length;
// $course->front_tee_length = $request->front_tee_length;
// $course->tournament_tee_slope_rating = $request->tournament_tee_slope_rating;
// $course->back_tee_slope_rating = $request->back_tee_slope_rating;
// $course->middle_tee_slope_rating = $request->middle_tee_slope_rating;
// $course->front_tee_slope_rating = $request->front_tee_slope_rating;