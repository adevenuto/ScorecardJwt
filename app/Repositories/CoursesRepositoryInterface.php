<?php 

namespace App\Repositories;

interface CoursesRepositoryInterface 
{
    public function all();

    public function allUserCourses($user);

    public function store($request);
}