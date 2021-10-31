@extends('templates.master')
@section('content')

<main class="single-gallery-page">
    @include("templates.crumbs", ["main_title" => "Галерея", "main_link" => route("galleries.index"), "page_title" => $gallery->title])

    <div class="main-container gallery">
        @foreach($gallery->images as $img)
            <a class="gallery__element" href="{{ asset('img/images/' . $img->filename) }}">
                <img class="gallery__element-image" src="{{ asset('img/images/' . $img->filename) }}">
                <p class="gallery__element-title">{{$img->title}}</p>
            </a>
        @endforeach
    </div>


</main>

@endsection
