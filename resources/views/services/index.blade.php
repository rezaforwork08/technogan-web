<x-layouts.app
    title="Layanan IT Infrastructure, Networking, CCTV & Computer Service"
    description="Technogan menyediakan layanan IT Infrastructure, Networking, CCTV, dan Computer Service yang lengkap untuk kebutuhan bisnis Anda."
>
    <x-page-hero
        eyebrow="Layanan Kami"
        title="Solusi IT Lengkap untuk Bisnis Anda"
        description="Pilih layanan sesuai kebutuhan infrastruktur teknologi perusahaan Anda."
    />

    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        @forelse ($categories as $category)
            @if ($category->services->isNotEmpty())
                <div class="mb-16 last:mb-0">
                    <h2 class="text-xl font-bold text-slate-900">{{ $category->name }}</h2>
                    <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($category->services as $service)
                            <x-service-card :service="$service" />
                        @endforeach
                    </div>
                </div>
            @endif
        @empty
        @endforelse

        @if ($uncategorized->isNotEmpty())
            <div class="mb-16 last:mb-0">
                @if ($categories->isNotEmpty())
                    <h2 class="text-xl font-bold text-slate-900">Layanan Lainnya</h2>
                @endif
                <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($uncategorized as $service)
                        <x-service-card :service="$service" />
                    @endforeach
                </div>
            </div>
        @endif

        @if ($categories->flatMap->services->isEmpty() && $uncategorized->isEmpty())
            <p class="text-center text-sm text-slate-500">Layanan segera hadir.</p>
        @endif
    </div>
</x-layouts.app>
