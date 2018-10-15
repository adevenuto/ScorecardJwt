<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;
use Log;
use App\Course;
use App\User;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['allCourses']]);
    }

    public function allCourses()
    {   
        $courses = Course::all();
        return response()->json(['courses' => $courses]);
    }

    public function store(Request $request)
    {   
        // validate incoming data
        $this->validate($request, array(
            'course_name' => 'required|unique:courses|max:255',
            'course_address'  => 'required|unique:courses|max:255',
            'course_phone_number'  => 'unique:courses|max:50',
            'course_postal_code'  => 'required|max:18',
            'course_website'  => 'unique:courses|max:255',
            'course_email'  => 'unique:courses|max:255',
            'course_price'  => 'required',
            'course_holes'  => 'required'
        ));

        $course = new Course;
        $course->course_name = $request->course_name;
        $course->course_address = $request->course_address;
        $course->course_phone_number = $request->course_phone_number;
        $course->course_postal_code = $request->course_postal_code;
        $course->course_website = $request->course_website;
        $course->course_email = $request->course_email;
        $course->course_price = $request->course_price;
        $course->course_country = $request->course_country;
        $course->course_state = $request->course_state;
        $course->course_city = $request->course_city;
        $course->course_holes = $request->course_holes;
        $course->save();

        $user = Auth::user()->id;
        $course->users()->attach($user);

        return redirect('course/'.$course->id.'/create/holes');
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