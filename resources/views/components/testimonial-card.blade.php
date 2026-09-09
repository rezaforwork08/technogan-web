@props(['testimonial'])

<div class="flex h-full flex-col rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
    <div class="flex text-accent-500">
        @for ($i = 0; $i < $testimonial->rating; $i++)
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                <path d="M10 15.27 16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
            </svg>
        @endfor
    </div>
    <p class="mt-4 flex-1 text-sm leading-relaxed text-slate-600">&ldquo;{{ $testimonial->message }}&rdquo;</p>
    <div class="mt-6 flex items-center gap-3">
        @if ($testimonial->photo)
            <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="{{ $testimonial->client_name }}" class="h-11 w-11 rounded-full object-cover">
        @else
            <div class="flex h-11 w-11 items-center justify-center rounded-full bg-primary-100 text-sm font-bold text-primary-800">
                {{ strtoupper(substr($testimonial->client_name, 0, 1)) }}
            </div>
        @endif
        <div>
            <p class="text-sm font-semibold text-slate-900">{{ $testimonial->client_name }}</p>
            <p class="text-xs text-slate-500">{{ collect([$testimonial->position, $testimonial->company])->filter()->implode(', ') }}</p>
        </div>
    </div>
</div>
