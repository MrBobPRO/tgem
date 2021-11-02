<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ТГЭМ – Открытое акционерное общество</title>

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
    {{-- Simple components library --}}
    <link rel="stylesheet" href="{{ asset('js/components-library/styles.css') }}">
    {{-- Lightbox Gallery --}}
    <link rel="stylesheet" href="{{ asset('js/lc-lightbox-lite/css/lc_lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/lc-lightbox-lite/skins/dark.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

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
    {{-- Lightbox Gallery --}}
    <script src="{{ asset('js/lc-lightbox-lite/js/lc_lightbox.lite.min.js') }}"></script>
    {{-- Simple components library --}}
    <script src="{{ asset('js/components-library/scripts.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>