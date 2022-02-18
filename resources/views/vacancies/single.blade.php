@extends('templates.master')

@section("title", $vacancy[$locale . 'Title'])

@section("meta-tags")
    @php
        $shareText = App\Helpers\Helper::cleanShareText($vacancy[$locale . 'Body']);
    @endphp

    <meta name="description" content="{{ $shareText }}">
    <meta property="og:description" content="{{ $shareText }}">
    <meta property="og:title" content="{{ $vacancy[$locale . 'Title'] }}" />
    <meta property="og:image" content="{{ asset('img/archive/medium/' . $vacancy->image) }}">
    <meta property="og:image:alt" content="{{ $vacancy[$locale . 'Title'] }}">
    <meta name="twitter:title" content="{{ $vacancy[$locale . 'Title'] }}">
    <meta name="twitter:image" content="{{ asset('img/archive/medium/' . $vacancy->image) }}">
@endsection

@section('content')

<main class="single-vacancy">
    @include("templates.crumbs", ["main_title" => __("Вакансии"), "main_link" => route("vacancies.index"), "page_title" => $vacancy[$locale . 'Title']])
    
    <div class="main-container single-vacancy__inner">
        <div class="share-container">
            <p class="share-container__text">{{ __("Поделится") }} :</p> 
            <div class="ya-share2" data-curtain data-services="vkontakte,facebook,odnoklassniki,telegram,twitter,viber,whatsapp,skype"></div>
        </div>
        {!! $vacancy[$locale . 'Body'] !!}
    </div>

</main>

<script src="https://yastatic.net/share2/share.js"></script>
@endsection