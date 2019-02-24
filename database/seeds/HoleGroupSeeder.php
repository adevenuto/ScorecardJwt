<?php

use Illuminate\Database\Seeder;


class HoleGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::unprepared(File::get('storage/queries/holeGroupSeedQuery2019-02-23.sql'));
    }
}
