<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(UserVerificationSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(HoleGroupSeeder::class);
        $this->call(HolesTableSeeder::class);
    }
}
