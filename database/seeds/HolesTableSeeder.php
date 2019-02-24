<?php

use Illuminate\Database\Seeder;


class HolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::unprepared(File::get('storage/queries/holesSeedQuery2019-02-24.sql'));
    }
}