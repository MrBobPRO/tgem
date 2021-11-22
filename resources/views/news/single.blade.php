@extends('templates.master')

@section("title", $news->title)

@section("meta-tags")
    @php
        //remove tags and slice body
        $share_text = preg_replace('#<[^>]+>#', ' ', $news->body);
        $share_text = mb_strlen($share_text) < 170 ? $share_text : mb_substr($share_text, 0, 166) . '...'    
    @endphp
    <meta name="description" content="{{ $share_text }}">
    <meta property="og:description" content="{{ $share_text }}">
    <meta property="og:title" content="{{ $news->title }}" />
    <meta property="og:image" content="{{ asset('img/archive/medium/' . $news->image) }}">
    <meta property="og:image:alt" content="{{ $news->title }}">
    <meta name="twitter:title" content="{{ $news->title }}">
    <meta name="twitter:image" content="{{ asset('img/archive/medium/' . $news->image) }}">
@endsection

@section('content')

<main class="single-news">
    <div class="main-container single-news__inner">
        <img class="single-news__image" src="{{ asset('img/archive/' . $news->image) }}" alt="{{$news->title}}">
        <h1 class="single-news__title">{{$news->title}}</h1>
        <div class="single-news__body">{!!$news->body!!}</div>
    </div>

    @if($news->images()->count() > 0)
        @include("templates.gallery", ["gallery_class" => "single-news__gallery", "query" => $news])
    @endif

</main>

@endsection