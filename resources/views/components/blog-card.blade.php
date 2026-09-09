@props(['post'])

<a href="{{ route('blog.show', $post) }}" class="group flex flex-col overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm transition hover:shadow-lg">
    <div class="relative h-44 w-full overflow-hidden bg-slate-100">
        @if ($post->thumbnail)
            <img
                src="{{ asset('storage/' . $post->thumbnail) }}"
                alt="{{ $post->title }}"
                loading="lazy"
                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
            >
        @endif
    </div>
    <div class="flex flex-1 flex-col p-5">
        @if ($post->category)
            <p class="text-xs font-semibold uppercase tracking-wide text-accent-600">{{ $post->category->name }}</p>
        @endif
        <h3 class="mt-1 line-clamp-2 text-base font-bold text-slate-900">{{ $post->title }}</h3>
        @if ($post->excerpt)
            <p class="mt-2 line-clamp-2 text-sm text-slate-500">{{ $post->excerpt }}</p>
        @endif
        <p class="mt-4 text-xs text-slate-400">{{ $post->published_at?->translatedFormat('d F Y') }}</p>
    </div>
</a>
