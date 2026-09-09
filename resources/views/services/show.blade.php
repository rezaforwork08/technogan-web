<x-layouts.app
    :title="$service->meta_title ?? $service->name"
    :description="$service->meta_description ?? $service->short_description"
    :image="$service->thumbnail ? asset('storage/' . $service->thumbnail) : null"
>
    @push('schema')
        <script type="application/ld+json">
            {!! json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Beranda', 'item' => route('home')],
                    ['@type' => 'ListItem', 'position' => 2, 'name' => 'Layanan', 'item' => route('services.index')],
                    ['@type' => 'ListItem', 'position' => 3, 'name' => $service->name, 'item' => route('services.show', $service)],
                ],
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
        </script>
    @endpush

    <x-page-hero eyebrow="Layanan" :title="$service->name" :description="$service->short_description" />

    <div class="mx-auto max-w-5xl px-4 py-16 sm:px-6 lg:px-8">
        <nav class="mb-8 text-sm text-slate-500">
            <a href="{{ route('home') }}" class="hover:text-primary-700">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ route('services.index') }}" class="hover:text-primary-700">Layanan</a>
            <span class="mx-2">/</span>
            <span class="text-slate-700">{{ $service->name }}</span>
        </nav>

        @if ($service->thumbnail)
            <img src="{{ asset('storage/' . $service->thumbnail) }}" alt="{{ $service->name }}" class="mb-10 h-72 w-full rounded-2xl object-cover sm:h-96">
        @endif

        @if ($service->description)
            <div class="prose prose-slate max-w-none">
                {!! $service->description !!}
            </div>
        @endif

        @if (!empty($service->coverage_points))
            <div class="mt-10 rounded-2xl bg-slate-50 p-6">
                <h2 class="text-lg font-bold text-slate-900">Cakupan Pekerjaan</h2>
                <ul class="mt-4 grid grid-cols-1 gap-3 sm:grid-cols-2">
                    @foreach ($service->coverage_points as $point)
                        <li class="flex items-start gap-3 text-sm text-slate-600">
                            <span class="mt-0.5 flex h-5 w-5 flex-none items-center justify-center rounded-full bg-accent-100 text-accent-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                            </span>
                            {{ $point }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mt-12 rounded-2xl bg-primary-950 p-8 text-center">
            <h2 class="text-xl font-bold text-white">Butuh Layanan {{ $service->name }}?</h2>
            <p class="mt-2 text-sm text-slate-300">Konsultasikan kebutuhan Anda dengan tim teknis kami sekarang.</p>
            <a href="{{ route('contact') }}" class="mt-6 inline-flex items-center justify-center rounded-full bg-white px-7 py-3 text-sm font-semibold text-primary-900 hover:bg-slate-100">
                Konsultasi Gratis
            </a>
        </div>

        @if ($relatedServices->isNotEmpty())
            <div class="mt-16">
                <h2 class="text-lg font-bold text-slate-900">Layanan Terkait</h2>
                <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-3">
                    @foreach ($relatedServices as $related)
                        <x-service-card :service="$related" />
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-layouts.app>
