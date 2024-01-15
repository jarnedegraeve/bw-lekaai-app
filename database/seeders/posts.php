<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class posts extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'title' => 'game event',
            'message' => 'We organizeren een gaming event. bring your own pc.',
            'user_id' => 2,
            'cover_image' => 'images/lxarPFLA1jROfgwGxAiL2xzyF6WSV9TFrVkdoVse.jpg',
            'created_at' => '2021-01-13 14:01:00'
        ]);

        DB::table('posts')->insert([
            'title' => 'eindejaars bbq',
            'message' => 'zoals alle jaren organizeren wij weer een bbq om het schooljaar af te sluiten',
            'user_id' => 2,
            'cover_image' => 'images/wsivJuedlmi5OPL26dQ8CkNoKs9veSiT8wZjM2be.jpg',
            'created_at' => '2021-01-13 14:03:00'
        ]);

    }
}
