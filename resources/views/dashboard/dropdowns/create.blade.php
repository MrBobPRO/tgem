@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="create_form" action="{{ route('dropdowns.store') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label class="label">Заголовок <span class="required">*</span></label>
        <input class="input" name="title" type="text" value="{{ old('title') }}" required>
    </div>

    <div class="form-group">
        <label class="label">Приоритет <span class="required">*</span></label>
        <input class="input" name="priority" type="number" value="{{ old('priority') }}" required>
    </div>

    <div class="form-group">
        <label class="label">Ссылка <span class="required">*</span></label>
        <input class="input" name="url" type="text" value="{{ old('url') }}" required>
    </div>

    <div class="form-group switch-container">
        <label for="may_have_childs">Может иметь дочерных страниц</label>
        <label class="switch">
            <input class="switch__input" type="checkbox" name="may_have_childs" id="may_have_childs" checked>
            <span class="switch__slider"></span>
        </label>
    </div>

    <div class="main-form__controls">
        <button class="button button--iconed button--success main-form__controls-button" type="submit"><span
                class="material-icons-outlined">
                done_all
            </span> Добавить</button>
    </div>


</form>

@endsection