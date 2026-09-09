<x-layouts.app
    :title="$post->meta_title ?? $post->title"
    :description="$post->meta_description ?? $post->excerpt"
    :image="$post->thumbnail ? asset('storage/' . $post->thumbnail) : null"
>
    @push('schema')
        <script type="application/ld+json">
            {!! json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'Article',
                'headline' => $post->title,
                'image' => $post->thumbnail ? asset('storage/' . $post->thumbnail) : null,
                'datePublished' => optional($post->published_at)->toIso8601String(),
                'dateModified' => $post->updated_at->toIso8601String(),
                'author' => ['@type' => 'Organization', 'name' => $post->author],
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
        </script>
    @endpush

    <x-page-hero eyebrow="Blog" :title="$post->title" :description="$post->published_at?->translatedFormat('d F Y') . ' · ' . $post->author" />

    <article class="mx-auto max-w-3xl px-4 py-16 sm:px-6 lg:px-8">
        <nav class="mb-8 text-sm text-slate-500">
            <a href="{{ route('home') }}" class="hover:text-primary-700">Beranda</a>
            <span class="mx-2">/</span>
            <a href="{{ route('blog.index') }}" class="hover:text-primary-700">Blog</a>
            <span class="mx-2">/</span>
            <span class="text-slate-700">{{ $post->title }}</span>
        </nav>

        @if ($post->thumbnail)
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="mb-10 h-72 w-full rounded-2xl object-cover sm:h-96">
        @endif

        <div class="prose prose-slate max-w-none">
            {!! $post->content !!}
        </div>
    </article>

    @if ($relatedPosts->isNotEmpty())
        <div class="bg-slate-50 py-16">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="text-lg font-bold text-slate-900">Artikel Terkait</h2>
                <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-3">
                    @foreach ($relatedPosts as $related)
                        <x-blog-card :post="$related" />
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</x-layouts.app>
