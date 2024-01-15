<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class comments extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        db::table('comments')->insert([
            'user_id' => 3,
            'post_id' => 2,
            'message' => 'zullen er weeral snacks voorzien zijn?',
            'created_at' => '2021-01-13 14:01:00'
        ]);

        db::table('comments')->insert([
            'user_id' => 3,
            'post_id' => 1,
            'message' => 'ik heb er zin in',
            'created_at' => '2021-01-13 14:02:00'
        ]);

        db::table('comments')->insert([
            'user_id' => 1,
            'post_id' => 2,
            'message' => 'zeker!',
            'created_at' => '2021-01-13 14:03:00'
        ]);

    }
}
