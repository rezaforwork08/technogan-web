<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'category' => 'it-infrastructure',
                'name' => 'IT Infrastructure',
                'slug' => 'it-infrastructure',
                'short_description' => 'Perencanaan dan implementasi infrastruktur IT yang andal untuk mendukung operasional bisnis Anda.',
                'description' => '<p>Technogan membantu merancang, membangun, dan memelihara infrastruktur IT perusahaan Anda, mulai dari server, storage, hingga sistem backup dan disaster recovery.</p>',
                'coverage_points' => ['Perencanaan & desain infrastruktur', 'Instalasi server & storage', 'Backup & disaster recovery', 'Monitoring & pemeliharaan berkala'],
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'category' => 'networking',
                'name' => 'Networking',
                'slug' => 'networking',
                'short_description' => 'Instalasi dan konfigurasi jaringan kabel maupun nirkabel yang stabil dan aman.',
                'description' => '<p>Kami menangani perancangan topologi jaringan, instalasi kabel structured cabling, konfigurasi router/switch, hingga pengamanan jaringan perusahaan Anda.</p>',
                'coverage_points' => ['Structured cabling', 'Konfigurasi router & switch', 'Wireless network (Wi-Fi)', 'Keamanan jaringan (firewall)'],
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'category' => 'cctv-security-system',
                'name' => 'CCTV & Security System',
                'slug' => 'cctv-security-system',
                'short_description' => 'Pemasangan sistem CCTV dan keamanan untuk memantau dan melindungi aset bisnis Anda.',
                'description' => '<p>Technogan menyediakan pemasangan CCTV analog maupun IP camera lengkap dengan sistem penyimpanan (NVR/DVR) dan integrasi akses monitoring jarak jauh.</p>',
                'coverage_points' => ['Survei & desain titik kamera', 'Instalasi CCTV & NVR/DVR', 'Integrasi akses kontrol', 'Monitoring via mobile app'],
                'is_featured' => true,
                'order' => 3,
            ],
            [
                'category' => 'computer-service',
                'name' => 'Computer Service',
                'slug' => 'computer-service',
                'short_description' => 'Perbaikan, perawatan, dan dukungan teknis perangkat komputer dan laptop kantor Anda.',
                'description' => '<p>Layanan perbaikan hardware, instalasi software, upgrade perangkat, hingga kontrak maintenance rutin untuk menjaga performa perangkat komputer perusahaan Anda.</p>',
                'coverage_points' => ['Perbaikan hardware & software', 'Instalasi & upgrade perangkat', 'Maintenance rutin', 'Dukungan on-site & remote'],
                'is_featured' => true,
                'order' => 4,
            ],
        ];

        foreach ($services as $service) {
            $categoryId = ServiceCategory::query()->where('slug', $service['category'])->value('id');
            unset($service['category']);

            Service::query()->updateOrCreate(
                ['slug' => $service['slug']],
                [...$service, 'service_category_id' => $categoryId]
            );
        }
    }
}
