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

    public function create()
    {   $recentCourse = DB::table('courses')->latest('id')->first();
        return view('holes.create')->with('course', $recentCourse);
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
