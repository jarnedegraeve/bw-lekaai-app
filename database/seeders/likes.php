<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class likes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('likes')->insert([
            'user_id' => 3,
            'post_id' => 2,
        ]);

        DB::table('likes')->insert([
            'user_id' => 3,
            'post_id' => 1,
        ]);

        DB::table('likes')->insert([
            'user_id' => 1,
            'post_id' => 2,
        ]);
    }
}
