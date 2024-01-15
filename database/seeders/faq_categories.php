<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class faq_categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        db::table('faq_categories')->insert([
            'name' => 'why',
            'description' => 'hier werkt het creëren van category en ik kan items aanmaken in de database maar krijg ze niet getoond',
        ]);

    }
}
