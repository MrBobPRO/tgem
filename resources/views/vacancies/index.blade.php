@extends('templates.master')
@section('content')

<main class="news-page">
    @include("templates.crumbs", ["main_title" => "Главная", "main_link" => route("home"), "page_title" => $page_title])
    
    <div class="main-container vacancies-page__inner">
        <div class="vacancies-list">
            @foreach ($vacancies as $vacancy)
                <div class="vacancies-list__item">
                    <img class="vacancies-list__image" src="{{ asset('img/vacancies/' . $vacancy->image) }}">
                    <a class="vacancies-list__link" href="#">
                        <span class="vacancy-list__span">Вакансия</span>
                        <h2 class="vacancy-list__title">{{ $vacancy->title }}</h2>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

</main>

@endsection