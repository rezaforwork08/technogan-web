@props(['eyebrow' => null, 'title', 'description' => null, 'align' => 'center'])

<div class="{{ $align === 'center' ? 'mx-auto max-w-2xl text-center' : 'max-w-2xl' }}">
    @if ($eyebrow)
        <p class="text-sm font-semibold uppercase tracking-widest text-accent-600">{{ $eyebrow }}</p>
    @endif
    <h2 class="mt-2 text-2xl font-extrabold text-slate-900 sm:text-3xl">{{ $title }}</h2>
    @if ($description)
        <p class="mt-3 text-base text-slate-500">{{ $description }}</p>
    @endif
</div>
