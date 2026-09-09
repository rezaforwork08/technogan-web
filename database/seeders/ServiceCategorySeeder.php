<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'IT Infrastructure', 'slug' => 'it-infrastructure', 'icon' => 'heroicon-o-server', 'order' => 1],
            ['name' => 'Networking', 'slug' => 'networking', 'icon' => 'heroicon-o-signal', 'order' => 2],
            ['name' => 'CCTV & Security System', 'slug' => 'cctv-security-system', 'icon' => 'heroicon-o-video-camera', 'order' => 3],
            ['name' => 'Computer Service', 'slug' => 'computer-service', 'icon' => 'heroicon-o-computer-desktop', 'order' => 4],
        ];

        foreach ($categories as $category) {
            ServiceCategory::query()->updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
