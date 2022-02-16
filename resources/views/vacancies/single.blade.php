@extends('templates.master')

@section("title", $vacancy[$locale . 'Title'])

@section("meta-tags")
    @php
        //remove tags, slice body, replace many spaces by one, remove first whitespace
        $share_text = preg_replace('#<[^>]+>#', ' ', $vacancy[$locale . 'Body']);
        $share_text = str_replace('&nbsp;', ' ', $share_text);
        $share_text = mb_strlen($share_text) < 170 ? $share_text : mb_substr($share_text, 0, 166) . '...';
        $share_text = preg_replace('!\s+!', ' ', $share_text);
        $share_text = trim($share_text);
    @endphp

    <meta name="description" content="{{ $share_text }}">
    <meta property="og:description" content="{{ $share_text }}">
    <meta property="og:title" content="{{ $vacancy[$locale . 'Title'] }}" />
    <meta property="og:image" content="{{ asset('img/archive/medium/' . $vacancy->image) }}">
    <meta property="og:image:alt" content="{{ $vacancy[$locale . 'Title'] }}">
    <meta name="twitter:title" content="{{ $vacancy[$locale . 'Title'] }}">
    <meta name="twitter:image" content="{{ asset('img/archive/medium/' . $vacancy->image) }}">
@endsection

@section('content')

<main class="single-vacancy">
    @include("templates.crumbs", ["main_title" => "Вакансии", "main_link" => route("vacancies.index"), "page_title" => $vacancy[$locale . 'Title']])
    
    <div class="main-container single-vacancy__inner">
        <div class="share-container">
            <p class="share-container__text">Поделитсья :</p> 
            <div class="ya-share2" data-curtain data-services="vkontakte,facebook,odnoklassniki,telegram,twitter,viber,whatsapp,skype"></div>
        </div>
        {!! $vacancy[$locale . 'Body'] !!}
    </div>

</main>

<script src="https://yastatic.net/share2/share.js"></script>
@endsection