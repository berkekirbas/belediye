<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Limit;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Limit::create([
            'project_limit' => 10,
            'news_limit' => 10,
            'photo_limit' => 10,
            'notice_limit' => 10,
        ]);
    }
}
