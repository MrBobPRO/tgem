@extends('news.master')
@section('content')

<main class="news-page">
    @include("templates.crumbs", ["main_title" => "Главная", "main_link" => route("home"), "page_title" => $page_title])
    
    <div class="main-container news-page__inner">
        <div class="news-list">
            @foreach ($news as $new)
                <a class="news-list__item" href="{{ route('news.single', $new->url) }}">
                    <div class="news-list__image-container">
                        <img class="news-list__image" src="{{ asset('img/news/thumbs/' . $new->image) }}">
                        <?php $formatted = Carbon\Carbon::create($new->created_at)->locale("ru"); ?>   
                        <div class="news-list__date">{{$formatted->isoFormat('DD')}}<span class="news-list__date-span">
                            {{$formatted->isoFormat("MMM")}}/{{$formatted->isoFormat("YY")}}
                        </div>
                    </div>

                    <div class="news-list__desc">
                        <h3 class="news-list__title">{{$new->title}}</h3>
                        <button class="button secondary-btn news-list__button">Полробнее</button>
                    </div>
                </a>
            @endforeach
        </div>

        {{ $news->links('vendor.pagination.custom') }}
    </div>

</main>

@endsection