<x-layouts.app
    title="Portofolio Proyek"
    description="Lihat berbagai proyek IT Infrastructure, Networking, CCTV, dan Computer Service yang telah dikerjakan Technogan."
>
    <x-page-hero
        eyebrow="Portofolio"
        title="Proyek yang Telah Kami Kerjakan"
        description="Kepercayaan klien dari berbagai industri terhadap solusi IT dari Technogan."
    />

    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        @if ($portfolios->isEmpty())
            <p class="text-center text-sm text-slate-500">Portofolio segera hadir.</p>
        @else
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($portfolios as $portfolio)
                    <x-portfolio-card :portfolio="$portfolio" />
                @endforeach
            </div>

            <div class="mt-12">
                {{ $portfolios->links() }}
            </div>
        @endif
    </div>
</x-layouts.app>
