<?php

use Illuminate\Database\Seeder;


class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::unprepared(File::get('storage/queries/courseDump2019_02_23.sql'));
    }
}