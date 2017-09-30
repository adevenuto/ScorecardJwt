<?php

use Illuminate\Database\Seeder;


class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::unprepared(File::get('storage/queries/countries.sql'));
    }
}