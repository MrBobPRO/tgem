@extends('templates.master')
@section('content')

<main class="single-gallery-page">
    @include("templates.crumbs", ["main_title" => "Галерея", "main_link" => route("galleries.index"), "page_title" => $gallery->title])

    @include("templates.gallery", ["gallery_class" => "", "query" => $gallery])

</main>

@endsection
