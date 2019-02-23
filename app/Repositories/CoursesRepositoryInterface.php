<?php 

namespace App\Repositories;

interface CoursesRepositoryInterface 
{
    public function all();

    public function allUserCourses($id);
}