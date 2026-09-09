<x-layouts.app
    :title="$portfolio->meta_title ?? $portfolio->title"
    :description="$portfolio->meta_description ?? $portfolio->result"
    :image="$portfolio->thumbnail ? asset('storage/' . $portfolio->thumbnail) : null"
>
    <x-page-hero eyebrow="Studi Kasus" :title="$portfolio->title" :description="$portfolio->client_name . ($portfolio->industry ? ' · ' . $portfolio->industry : '')" />

    <div class="mx-auto max-w-5xl px-4 py-16 sm:px-6 lg:px-8">
        <nav class="mb-8 text-sm text-slate-500">
            <a href="{{ route('home') }}" class="hover:text-primary-700">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ route('portfolios.index') }}" class="hover:text-primary-700">Portofolio</a>
            <span class="mx-2">/</span>
            <span class="text-slate-700">{{ $portfolio->title }}</span>
        </nav>

        @if ($portfolio->thumbnail)
            <img src="{{ asset('storage/' . $portfolio->thumbnail) }}" alt="{{ $portfolio->title }}" class="mb-10 h-72 w-full rounded-2xl object-cover sm:h-96">
        @endif

        <div class="grid grid-cols-1 gap-8 sm:grid-cols-3">
            @if ($portfolio->challenge)
                <div class="rounded-2xl bg-slate-50 p-6">
                    <h2 class="text-sm font-semibold uppercase tracking-wide text-primary-800">Tantangan</h2>
                    <p class="mt-3 text-sm text-slate-600">{{ $portfolio->challenge }}</p>
                </div>
            @endif
            @if ($portfolio->solution)
                <div class="rounded-2xl bg-slate-50 p-6">
                    <h2 class="text-sm font-semibold uppercase tracking-wide text-primary-800">Solusi</h2>
                    <p class="mt-3 text-sm text-slate-600">{{ $portfolio->solution }}</p>
                </div>
            @endif
            @if ($portfolio->result)
                <div class="rounded-2xl bg-slate-50 p-6">
                    <h2 class="text-sm font-semibold uppercase tracking-wide text-primary-800">Hasil</h2>
                    <p class="mt-3 text-sm text-slate-600">{{ $portfolio->result }}</p>
                </div>
            @endif
        </div>

        @if ($portfolio->images->isNotEmpty())
            <div class="mt-12">
                <h2 class="text-lg font-bold text-slate-900">Galeri</h2>
                <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
                    @foreach ($portfolio->images as $image)
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $portfolio->title }}" loading="lazy" class="h-64 w-full rounded-2xl object-cover">
                    @endforeach
                </div>
            </div>
        @endif

        @if ($relatedPortfolios->isNotEmpty())
            <div class="mt-16">
                <h2 class="text-lg font-bold text-slate-900">Proyek Terkait</h2>
                <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-3">
                    @foreach ($relatedPortfolios as $related)
                        <x-portfolio-card :portfolio="$related" />
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-layouts.app>
