<?php

use Illuminate\Database\Seeder;


class CourseUserRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::unprepared(File::get('storage/queries/course_user_2018-10-20.sql'));
    }
}