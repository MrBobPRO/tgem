@extends('templates.master')
@section('content')

<main class="projects-page">
    @include("templates.crumbs", ["main_title" => "Главная", "main_link" => route("home"), "page_title" => $page_title])
    
    <div class="main-container projects-page__inner">
        <div class="projects-list">
            @foreach ($projects as $project)
                <a class="projects-list__item" href="{{ route('projects.single', $project->url) }}">
                    <div class="project-list__image-container">
                        <img class="projects-list__image" src="{{ asset('img/archive/medium/' . $project->image) }}">
                    </div>
                    <div class="projects-list__desc" href="{{ route('projects.single', $project->url) }}">
                        <p class="projects-list__group">{{$project->group->name}}</p>
                        <h3 class="projects-list__title">{{$project->title}}</h3>
                    </div>
                </a>
            @endforeach
        </div>

        {{ $projects->links('templates.pagination') }}
    </div>

</main>

@endsection