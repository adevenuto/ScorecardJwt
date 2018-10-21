<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;
use App\Course;
use App\User;

class CoursesController extends Controller
{
    public function allCourses()
    {   
        $courses = Course::all();
        return response()->json($courses);
    }
    public function userCourses(Request $request)
    {   
        $user = User::find($request->userId);
        $userCourses = $user->courses;
        return response()->json($userCourses);   
    }

    public function store(Request $request)
    {   
        
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