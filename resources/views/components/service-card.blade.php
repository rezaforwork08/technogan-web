@props(['service'])

<a href="{{ route('services.show', $service) }}" class="group relative flex flex-col overflow-hidden rounded-2xl bg-primary-950 shadow-sm transition hover:shadow-xl">
    <div class="relative h-48 w-full overflow-hidden">
        @if ($service->thumbnail)
            <img
                src="{{ asset('storage/' . $service->thumbnail) }}"
                alt="{{ $service->name }}"
                loading="lazy"
                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
            >
        @else
            <div class="flex h-full w-full items-center justify-center bg-primary-900 text-primary-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0 1 12 15a9.065 9.065 0 0 0-6.23-.693L5 14.5m14.8.8 1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0 1 12 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
                </svg>
            </div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-primary-950 via-primary-950/20 to-transparent"></div>
    </div>

    <div class="flex flex-1 flex-col justify-end p-6">
        <h3 class="text-lg font-bold text-white">{{ $service->name }}</h3>
        @if ($service->short_description)
            <p class="mt-2 line-clamp-2 text-sm text-slate-300">{{ $service->short_description }}</p>
        @endif
        <span class="mt-4 inline-flex items-center text-sm font-semibold text-accent-400">
            Selengkapnya
            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4 transition group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </span>
    </div>
</a>
