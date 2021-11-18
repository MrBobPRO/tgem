@extends('templates.master')
@section('content')

<main class="single-vacancy">
    @include("templates.crumbs", ["main_title" => "Вакансии", "main_link" => route("vacancies.index"), "page_title" => $vacancy->title])
    
    <div class="main-container single-vacancy__inner">
        {!! $vacancy->body !!}
    </div>

</main>

@endsection