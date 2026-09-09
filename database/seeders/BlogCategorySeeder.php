<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Tips IT', 'slug' => 'tips-it'],
            ['name' => 'Keamanan Jaringan', 'slug' => 'keamanan-jaringan'],
            ['name' => 'Berita Teknologi', 'slug' => 'berita-teknologi'],
        ];

        foreach ($categories as $category) {
            BlogCategory::query()->updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
