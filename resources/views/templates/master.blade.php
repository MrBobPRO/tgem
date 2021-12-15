<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>
        @hasSection ('title')
            @yield('title') – ТГЭМ
        @else
            ТГЭМ – Открытое акционерное общество
        @endif
    </title>

    {{-----------Meta tags start--------- --}}
    {{-- Same metas for all routes --}}
    <meta name="keywords" content="ТГЭМ, TGEM, Точикгидроэлектромонтаж, Строительство, Проективароние, Монтаж, Гидроэнергетика, Энергетика"/>
    <meta property="og:site_name" content="ТГЭМ">
    <meta property="og:type" content="object" />
    <meta name="twitter:card" content="summary_large_image">

    @hasSection ('meta-tags')
        @yield('meta-tags')
    @else
        <meta name="description" content="ТГЭМ – строим будущее вместе">
        <meta property="og:description" content="ТГЭМ – строим будущее вместе">
        <meta property="og:title" content="ТГЭМ" />
        <meta property="og:image" content="{{ asset('img/archive/logo-share.png') }}">
        <meta property="og:image:alt" content="ТГЕМ – Лого">
        <meta name="twitter:title" content="ТГЭМ">
        <meta name="twitter:image" content="{{ asset('img/archive/logo-share.png') }}">
    @endif
    {{----------- Meta tags end-----------}}

    {{-- Favicons for all devices --}}
    <link rel="icon" href="{{ asset('img/archive/medium/cropped-favi-32x32.png') }}" sizes="32x32">
    <link rel="icon" href="{{ asset('img/archive/medium/cropped-favi-192x192.png') }}" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('img/archive/medium/cropped-favi-180x180.png') }}">
    <meta name="msapplication-TileImage" content="{{ asset('img/archive/medium/cropped-favi-270x270.png') }}">

    {{-- Noindex remove on production --}}
    <meta name="robots" content="none"/>
    <meta name="googlebot" content="noindex, nofollow" />
    <meta name="yandex" content="none">

    {{-- Roboto & Montserrat Google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Material Icons --}}
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    {{-- Owl Carousel --}}
    <link rel="stylesheet" href="{{ asset('js/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/owl-carousel/owl.theme.default.min.css') }}">
    {{-- Simple components library --}}
    <link rel="stylesheet" href="{{ asset('js/components-library/styles.css') }}">
    {{-- Lightbox Gallery --}}
    <link rel="stylesheet" href="{{ asset('js/lc-lightbox-lite/css/lc_lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/lc-lightbox-lite/skins/dark.css') }}">
    {{-- Animate.css library --}}
    <link rel="stylesheet" href="{{ asset('css/animate/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">

</head>
<body>
    
    @include('templates.header')
    <div class="content">
        @yield('content')
        <div class="scroll-top" id="scroll_top">Вверх</div>
    </div>
    @include('templates.footer')
    
    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- Owl Carousel --}}
    <script src="{{ asset('js/owl-carousel/owl.carousel.min.js') }}"></script>
    {{-- Google Maps --}}
    @if($route == "contacts.index")
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAneCOkP0fjY3gOXV9DYFTdA59yWXDvNLw&callback=initMap" async defer></script>
    @endif
    {{-- Lightbox Gallery --}}
    <script src="{{ asset('js/lc-lightbox-lite/js/lc_lightbox.lite.min.js') }}"></script>
    {{-- Simple components library --}}
    <script src="{{ asset('js/components-library/scripts.js') }}"></script>
    {{-- Wow animation library --}}
    <script src="{{ asset('js/wow/wow.js') }}"></script>
    {{-- Jquery onAppear Plugin --}}
    <script src="{{ asset('js/jquery-appear/appear.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>