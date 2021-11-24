@extends('templates.master')

@section('content')

<main class="search-page">

    <section class="crumbs" style="background-image: url({{ asset('img/archive/default_page_bg.jpg') }})">
        <h1 class="crumbs__title">Поиск</h1>

        <p class="crumbs__text search-page__crumbs-text">Поиск по ключевому слову "{{ $keyword }}". Найденных результатов : {{ $results_count }}</p>

        <form action="{{ route('search') }}" method="GET" class="search-page__form">
            <button type="submit" class="search-page__form-button">
                <span class="material-icons-outlined search-page__form-icon">search</span>
            </button>
            <input type="text" name="keyword" placeholder="Задайте новый поиск" class="search-page__input" required
                minlength="3">
        </form>
    </section>

    <section class="main-container search-results">
        @if(!$results_count)
            <h2>К сожалению по вышему запросу ничего не найдено. Попробуйте новый поиск !</h2>
        @endif

        {{-- pages --}}
        <div class="search-results__list">
            @foreach ($result->pages as $item)
            <a href="/{{$item->dropdown->url . '/' . $item->url}}" class="search-results__item">
                <img class="search-results__image" src="{{ asset('img/archive/medium/' . $item->image) }}">
                <div class="search-results__text">
                    <p class="search-results__category">Страницы</p>
                    <h3 class="search-results__title">{{ $item->title }}</h3>
                </div>
            </a>
            @endforeach

            {{-- news --}}
            @foreach ($result->news as $item)
            <a href="{{ route('news.single', $item->url) }}" class="search-results__item">
                <img class="search-results__image" src="{{ asset('img/archive/medium/' . $item->image) }}">
                <div class="search-results__text">
                    @php
                    $formatted = Carbon\Carbon::create($item->created_at)->locale("ru");
                    @endphp
                    <p class="search-results__category">Новости / {{ $formatted->isoFormat("DD MMMM YYYY")}}</p>
                    <h3 class="search-results__title">{{ $item->title }}</h3>
                </div>
            </a>
            @endforeach


            {{-- projects --}}
            @foreach ($result->projects as $item)
            <a href="{{ route('projects.single', $item->url) }}" class="search-results__item">
                <img class="search-results__image" src="{{ asset('img/archive/medium/' . $item->image) }}">
                <div class="search-results__text">
                    @php
                    $formatted = Carbon\Carbon::create($item->created_at)->locale("ru");
                    @endphp
                    <p class="search-results__category">Проекты / {{ $formatted->isoFormat("DD MMMM YYYY")}}</p>
                    <h3 class="search-results__title">{{ $item->title }}</h3>
                </div>
            </a>
            @endforeach


            {{-- galleries --}}
            @foreach ($result->galleries as $item)
            <a href="{{ route('galleries.single', $item->url) }}" class="search-results__item">
                <img class="search-results__image" src="{{ asset('img/archive/medium/' . $item->thumbnail) }}">
                <div class="search-results__text">
                    @php
                    $formatted = Carbon\Carbon::create($item->created_at)->locale("ru");
                    @endphp
                    <p class="search-results__category">Галерея / {{ $formatted->isoFormat("DD MMMM YYYY")}}</p>
                    <h3 class="search-results__title">{{ $item->title }}</h3>
                </div>
            </a>
            @endforeach


            {{-- vacancies --}}
            @foreach ($result->vacancies as $item)
            <a href="{{ route('vacancies.single', $item->url) }}" class="search-results__item">
                <img class="search-results__image" src="{{ asset('img/archive/medium/' . $item->image) }}">
                <div class="search-results__text">
                    @php
                    $formatted = Carbon\Carbon::create($item->created_at)->locale("ru");
                    @endphp
                    <p class="search-results__category">Вакансии / {{ $formatted->isoFormat("DD MMMM YYYY")}}</p>
                    <h3 class="search-results__title">{{ $item->title }}</h3>
                </div> 
            </a>
            @endforeach

        </div>
    </section>

</main>

@endsection