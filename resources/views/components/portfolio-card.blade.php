@props(['portfolio'])

<a href="{{ route('portfolios.show', $portfolio) }}" class="group flex flex-col overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm transition hover:shadow-lg">
    <div class="relative h-44 w-full overflow-hidden bg-slate-100">
        @if ($portfolio->thumbnail)
            <img
                src="{{ asset('storage/' . $portfolio->thumbnail) }}"
                alt="{{ $portfolio->title }}"
                loading="lazy"
                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
            >
        @endif
        @if ($portfolio->industry)
            <span class="absolute left-3 top-3 rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-primary-800">
                {{ $portfolio->industry }}
            </span>
        @endif
    </div>
    <div class="flex flex-1 flex-col p-5">
        <p class="text-xs font-semibold uppercase tracking-wide text-accent-600">{{ $portfolio->client_name }}</p>
        <h3 class="mt-1 text-base font-bold text-slate-900">{{ $portfolio->title }}</h3>
        @if ($portfolio->result)
            <p class="mt-2 line-clamp-2 text-sm text-slate-500">{{ $portfolio->result }}</p>
        @endif
    </div>
</a>
