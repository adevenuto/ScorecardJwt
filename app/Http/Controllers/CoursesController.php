<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Webpatser\Uuid\Uuid;
use App\Course;
use App\User;

class CoursesController extends Controller
{
    public function index()
    {   
        $courses = Course::all();
        return response()->json($courses);
    }
    public function userCourses(Request $request)
    {   
        $token = JWTAuth::getToken();
        $currentUser = Auth::user();
        $user = User::find($currentUser->id);
        $userCourses = $user->courses;
        return response()->json($userCourses)->header('Authorization','Bearer '.$token);
    }

    public function store(Request $request)
    {   
        \Log::info($request);
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