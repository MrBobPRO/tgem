@extends('templates.master')

@section("title", $page_title)

@section('content')

<main class="news-page">
    @include("templates.crumbs", ["main_title" => "Главная", "main_link" => route("home"), "page_title" => $page_title])
    
    <div class="main-container news-page__inner">
        <div class="news-list">
            @foreach ($news as $new)
                <a class="news-list__item wow
                    @if($loop->index == 0 || $loop->index == 3 || $loop->index == 6)
                        fadeInLeft
                    @elseif($loop->index == 1 || $loop->index == 4 || $loop->index == 7)
                        fadeInUp 
                    @elseif($loop->index == 2 || $loop->index == 5 || $loop->index == 8)
                        fadeInRight 
                    @endif
                " data-wow-delay="0ms" data-wow-duration="1500ms" href="{{ route('news.single', $new->url) }}">
                    <div class="news-list__image-container">
                        <img class="news-list__image" src="{{ asset('img/archive/medium/' . $new->image) }}" alt="{{$new[$locale . 'Title']}}">
                        @php 
                            $formatted = Carbon\Carbon::create($new->created_at)->locale("ru");
                        @endphp
                        <div class="news-list__date">{{$formatted->isoFormat('DD')}}<span class="news-list__date-span">
                            {{$formatted->isoFormat("MMM")}}/{{$formatted->isoFormat("YY")}}
                        </div>
                    </div>

                    <div class="news-list__desc">
                        <h3 class="news-list__title">{{$new[$locale . 'Title']}}</h3>
                        <button class="button secondary-btn news-list__button">Полробнее</button>
                    </div>
                </a>
            @endforeach
        </div>

        {{ $news->onEachSide(1)->links('templates.pagination') }}
    </div>

</main>

@endsection