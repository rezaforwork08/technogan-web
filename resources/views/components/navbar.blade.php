@php
    $navItems = [
        ['label' => 'Beranda', 'route' => 'home'],
        ['label' => 'Layanan', 'route' => 'services.index'],
        ['label' => 'Portofolio', 'route' => 'portfolios.index'],
        ['label' => 'Blog', 'route' => 'blog.index'],
        ['label' => 'Tentang Kami', 'route' => 'about'],
    ];
@endphp

<header
    x-data="{ mobileOpen: false, scrolled: false }"
    x-init="scrolled = window.scrollY > 10; window.addEventListener('scroll', () => scrolled = window.scrollY > 10)"
    class="sticky top-0 z-40 border-b border-slate-100 bg-white/95 backdrop-blur transition-shadow"
    :class="scrolled ? 'shadow-md' : 'shadow-none'"
>
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="flex items-center gap-2">
            <span class="text-xl font-extrabold tracking-tight text-primary-800">Techno<span class="text-accent-500">gan</span></span>
        </a>

        <ul class="hidden items-center gap-8 lg:flex">
            @foreach ($navItems as $item)
                <li>
                    <a
                        href="{{ route($item['route']) }}"
                        class="text-sm font-semibold transition hover:text-primary-700 {{ request()->routeIs($item['route']) ? 'text-primary-800' : 'text-slate-600' }}"
                    >
                        {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="hidden lg:block">
            <a href="{{ route('contact') }}" class="inline-flex items-center rounded-full bg-primary-800 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-primary-700">
                Konsultasi Gratis
            </a>
        </div>

        <button
            @click="mobileOpen = true"
            type="button"
            class="inline-flex items-center justify-center rounded-md p-2 text-slate-700 lg:hidden"
            aria-label="Buka menu"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </nav>

    <!-- Mobile drawer -->
    <div
        x-show="mobileOpen"
        x-cloak
        class="fixed inset-0 z-50 lg:hidden"
    >
        <div
            x-show="mobileOpen"
            x-transition:enter="transition-opacity ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="mobileOpen = false"
            class="fixed inset-0 bg-slate-900/50"
        ></div>

        <div
            x-show="mobileOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="fixed inset-y-0 right-0 w-full max-w-xs overflow-y-auto bg-white px-6 py-6 shadow-xl"
        >
            <div class="flex items-center justify-between">
                <span class="text-lg font-extrabold text-primary-800">Technogan</span>
                <button @click="mobileOpen = false" type="button" class="rounded-md p-2 text-slate-500" aria-label="Tutup menu">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <ul class="mt-8 space-y-1">
                @foreach ($navItems as $item)
                    <li>
                        <a
                            href="{{ route($item['route']) }}"
                            class="block rounded-lg px-3 py-3 text-base font-semibold {{ request()->routeIs($item['route']) ? 'bg-primary-50 text-primary-800' : 'text-slate-700' }}"
                        >
                            {{ $item['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <a href="{{ route('contact') }}" class="mt-6 block rounded-full bg-primary-800 px-5 py-3 text-center text-sm font-semibold text-white">
                Konsultasi Gratis
            </a>
        </div>
    </div>
</header>
