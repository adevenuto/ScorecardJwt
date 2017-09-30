<?php

use Illuminate\Database\Seeder;


class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::unprepared(File::get('storage/queries/states.sql'));
    }
}