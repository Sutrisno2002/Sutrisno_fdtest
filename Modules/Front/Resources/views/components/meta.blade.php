@php
    $page_title = isset($title) ? ($title ?: cache('seo_judul_beranda')) : cache('seo_judul_beranda');
    $page_description = isset($description)
        ? ($description ?:
        cache('seo_deskripsi_beranda'))
        : cache('seo_deskripsi_beranda');
    $page_keywords = isset($keywords) ? ($keywords ?: cache('seo_keyword_beranda')) : cache('seo_keyword_beranda');
    $page_image = isset($image) ? ($image ?: cache('seo_gambar_beranda')) : cache('seo_gambar_beranda');
    $page_url = request()->fullUrl();
@endphp


@env('production')
<meta name="robots" content="index">
<meta name="robots" content="follow">
@else
<meta name="robots" content="noindex">
<meta name="robots" content="nofollow">
@endenv

<!-- Primary Meta Tags -->
<title>{{ $page_title }} - {{ cache('app_name') }}</title>
<meta name="title" content="{{ $page_title }}" />
<meta name="description" content="{{ $page_description }}" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ $page_url }}" />
<meta property="og:title" content="{{ $page_title }}" />
<meta property="og:description" content="{{ $page_description }}" />
<meta property="og:image" content="{{ $page_image }}" />

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:url" content="{{ $page_url }}" />
<meta property="twitter:title" content="{{ $page_title }}" />
<meta property="twitter:description" content="{{ $page_description }}" />
<meta property="twitter:image" content="{{ $page_image }}" />
