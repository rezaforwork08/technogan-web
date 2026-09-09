<x-layouts.app
    title="Tentang Kami"
    description="Technogan adalah perusahaan jasa IT Solution & Support yang berpengalaman dalam IT Infrastructure, Networking, CCTV, dan Computer Service."
>
    <x-page-hero
        eyebrow="Tentang Kami"
        title="Mengenal Technogan"
        description="Perusahaan jasa IT Solution & Support yang berkomitmen menghadirkan teknologi andal bagi bisnis Anda."
    />

    <section class="mx-auto max-w-5xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-12 sm:grid-cols-2">
            <div>
                <h2 class="text-xl font-bold text-slate-900">Visi</h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-600">
                    Menjadi mitra IT Solution & Support terdepan yang dipercaya oleh bisnis di berbagai industri melalui layanan yang andal, responsif, dan berkelanjutan.
                </p>
            </div>
            <div>
                <h2 class="text-xl font-bold text-slate-900">Misi</h2>
                <ul class="mt-3 space-y-2 text-sm leading-relaxed text-slate-600">
                    <li>Menyediakan solusi IT Infrastructure, Networking, CCTV, dan Computer Service yang berkualitas.</li>
                    <li>Memberikan dukungan teknis yang cepat, tepat, dan profesional.</li>
                    <li>Membangun hubungan jangka panjang dengan klien melalui layanan purna jual yang konsisten.</li>
                </ul>
            </div>
        </div>

        <div class="mt-16">
            <h2 class="text-xl font-bold text-slate-900">Nilai Perusahaan</h2>
            <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-3">
                @foreach ([
                    ['title' => 'Terpercaya', 'desc' => 'Setiap solusi dikerjakan dengan standar teknis yang teruji dan transparan.'],
                    ['title' => 'Responsif', 'desc' => 'Tim kami siap merespons kebutuhan klien secara cepat dan efisien.'],
                    ['title' => 'Berkelanjutan', 'desc' => 'Kami mendampingi klien jauh melampaui tahap instalasi awal.'],
                ] as $value)
                    <div class="rounded-2xl border border-slate-100 p-6">
                        <h3 class="text-base font-bold text-slate-900">{{ $value['title'] }}</h3>
                        <p class="mt-2 text-sm text-slate-500">{{ $value['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-16 rounded-2xl bg-primary-950 p-8 text-center">
            <h2 class="text-xl font-bold text-white">Mari Berdiskusi Tentang Kebutuhan IT Anda</h2>
            <p class="mt-2 text-sm text-slate-300">Tim Technogan siap membantu merancang solusi terbaik untuk bisnis Anda.</p>
            <a href="{{ route('contact') }}" class="mt-6 inline-flex items-center justify-center rounded-full bg-white px-7 py-3 text-sm font-semibold text-primary-900 hover:bg-slate-100">
                Hubungi Kami
            </a>
        </div>
    </section>
</x-layouts.app>
