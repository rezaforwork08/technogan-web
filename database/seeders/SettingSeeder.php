<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'company_address' => 'Jl. Teknologi No. 88, Jakarta Selatan, DKI Jakarta',
            'company_phone' => '(021) 555-0123',
            'company_whatsapp' => '6281234567890',
            'company_email' => 'info@technogan.id',
            'company_hours' => 'Senin - Jumat, 08.00 - 17.00 WIB',
            'social_facebook' => 'https://facebook.com/technogan',
            'social_instagram' => 'https://instagram.com/technogan',
            'social_linkedin' => 'https://linkedin.com/company/technogan',
            'social_youtube' => '',
            'map_embed_url' => '',
            'seo_default_title' => 'Technogan — IT Solution & Support Terpercaya',
            'seo_default_description' => 'Technogan menyediakan jasa IT Infrastructure, Networking, CCTV, dan Computer Service untuk mendukung pertumbuhan bisnis Anda.',
        ];

        foreach ($settings as $key => $value) {
            Setting::query()->updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
