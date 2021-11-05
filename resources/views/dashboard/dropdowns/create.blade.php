@extends('dashboard.templates.master')
@section("main")

@if($errors->any())
    <div class="single-page-alert alert alert-danger">
        <b class="alert__title">Ошибка! Пожалуйста исправьте ошибки и попробуйте заново.</b>
        @foreach ($errors->all() as $error)
            <li class="alert__item">{{ $error }}</li>
        @endforeach
    </div>
@endif

<form class="main-form" id="create_form" action="{{ route('dropdowns.store') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label class="label">Заголовок *</label>
        <input class="input" name="title" type="text" value="{{ old('title') }}" required>
    </div>

    <div class="form-group">
        <label class="label">Приоритет *</label>
        <input class="input" name="priority" type="number" value="{{ old('priority') }}" required>
    </div>

    <div class="form-group">
        <label class="label">Ссылка *</label>
        <input class="input" name="url" type="text" value="{{ old('url') }}" required>
    </div>

    <div class="form-group form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="childs" name="childs" checked>
        <label class="form-check-label" for="childs">Может иметь дочерных страниц</label>
    </div>

    <div class="main-form__controls">
        <button class="button button--iconed button--success main-form__controls-button" type="submit"><span class="material-icons-outlined">
            done_all
            </span> Добавить</button>
    </div>


</form>

@endsection