@extends('templates.master')
@section('content')

@section("title", $page_title)

<main class="vacancies-page">
    @include("templates.crumbs", ["main_title" => "Главная", "main_link" => route("home"), "page_title" => $page_title])
    
    <div class="main-container vacancies-page__inner">
        <div class="vacancies-list">
            @foreach ($vacancies as $vacancy)
                <a class="vacancies-list__item" href="{{ route('vacancies.single', $vacancy->url) }}">
                    <img class="vacancies-list__image" src="{{ asset('img/archive/medium/' . $vacancy->image) }}" alt="{{ $vacancy->title }}">
                </a>
            @endforeach
        </div>
    </div>

</main>

@endsection