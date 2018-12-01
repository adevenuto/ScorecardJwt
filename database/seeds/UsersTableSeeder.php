<?php

use Illuminate\Database\Seeder;
use Webpatser\Uuid\Uuid;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        \Log::info(Uuid::generate());
    	DB::table('users')->insert([
            'uuid' => Uuid::generate(),
            'name' => 'consumer',
            'email' => 'consumer@consumer.com',
            'password' => Hash::make('consumer123'),
            'type' => 2,
            'is_verified' => 1
        ]);

    	DB::table('users')->insert([
            'uuid' => Uuid::generate(),
            'name' => 'deliman',
            'email' => 'deliman@deliman.com',
            'password' => Hash::make('deliman123'),
            'type' => 2,
            'is_verified' => 1
        ]);

        DB::table('users')->insert([
            'uuid' => Uuid::generate(),
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'type' => 1,
            'is_verified' => 1
        ]);
    }
}