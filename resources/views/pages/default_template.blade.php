@extends('templates.master')

@section("title", $page[$locale . 'Title'])

@section('content')

<main class="default-page">
    @include("templates.crumbs", ["main_title" => "Главная", "main_link" => route("home"), "page_title" => $page[$locale . 'Title']])

    @if($page[$locale . 'MainText'] != '')
    <section class="main-container default-page__main">
        <div class="default-page__main-body">
            <h2 class="title--styled title--styled-left default-page__main-title"><span class="seperator--left"></span>{{ $page[$locale . 'Title'] }}</h2>
            <div class="default-page__main-text">{!! $page[$locale . 'MainText'] !!}</div>
        </div>

        <img class="default-page__main-image" src="{{ asset('img/archive/' . $page->image) }}">
    </section>
    @endif

    @if($page[$locale . 'AdditionalTextTitle'] != '' || $page[$locale . 'AdditionalTextBody'] != '')
    <section class="main-container default-page__additional">
        <h2 class="default-page__additional-title">{{ $page[$locale . 'AdditionalTextTitle'] }}</h2>
        <div class="default-page__additional-body">{!! $page[$locale . 'AdditionalTextBody'] !!}</div>
    </section>
    @endif

    @if($page->images()->count() > 0)
        @include("templates.gallery", ["gallery_class" => "default-page__gallery", "query" => $page])
    @endif

</main>

@endsection