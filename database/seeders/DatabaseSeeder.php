<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(Users::class);
        $this->call(Posts::class);
        $this->call(Faq_Categories::class);
        $this->call(Faq_Items::class);
        $this->call(Comments::class);
        $this->call(Likes::class);

    }
}

