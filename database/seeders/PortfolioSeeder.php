<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $portfolios = [
            [
                'service' => 'it-infrastructure',
                'client_name' => 'PT Sumber Makmur Sejahtera',
                'industry' => 'Manufaktur',
                'title' => 'Migrasi Infrastruktur Server ke Sistem Terpusat',
                'slug' => 'migrasi-infrastruktur-server-sumber-makmur',
                'challenge' => 'Sistem server yang tersebar di beberapa lokasi menyulitkan monitoring dan backup data.',
                'solution' => 'Technogan merancang dan memigrasikan seluruh server ke sistem terpusat dengan backup otomatis.',
                'result' => 'Downtime sistem berkurang 80% dan proses backup menjadi terjadwal otomatis.',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'service' => 'networking',
                'client_name' => 'Koperasi Sejahtera Bersama',
                'industry' => 'Jasa Keuangan',
                'title' => 'Instalasi Jaringan Kantor Cabang Baru',
                'slug' => 'instalasi-jaringan-koperasi-sejahtera',
                'challenge' => 'Kantor cabang baru membutuhkan jaringan yang stabil untuk sistem transaksi harian.',
                'solution' => 'Pemasangan structured cabling, konfigurasi router/switch, dan jaringan Wi-Fi terpisah untuk staf dan tamu.',
                'result' => 'Koneksi jaringan stabil dengan downtime nyaris nol sejak instalasi.',
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'service' => 'cctv-security-system',
                'client_name' => 'Grand Mahkota Hotel',
                'industry' => 'Perhotelan',
                'title' => 'Pemasangan Sistem CCTV Terintegrasi',
                'slug' => 'pemasangan-cctv-grand-mahkota-hotel',
                'challenge' => 'Kebutuhan pengawasan area hotel yang luas dengan akses monitoring terpusat.',
                'solution' => 'Instalasi lebih dari 40 titik IP camera terintegrasi dengan NVR dan aplikasi monitoring mobile.',
                'result' => 'Manajemen hotel dapat memantau seluruh area secara real-time dari mana saja.',
                'is_featured' => true,
                'order' => 3,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            $serviceId = Service::query()->where('slug', $portfolio['service'])->value('id');
            unset($portfolio['service']);

            Portfolio::query()->updateOrCreate(
                ['slug' => $portfolio['slug']],
                [...$portfolio, 'service_id' => $serviceId]
            );
        }
    }
}
