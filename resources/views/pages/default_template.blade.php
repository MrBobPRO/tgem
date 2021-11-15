@extends('templates.master')
@section('content')

<main class="default-page">
    @include("templates.crumbs", ["main_title" => "Главная", "main_link" => route("home"), "page_title" => $page->title])

    @if($page->main_text != '')
    <section class="main-container default-page__main">
        <div class="default-page__main-body">
            <h2 class="title--styled title--styled-left default-page__main-title"><span class="seperator--left"></span>{{ $page->title }}</h2>
            <div class="default-page__main-text">{!! $page->main_text !!}</div>
        </div>

        <img class="default-page__main-image" src="{{ asset('img/archive/' . $page->image) }}">
    </section>
    @endif

    @if($page->additional_text_title != '' || $page->additional_text_body != '')
    <section class="main-container default-page__additional">
        <h2 class="default-page__additional-title">{{ $page->additional_text_title }}</h2>
        <div class="default-page__additional-body">{!! $page->additional_text_body !!}</div>
    </section>
    @endif

    @if($page->images()->count() > 0)
        @include("templates.gallery", ["gallery_class" => "default-page__gallery", "query" => $page])
    @endif

</main>

@endsection