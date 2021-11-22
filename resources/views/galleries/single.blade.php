@extends('templates.master')

@section("title", $gallery->title)

@section("meta-tags")
    @php
        //remove tags and slice body
        $share_text = "ТГЭМ – строим будущее вместе";
    @endphp
    <meta name="description" content="{{ $share_text }}">
    <meta property="og:description" content="{{ $share_text }}">
    <meta property="og:title" content="{{ $gallery->title }}" />
    <meta property="og:image" content="{{ asset('img/archive/medium/' . $gallery->thumbnail) }}">
    <meta property="og:image:alt" content="{{ $gallery->title }}">
    <meta name="twitter:title" content="{{ $gallery->title }}">
    <meta name="twitter:image" content="{{ asset('img/archive/medium/' . $gallery->thumbnail) }}">
@endsection

@section('content')

<main class="single-gallery-page">
    @include("templates.crumbs", ["main_title" => "Галерея", "main_link" => route("galleries.index"), "page_title" => $gallery->title])

    @include("templates.gallery", ["gallery_class" => "", "query" => $gallery])

</main>

@endsection
