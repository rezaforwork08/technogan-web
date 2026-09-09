@php
    use App\Models\Setting;

    $address = Setting::get('company_address');
    $phone = Setting::get('company_phone');
    $email = Setting::get('company_email');
    $hours = Setting::get('company_hours');
@endphp

<footer class="bg-primary-950 text-slate-300">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-10 md:grid-cols-4">
            <div>
                <span class="text-xl font-extrabold text-white">Techno<span class="text-accent-400">gan</span></span>
                <p class="mt-4 text-sm leading-relaxed text-slate-400">
                    Mitra IT Solution &amp; Support terpercaya untuk IT Infrastructure, Networking, CCTV, dan Computer Service bisnis Anda.
                </p>
                <div class="mt-5 flex gap-3">
                    @foreach ([
                        'social_facebook' => 'Facebook',
                        'social_instagram' => 'Instagram',
                        'social_linkedin' => 'LinkedIn',
                        'social_youtube' => 'YouTube',
                    ] as $key => $label)
                        @if (Setting::get($key))
                            <a href="{{ Setting::get($key) }}" target="_blank" rel="noopener" aria-label="{{ $label }}" class="flex h-9 w-9 items-center justify-center rounded-full bg-primary-900 text-slate-300 transition hover:bg-accent-500 hover:text-white">
                                <span class="text-xs font-semibold">{{ substr($label, 0, 1) }}</span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wide text-white">Layanan</h3>
                <ul class="mt-4 space-y-3 text-sm">
                    <li><a href="{{ route('services.index') }}" class="hover:text-accent-400">Semua Layanan</a></li>
                    <li><a href="{{ route('portfolios.index') }}" class="hover:text-accent-400">Portofolio</a></li>
                    <li><a href="{{ route('blog.index') }}" class="hover:text-accent-400">Blog</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wide text-white">Perusahaan</h3>
                <ul class="mt-4 space-y-3 text-sm">
                    <li><a href="{{ route('about') }}" class="hover:text-accent-400">Tentang Kami</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-accent-400">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wide text-white">Kontak</h3>
                <ul class="mt-4 space-y-3 text-sm text-slate-400">
                    @if ($address)
                        <li>{{ $address }}</li>
                    @endif
                    @if ($phone)
                        <li><a href="tel:{{ $phone }}" class="hover:text-accent-400">{{ $phone }}</a></li>
                    @endif
                    @if ($email)
                        <li><a href="mailto:{{ $email }}" class="hover:text-accent-400">{{ $email }}</a></li>
                    @endif
                    @if ($hours)
                        <li>{{ $hours }}</li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="mt-12 flex flex-col items-center justify-between gap-4 border-t border-primary-900 pt-8 text-xs text-slate-500 sm:flex-row">
            <p>&copy; {{ now()->year }} Technogan. Seluruh hak cipta dilindungi.</p>
        </div>
    </div>
</footer>
