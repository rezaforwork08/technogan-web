@props([
    'title' => null,
    'description' => null,
    'image' => null,
])

@php
    use App\Models\Setting;

    $siteName = 'Technogan';
    $defaultTitle = Setting::get('seo_default_title', 'Technogan — IT Solution & Support Terpercaya');
    $defaultDescription = Setting::get('seo_default_description', 'Technogan menyediakan jasa IT Infrastructure, Networking, CCTV, dan Computer Service untuk bisnis Anda.');

    $pageTitle = $title ? "{$title} | {$siteName}" : $defaultTitle;
    $pageDescription = $description ?? $defaultDescription;
    $pageImage = $image ?? asset('images/og-default.jpg');
@endphp

<title>{{ $pageTitle }}</title>
<meta name="description" content="{{ $pageDescription }}">
<link rel="canonical" href="{{ url()->current() }}">

<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $pageDescription }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ $pageImage }}">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $pageTitle }}">
<meta name="twitter:description" content="{{ $pageDescription }}">
<meta name="twitter:image" content="{{ $pageImage }}">
