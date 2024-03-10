<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Annoucement;
use App\Models\Blog;
use App\Models\Company;
use App\Models\Influencer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Company::factory(10)->create();
        Annoucement::factory(10)->create();
        Blog::factory(10)->create();
        Influencer::factory(10)->create();
    }
}
