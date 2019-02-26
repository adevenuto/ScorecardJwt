<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Validator;
use App\Course;
use App\User;

class CoursesRepository implements CoursesRepositoryInterface 
{
    private $course;
    
    public function __construct(Course $course) {
        $this->course = $course;
    }

    public function all() 
    {   
        return $this->course->all();
    }

    public function allUserCourses($user) 
    {   
        $userCourses = $user->courses;
        return $userCourses;
    }

    public function store($request)
    {   
        // \Log::info($request);
        $rules = [
            'name' => 'required|unique',
            'address' => 'required|unique',
        ];
        $input = $request->only('name', 'address');
        $validator = Validator::make($input, $rules);
        if($validator->fails()) {
            $error = $validator->messages();
            return response()->json(['error' => $error]);
        }
        try {
            $course = $this->course->create($request);
            $status = 200;
            $message = 'Course created';
            $response = $course;
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 500;
            $message = 'Course not created';
            $response = $e->getMessage();
        } catch (\Exception $e) {
            $status = 500;
            $message = 'Course not created';
            $response = $e->getMessage();
        }
        return response()->json(['message'=>$message, 'response'=>$response], $status);
    }
}