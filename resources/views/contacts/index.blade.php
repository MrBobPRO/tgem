@extends('templates.master')
@section('content')

<main class="contacs-page">
    @include("templates.crumbs", ["main_title" => "Главная", "main_link" => route("home"), "page_title" => $page_title])

    <section class="contacts__main-section">
        <div class="main-container contacts__list">
            <div class="contacts__list-item">
                <h2 class="contacts__list-title">Адрес:</h2>
                <p class="contacts__list-text">734060, Республика Таджикистан, г.Душанбе, ул. Н. Хувайдуллаева 377/1</p>
            </div>

            <div class="contacts__list-item">
                <h2 class="contacts__list-title">Звоните нам:</h2>
                <p class="contacts__list-text">
                    <a class="contacts__list-link" href="#">Телефон: +992 (37) 238-1111</a>
                    <a class="contacts__list-link" href="#">Телефон: +992 (37) 238-1313</a>
                </p>
            </div>

            <div class="contacts__list-item">
                <h2 class="contacts__list-title">Напишите нам</h2>
                <a class="contacts__list-link" href="#">Почта: info@tgem.tj</a>
            </div>
        </div>
    </section>

    <section class="contacts__map" id="map"></section>

</main>



@endsection