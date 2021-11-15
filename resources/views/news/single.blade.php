@extends('news.master')
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