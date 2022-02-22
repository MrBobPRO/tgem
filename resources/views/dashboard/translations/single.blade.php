@extends('dashboard.templates.master')
@section("main")

<div class="alert alert-primary">
    Слева в ковычках идёт текст на русском. Ни в коем случае не меняйте текст на русском. 
    <br>А переводы идут после двоеточия в ковычках, которых можно менять, исправлять итд. 
</div>

<form class="main-form" action="{{ route('translations.update') }}" method="POST" onsubmit="validate_json_input(event)">
    {{ csrf_field() }}

    <input type="hidden" name="locale_value" value="{{ $locale_value }}">

    <div class="form-group">
        <pre id="json-display"></pre>
        <input type="hidden" name="content" id="json-input" value="{{ $content }}">
    </div>

    <div class="main-form__controls">
        <button class="button button--iconed button--success main-form__controls-button" type="submit">
            <span class="material-icons-outlined">done_all</span> Сохранить
        </button>
    </div>
</form>

@endsection