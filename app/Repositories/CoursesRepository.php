<?php

namespace App\Repositories;

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
    public function allUserCourses($id) 
    {   
        $userCourses = User::find($id)->courses;
        return $userCourses;
    }
}