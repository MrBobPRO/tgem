@extends('templates.master')

@section("title", $page_title)

@section('content')

<main class="galleries-page">
    @include("templates.crumbs", ["main_title" => __("Главная"), "main_link" => route("home"), "page_title" => $page_title])
    
    <div class="main-container galleries-page__inner">
        <div class="galleries-list">
            @foreach ($galleries as $gallery)
                <a class="galleries-list__item" href="{{ route('galleries.single', $gallery->url) }}">
                    <div class="galleries-list__image-container">
                        <img class="galleries-list__image" src="{{ asset('img/archive/medium/' . $gallery->thumbnail) }}" alt="{{$gallery[$locale . 'Title']}}">
                        @php
                            $formatted = Carbon\Carbon::create($gallery->created_at)->locale($locale == 'tj' ? 'ru' : $locale);
                        @endphp   
                        <div class="galleries-list__date">{{$formatted->isoFormat('DD')}}<span class="galleries-list__date-span">
                            {{$formatted->isoFormat("MMM")}}/{{$formatted->isoFormat("YY")}}
                        </div>
                    </div>

                    <div class="galleries-list__desc">
                        <h3 class="galleries-list__title">{{$gallery[$locale . 'Title']}}</h3>
                    </div>
                </a>
            @endforeach
        </div>

        {{ $galleries->onEachSide(1)->links('templates.pagination') }}
    </div>

</main>

@endsection