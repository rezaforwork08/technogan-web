@props(['eyebrow' => null, 'title', 'description' => null])

<section class="relative overflow-hidden bg-primary-950 py-20 sm:py-24">
    <div class="pointer-events-none absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 20% 20%, #3B82F6 0, transparent 45%), radial-gradient(circle at 80% 60%, #BA8759 0, transparent 40%);"></div>

    <div class="relative mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
        @if ($eyebrow)
            <p class="text-sm font-semibold uppercase tracking-widest text-accent-400">{{ $eyebrow }}</p>
        @endif
        <h1 class="mt-3 text-3xl font-extrabold text-white sm:text-4xl lg:text-5xl">{{ $title }}</h1>
        @if ($description)
            <p class="mt-4 text-base text-slate-300 sm:text-lg">{{ $description }}</p>
        @endif
    </div>
</section>
