@extends('templates.master')

@section("title", $project[$locale . 'Title'])

@section("meta-tags")
    @php
        //remove tags and slice body
        $share_text = preg_replace('#<[^>]+>#', ' ', $project[$locale . 'Body']);
        $share_text = mb_strlen($share_text) < 170 ? $share_text : mb_substr($share_text, 0, 166) . '...'    
    @endphp
    <meta name="description" content="{{ $share_text }}">
    <meta property="og:description" content="{{ $share_text }}">
    <meta property="og:title" content="{{ $project[$locale . 'Title'] }}" />
    <meta property="og:image" content="{{ asset('img/archive/medium/' . $project->image) }}">
    <meta property="og:image:alt" content="{{ $project[$locale . 'Title'] }}">
    <meta name="twitter:title" content="{{ $project[$locale . 'Title'] }}">
    <meta name="twitter:image" content="{{ asset('img/archive/medium/' . $project->image) }}">
@endsection

@section('content')

<main class="single-project">
    <div class="main-container single-project__inner">
        <img class="single-project__image" src="{{ asset('img/archive/' . $project->image) }}" alt="{{$project[$locale . 'Title']}}">
        <h1 class="single-project__title">{{$project[$locale . 'Title']}}</h1>
        <div class="single-project__body">{!!$project[$locale . 'Body']!!}</div>
    </div>

    @if($project->images()->count() > 0)
        @include("templates.gallery", ["gallery_class" => "single-project__gallery", "query" => $project])
    @endif

</main>

@endsection