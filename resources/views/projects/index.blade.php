@extends('templates.master')

@section("title", $page_title)

@section('content')

<main class="projects-page">
    @include("templates.crumbs", ["main_title" => __("Главная"), "main_link" => route("home"), "page_title" => $page_title])
    
    <div class="main-container projects-page__inner">
        <div class="projects-list">
            @foreach ($projects as $project)
                <a class="projects-list__item" href="{{ route('projects.single', $project->url) }}">
                    <div class="project-list__image-container">
                        <img class="projects-list__image" src="{{ asset('img/archive/medium/' . $project->image) }}" alt="{{$project[$locale . 'Title']}}">
                    </div>
                    <div class="projects-list__desc" href="{{ route('projects.single', $project->url) }}">
                        <p class="projects-list__group">{{$project->group[$locale . 'Title']}}</p>
                        <h3 class="projects-list__title">{{$project[$locale . 'Title']}}</h3>
                    </div>
                </a>
            @endforeach
        </div>

        {{ $projects->onEachSide(1)->links('templates.pagination') }}
    </div>

</main>

@endsection