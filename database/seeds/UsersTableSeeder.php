<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
            'name' => 'consumer',
            'email' => 'consumer@consumer.com',
            'password' => Hash::make('consumer123'),
            'type' => 2,
        ]);

    	DB::table('users')->insert([
            'name' => 'deliman',
            'email' => 'deliman@deliman.com',
            'password' => Hash::make('deliman123'),
            'type' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'type' => 1,
        ]);
    }
}