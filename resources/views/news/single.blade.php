@extends('templates.master')

@section("title", $news[$locale . 'Title'])

@section("meta-tags")
    @php
        $shareText = App\Helpers\Helper::cleanShareText($news[$locale . 'Body']);
    @endphp
    <meta name="description" content="{{ $shareText }}">
    <meta property="og:description" content="{{ $shareText }}">
    <meta property="og:title" content="{{ $news[$locale . 'Title'] }}" />
    <meta property="og:image" content="{{ asset('img/archive/medium/' . $news->image) }}">
    <meta property="og:image:alt" content="{{ $news[$locale . 'Title'] }}">
    <meta name="twitter:title" content="{{ $news[$locale . 'Title'] }}">
    <meta name="twitter:image" content="{{ asset('img/archive/medium/' . $news->image) }}">
@endsection

@section('content')

<main class="single-news">
    <div class="main-container single-news__inner">
        <img class="single-news__image" src="{{ asset('img/archive/' . $news->image) }}" alt="{{$news[$locale . 'Title']}}">
        <h1 class="single-news__title">{{$news[$locale . 'Title']}}</h1>
        <div class="single-news__body">{!!$news[$locale . 'Body']!!}</div>
    </div>

    @if($news->images()->count() > 0)
        @include("templates.gallery", ["gallery_class" => "single-news__gallery", "query" => $news])
    @endif

</main>

@endsection