<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SettingSeeder::class,
            ServiceCategorySeeder::class,
            ServiceSeeder::class,
            PortfolioSeeder::class,
            BlogCategorySeeder::class,
            BlogPostSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
