<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Budi Santoso',
                'company' => 'PT Sumber Makmur Sejahtera',
                'position' => 'IT Manager',
                'message' => 'Tim Technogan sangat responsif dan profesional. Migrasi server kami berjalan lancar tanpa gangguan operasional.',
                'rating' => 5,
                'order' => 1,
            ],
            [
                'client_name' => 'Sari Wulandari',
                'company' => 'Koperasi Sejahtera Bersama',
                'position' => 'Kepala Cabang',
                'message' => 'Jaringan kantor cabang kami jadi jauh lebih stabil sejak ditangani Technogan. Pelayanannya juga ramah dan cepat tanggap.',
                'rating' => 5,
                'order' => 2,
            ],
            [
                'client_name' => 'Andi Prasetyo',
                'company' => 'Grand Mahkota Hotel',
                'position' => 'General Manager',
                'message' => 'Sistem CCTV yang dipasang sangat membantu pengawasan hotel kami. Tim Technogan juga selalu siap membantu jika ada kendala.',
                'rating' => 5,
                'order' => 3,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::query()->updateOrCreate(
                ['client_name' => $testimonial['client_name'], 'company' => $testimonial['company']],
                $testimonial
            );
        }
    }
}
