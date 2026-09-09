<x-layouts.app>

    <!-- Hero -->
    <section class="relative overflow-hidden bg-primary-950">
        <div class="pointer-events-none absolute inset-0 opacity-25" style="background-image: radial-gradient(circle at 15% 25%, #3B82F6 0, transparent 45%), radial-gradient(circle at 85% 75%, #BA8759 0, transparent 40%);"></div>

        <div class="relative mx-auto max-w-7xl px-4 py-24 sm:px-6 sm:py-32 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="text-sm font-semibold uppercase tracking-widest text-accent-400">IT Solution &amp; Support</p>
                <h1 class="mt-4 text-4xl font-extrabold leading-tight text-white sm:text-5xl lg:text-6xl">
                    Mitra Teknologi Terpercaya untuk Bisnis Anda
                </h1>
                <p class="mt-6 text-lg text-slate-300">
                    Technogan membantu perusahaan membangun infrastruktur IT, jaringan, sistem keamanan CCTV, dan layanan komputer yang andal — didukung teknisi bersertifikat dan respons cepat.
                </p>
                <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center rounded-full bg-white px-7 py-3.5 text-sm font-semibold text-primary-900 shadow-lg transition hover:bg-slate-100">
                        Konsultasi Gratis
                    </a>
                    <a href="{{ route('services.index') }}" class="inline-flex items-center justify-center rounded-full border border-white/30 px-7 py-3.5 text-sm font-semibold text-white transition hover:bg-white/10">
                        Lihat Layanan
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Services -->
    <section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
        <x-section-heading
            eyebrow="Layanan Kami"
            title="Solusi IT Menyeluruh untuk Setiap Kebutuhan"
            description="Dari perencanaan infrastruktur hingga dukungan harian, tim kami siap mendampingi operasional bisnis Anda."
        />

        <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @forelse ($services as $service)
                <x-service-card :service="$service" />
            @empty
                <p class="col-span-full text-center text-sm text-slate-500">Layanan segera hadir.</p>
            @endforelse
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('services.index') }}" class="inline-flex items-center text-sm font-semibold text-primary-800 hover:text-primary-600">
                Lihat semua layanan
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="bg-primary-950 py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-widest text-accent-400">Kenapa Pilih Technogan</p>
                    <h2 class="mt-3 text-3xl font-extrabold text-white sm:text-4xl">
                        Dukungan Teknis yang Bisa Anda Andalkan
                    </h2>
                    <p class="mt-4 text-slate-300">
                        Kami memahami bahwa sistem IT yang bermasalah berarti bisnis terhenti. Karena itu Technogan berkomitmen memberikan respons cepat, solusi tepat, dan dukungan berkelanjutan.
                    </p>

                    <ul class="mt-8 space-y-4">
                        @foreach ([
                            'Teknisi bersertifikat & berpengalaman di berbagai industri',
                            'Respons cepat dengan dukungan on-site maupun remote',
                            'Garansi layanan dan pemeliharaan berkala',
                            'Dukungan purna jual 24/7 untuk klien korporat',
                        ] as $point)
                            <li class="flex items-start gap-3">
                                <span class="mt-0.5 flex h-6 w-6 flex-none items-center justify-center rounded-full bg-accent-500/20 text-accent-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                </span>
                                <span class="text-sm text-slate-200">{{ $point }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    @foreach ([
                        ['value' => '10+', 'label' => 'Tahun Pengalaman'],
                        ['value' => '200+', 'label' => 'Proyek Selesai'],
                        ['value' => '150+', 'label' => 'Klien Aktif'],
                        ['value' => '24/7', 'label' => 'Dukungan Teknis'],
                    ] as $stat)
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-6 text-center">
                            <p class="text-3xl font-extrabold text-white">{{ $stat['value'] }}</p>
                            <p class="mt-1 text-sm text-slate-400">{{ $stat['label'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Process -->
    <section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
        <x-section-heading
            eyebrow="Proses Kerja"
            title="Mudah, Transparan, dan Terukur"
        />

        <div class="mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ([
                ['step' => '01', 'title' => 'Konsultasi', 'desc' => 'Diskusi kebutuhan & tantangan IT bisnis Anda.'],
                ['step' => '02', 'title' => 'Survei & Analisis', 'desc' => 'Tim kami meninjau kondisi lapangan dan sistem yang ada.'],
                ['step' => '03', 'title' => 'Implementasi', 'desc' => 'Pemasangan dan konfigurasi sesuai rencana kerja.'],
                ['step' => '04', 'title' => 'Dukungan Purna Jual', 'desc' => 'Pemeliharaan berkala dan dukungan teknis berkelanjutan.'],
            ] as $item)
                <div class="rounded-2xl border border-slate-100 p-6">
                    <span class="text-3xl font-extrabold text-primary-100">{{ $item['step'] }}</span>
                    <h3 class="mt-3 text-base font-bold text-slate-900">{{ $item['title'] }}</h3>
                    <p class="mt-2 text-sm text-slate-500">{{ $item['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Portfolio -->
    @if ($portfolios->isNotEmpty())
        <section class="bg-slate-50 py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <x-section-heading
                    eyebrow="Studi Kasus"
                    title="Dipercaya Berbagai Industri"
                    description="Beberapa proyek yang telah kami kerjakan bersama klien dari berbagai sektor."
                />

                <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($portfolios as $portfolio)
                        <x-portfolio-card :portfolio="$portfolio" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Testimonials -->
    @if ($testimonials->isNotEmpty())
        <section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
            <x-section-heading
                eyebrow="Testimoni"
                title="Apa Kata Klien Kami"
            />

            <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($testimonials as $testimonial)
                    <x-testimonial-card :testimonial="$testimonial" />
                @endforeach
            </div>
        </section>
    @endif

    <!-- Blog -->
    @if ($latestPosts->isNotEmpty())
        <section class="bg-slate-50 py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <x-section-heading
                    eyebrow="Artikel"
                    title="Tips & Wawasan Seputar IT"
                />

                <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($latestPosts as $post)
                        <x-blog-card :post="$post" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- CTA -->
    <section class="mx-auto max-w-7xl px-4 pb-20 sm:px-6 lg:px-8">
        <div class="relative overflow-hidden rounded-3xl bg-primary-800 px-8 py-14 text-center sm:px-16">
            <div class="pointer-events-none absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 80% 20%, #BA8759 0, transparent 45%);"></div>
            <div class="relative">
                <h2 class="text-2xl font-extrabold text-white sm:text-3xl">Siap Meningkatkan Infrastruktur IT Anda?</h2>
                <p class="mx-auto mt-3 max-w-xl text-slate-200">Konsultasikan kebutuhan IT Infrastructure, Networking, CCTV, atau Computer Service Anda bersama tim Technogan hari ini.</p>
                <a href="{{ route('contact') }}" class="mt-8 inline-flex items-center justify-center rounded-full bg-white px-7 py-3.5 text-sm font-semibold text-primary-900 shadow-lg transition hover:bg-slate-100">
                    Hubungi Kami Sekarang
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>
