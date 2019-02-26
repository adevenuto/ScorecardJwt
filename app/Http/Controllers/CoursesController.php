<?php

namespace App\Http\Controllers;

use App\Repositories\CoursesRepositoryInterface;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use JWTAuth;

class CoursesController extends Controller
{   
    private $course;

    public function __construct(CoursesRepositoryInterface $course) 
    {
        $this->course = $course;
    }
    public function index()
    {   
        $courses = $this->course->all();
        return response()->json($courses);
    }
    public function userCourses(Request $request)
    {   
        $token = JWTAuth::getToken();
        $user = JWTAuth::user();
        $userCourses = $this->course->allUserCourses($user);
        return response()->json($userCourses)->header('Authorization','Bearer '.$token);
    }

    public function store(Request $request)
    {   
        $request = $request['golfClub'];
        $request['user_id'] = JWTAuth::user()->id;
        return $this->course->store($request);
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