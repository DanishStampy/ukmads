<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'user_id' => 'A1',
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('admin123'), // password
            'role' => 'admin',
            'remember_token' => Str::random(10)
        ]);

        DB::table('users')->insert([
            'user_id' => 'A2',
            'name' => 'admin2',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('admin123'), // password
            'role' => 'admin',
            'remember_token' => Str::random(10)
        ]);

        DB::table('users')->insert([
            'user_id' => 'A3',
            'name' => 'admin3',
            'email' => 'admin3@gmail.com',
            'password' => Hash::make('admin123'), // password
            'role' => 'admin',
            'remember_token' => Str::random(10)
        ]);

        DB::table('users')->insert([
            'user_id' => 'S1',
            'name' => 'jett',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('staff123'), // password
            'role' => 'advertiser',
            'remember_token' => Str::random(10)
        ]);

        DB::table('users')->insert([
            'user_id' => 'S2',
            'name' => 'deez',
            'email' => 'deezz@gmail.com',
            'password' => Hash::make('staff123'), // password
            'role' => 'organizer',
            'remember_token' => Str::random(10)
        ]);
    }
}
