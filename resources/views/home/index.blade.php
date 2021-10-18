@extends('templates.master')
@section('content')

<main class="home">
    {{-- Main carousel start --}}
    <div class="owl-carousel-container">
        <div class="owl-carousel home__carousel" id="home__carousel">
            <div class="home__carousel-item">
                <img src="{{ asset('img/home/slide1.jpg') }}">
                <div class="home__carousel-text">
                    <span class="home__carousel-crumb">Главная Конструкция</span>
                    <h1 class="home__carousel-title">Строим будущее вместе</h1>
                    <p class="home__carousel-desc">Ведущая таджикская компания по строительству гидроэнергетических и инфраструктурных объектов</p>
                    <div class="home__carousel-actions">
                        <a href="#" class="home__carousel-more"></a>
                        <a href="#" class="home__carousel-play"><span class="material-icons">play_arrow</span> Посмотреть видео</a>
                    </div>
                </div>
            </div>

            <div class="home__carousel-item">
                <img src="{{ asset('img/home/slide2.jpg') }}">
                <div class="home__carousel-text">
                    <span class="home__carousel-crumb">Главная Конструкция</span>
                    <h1 class="home__carousel-title">Кайракумская ГЭС</h1>
                    <p class="home__carousel-desc">Ведущая таджикская компания по строительству гидроэнергетических и инфраструктурных объектов</p>
                    <div class="home__carousel-actions">
                        <a href="#" class="home__carousel-more"></a>
                        <a href="#" class="home__carousel-play"><span class="material-icons">play_arrow</span> Посмотреть видео</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection