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
    	DB::unprepared(File::get('storage/queries/course_user_relation.sql'));
    }
}