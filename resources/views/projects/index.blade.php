@extends('templates.master')
@section('content')

<main class="projects-page">
    @include("templates.crumbs", ["main_title" => "Главная", "main_link" => route("home"), "page_title" => $page_title])
    
    <div class="main-container projects-page__inner">
        <div class="projects-list">
            @foreach ($projects as $project)
                <div class="projects-list__item">
                    <div class="project-list__image-container">
                        <img class="projects-list__image" src="{{ asset('img/projects/thumbs/' . $project->image) }}">
                    </div>
                    <a class="projects-list__link" href="#">
                        <p class="projects-list__group">{{$project->group->name}}</p>
                        <h3 class="projects-list__title">{{$project->title}}</h3>
                    </a>
                </div>
            @endforeach
        </div>

        {{ $projects->links('vendor.pagination.custom') }}
    </div>

</main>

@endsection