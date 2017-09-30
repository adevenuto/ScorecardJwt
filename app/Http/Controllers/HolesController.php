<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hole;
use App\Course;
use DB;
use Log;

class HolesController extends Controller
{
    
    public function index()
    {
        //
    }

    public function create($id)
    {   
        $course = Course::find($id);
        return view('holes.create')->with('course', $course);
    }

    public function store(Request $request)
    {
        //
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
