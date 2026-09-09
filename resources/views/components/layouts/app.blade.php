<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <x-seo :title="$title ?? null" :description="$description ?? null" :image="$image ?? null" />

    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'LocalBusiness',
            'name' => 'Technogan',
            'description' => 'Jasa IT Solution & Support: IT Infrastructure, Networking, CCTV, Computer Service.',
            'url' => url('/'),
            'telephone' => \App\Models\Setting::get('company_phone'),
            'email' => \App\Models\Setting::get('company_email'),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => \App\Models\Setting::get('company_address'),
            ],
            'sameAs' => array_values(array_filter([
                \App\Models\Setting::get('social_facebook'),
                \App\Models\Setting::get('social_instagram'),
                \App\Models\Setting::get('social_linkedin'),
                \App\Models\Setting::get('social_youtube'),
            ])),
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>

    @stack('schema')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-slate-700 antialiased">

    <x-navbar />

    <main>
        @if (session('success'))
            <div class="fixed inset-x-0 top-20 z-50 mx-auto w-full max-w-md px-4" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
                <div class="rounded-lg bg-green-600 px-4 py-3 text-sm font-medium text-white shadow-lg">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        {{ $slot }}
    </main>

    <x-footer />
    <x-whatsapp-button />

</body>
</html>
