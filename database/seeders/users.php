<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'date_of_birth' => '2000-01-01',
            'profile_image' => 'images/b1XEDSoH3zMgH27kJbJIijuAjosNG8Z7Tg35xiQE.jpg',
            'is_admin' => 1,
            'about' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'jarne degraeve',
            'email' => 'jarne degraeve@student.ehb.be',
            'password' => Hash::make('Password!321'),
            'date_of_birth' => '2000-01-01',
            'profile_image' => 'images/5TQt0GHZ0LZojafjcHILB5DW83rj0wJPAz3RnXT2.jpg',
            'is_admin' => 1,
            'about' => 'another admin',
        ]);

        DB::table('users')->insert([
            'name' => 'jarne degraeve2',
            'email' => 'jarne degraeve2@student.ehb.be',
            'password' => Hash::make('Password!321'),
            'date_of_birth' => '2000-01-01',
            'profile_image' => '',
            'is_admin' => 0,
            'about' => 'a normal user',
        ]);
    }
}
