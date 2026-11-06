<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('portfolio.name') . ' — Laravel Developer')</title>

    <!-- Essential SEO Meta Tags -->
    <meta name="description"
        content="Portfolio of Syed Tahsin Ahmed, a Dhaka-based Full-Stack Laravel Developer, Physics student, and software engineering aspirant.">
    <meta name="keywords"
        content="Laravel Developer, Full-Stack Developer, PHP, Vue.js, Bangladesh, Software Engineer, Tahsin Ahmed">
    <meta name="author" content="Syed Tahsin Ahmed">

    <!-- Open Graph / Social Media Meta Tags -->
    <meta property="og:title" content="@yield('title', config('portfolio.name') . ' — Portfolio')">
    <meta property="og:description"
        content="Explore the projects, skills, and journey of Syed Tahsin Ahmed — Full-Stack Laravel Developer.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/tahsin.jpg') }}">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', config('portfolio.name') . ' — Portfolio')">
    <meta name="twitter:description"
        content="Explore the portfolio of Syed Tahsin Ahmed, Full-Stack Laravel Developer.">
    <meta name="twitter:image" content="{{ asset('images/tahsin.jpg') }}">

    <!-- Fonts & Styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Sora:wght@600;700;800&display=swap">
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">

    <script>
        document.documentElement.dataset.theme = localStorage.getItem('theme') || 'dark';
    </script>
</head>

<body class="pf">
    @yield('content')
    <script src="{{ asset('js/portfolio.js') }}" defer></script>
</body>

</html>
