@extends('projects.master')
@section('content')

<main class="single-project">
    <div class="main-container single-project__inner">
        <img class="single-project__image" src="{{ asset('img/projects/' . $project->image) }}" alt="{{$project->title}}">
        <h1 class="single-project__title">{{$project->title}}</h1>
        <div class="single-project__body">{!!$project->body!!}</div>
    </div>

    @if($project->images()->count() > 0)
        @include("templates.gallery", ["gallery_class" => "single-project__gallery", "query" => $project])
    @endif

</main>

@endsection