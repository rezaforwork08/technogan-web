<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'category' => 'tips-it',
                'title' => '5 Tanda Infrastruktur IT Perusahaan Anda Perlu Diperbarui',
                'slug' => '5-tanda-infrastruktur-it-perlu-diperbarui',
                'excerpt' => 'Kenali tanda-tanda infrastruktur IT yang sudah tidak lagi mendukung pertumbuhan bisnis Anda.',
                'content' => '<p>Infrastruktur IT yang usang dapat menghambat produktivitas dan menimbulkan risiko keamanan. Berikut beberapa tanda yang perlu Anda waspadai, mulai dari server yang sering downtime hingga proses backup yang tidak lagi otomatis.</p>',
                'published_at' => now()->subDays(10),
            ],
            [
                'category' => 'keamanan-jaringan',
                'title' => 'Pentingnya Firewall untuk Keamanan Jaringan Kantor',
                'slug' => 'pentingnya-firewall-keamanan-jaringan-kantor',
                'excerpt' => 'Firewall menjadi lapisan pertahanan pertama dalam melindungi jaringan perusahaan dari ancaman siber.',
                'content' => '<p>Serangan siber terhadap bisnis kecil dan menengah terus meningkat setiap tahun. Firewall yang dikonfigurasi dengan baik dapat mencegah akses tidak sah ke jaringan internal perusahaan Anda.</p>',
                'published_at' => now()->subDays(5),
            ],
            [
                'category' => 'berita-teknologi',
                'title' => 'Tren Sistem CCTV Berbasis AI di Tahun Ini',
                'slug' => 'tren-sistem-cctv-berbasis-ai',
                'excerpt' => 'Sistem CCTV kini semakin cerdas dengan kemampuan deteksi berbasis kecerdasan buatan.',
                'content' => '<p>Teknologi CCTV berbasis AI memungkinkan deteksi wajah, penghitungan pengunjung, hingga peringatan otomatis saat terjadi aktivitas mencurigakan, membuat sistem keamanan menjadi lebih proaktif.</p>',
                'published_at' => now()->subDays(2),
            ],
        ];

        foreach ($posts as $post) {
            $categoryId = BlogCategory::query()->where('slug', $post['category'])->value('id');
            unset($post['category']);

            BlogPost::query()->updateOrCreate(
                ['slug' => $post['slug']],
                [...$post, 'blog_category_id' => $categoryId, 'author' => 'Technogan']
            );
        }
    }
}
