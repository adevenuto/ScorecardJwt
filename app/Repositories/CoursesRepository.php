<?php

namespace App\Repositories;

use App\Course;

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
}