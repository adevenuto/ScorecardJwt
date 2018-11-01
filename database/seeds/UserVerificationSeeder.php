<?php

use Illuminate\Database\Seeder;

class UserVerificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('user_verifications')->insert([
            'user_id' => '1',
            'token' => str_random(30),
        ]);

    	DB::table('user_verifications')->insert([
            'user_id' => '2',
            'token' => str_random(30),
        ]);

        DB::table('user_verifications')->insert([
            'user_id' => '3',
            'token' => str_random(30),
        ]);
    }
}