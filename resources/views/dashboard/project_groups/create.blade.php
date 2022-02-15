@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="create_form" action="{{ route('projects.groups.store') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label class="label">Заголовок на русском<span class="required">*</span></label>
        <input class="input" name="ruTitle" type="text" value="{{ old('ruTitle') }}"
            required>
    </div>

    <div class="form-group">
        <label class="label">Заголовок на таджикском</label>
        <input class="input" name="tjTitle" type="text" value="{{ old('tjTitle') }}">
    </div>

    <div class="form-group">
        <label class="label">Заголовок на английском</label>
        <input class="input" name="enTitle" type="text" value="{{ old('enTitle') }}">
    </div>

    <div class="main-form__controls">
        <button class="button button--iconed button--success main-form__controls-button" type="submit"><span
                class="material-icons-outlined">
                done_all
            </span> Добавить</button>
    </div>

</form>

@endsection