<x-layouts.app
    title="Blog & Artikel IT"
    description="Tips, wawasan, dan tren seputar IT Infrastructure, Networking, CCTV, dan Computer Service dari tim Technogan."
>
    <x-page-hero
        eyebrow="Blog"
        title="Tips &amp; Wawasan Seputar IT"
        description="Kumpulan artikel untuk membantu Anda memahami teknologi dan keamanan sistem IT."
    />

    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        @if ($posts->isEmpty())
            <p class="text-center text-sm text-slate-500">Artikel segera hadir.</p>
        @else
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $post)
                    <x-blog-card :post="$post" />
                @endforeach
            </div>

            <div class="mt-12">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</x-layouts.app>
