@extends('templates.master')

@section("title", $gallery[$locale . 'Title'])

@section("meta-tags")
    @php
        $shareText = __("ТГЭМ – строим будущее вместе");
    @endphp
    <meta name="description" content="{{ $shareText }}">
    <meta property="og:description" content="{{ $shareText }}">
    <meta property="og:title" content="{{ $gallery[$locale . 'Title'] }}" />
    <meta property="og:image" content="{{ asset('img/archive/medium/' . $gallery->thumbnail) }}">
    <meta property="og:image:alt" content="{{ $gallery[$locale . 'Title'] }}">
    <meta name="twitter:title" content="{{ $gallery[$locale . 'Title'] }}">
    <meta name="twitter:image" content="{{ asset('img/archive/medium/' . $gallery->thumbnail) }}">
@endsection

@section('content')

<main class="single-gallery-page">
    @include("templates.crumbs", ["main_title" => __("Галерея"), "main_link" => route("galleries.index"), "page_title" => $gallery[$locale . 'Title']])

    @include("templates.gallery", ["gallery_class" => "", "query" => $gallery])
</main>

@endsection