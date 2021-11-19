@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="create_form" action="{{ route('pages.store') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="hidden" name="dropdown_id" value="{{$dropdown->id}}">

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
        <label for="default_template">Имеет стандартный шаблон. Страницы нестандартным шаблоном
            добавляются / редактируются программистами !</label>
        <label class="switch">
            <input class="switch__input" type="checkbox" disabled name="default_template" id="default_template" checked>
            <span class="switch__slider"></span>
        </label>
    </div>

    <div class="form-group">
        <label class="label">Изображение <span class="required">*</span></label>
        {{-- Archive with id = 1 --}}
        <input class="input" name="image" type="file" accept=".png, .jpg, .jpeg" data-action="nullify-archive-input"
            data-archive-input-id="image_archive1_input" id="image_archive1_mirror_input"/>
        @include("dashboard.templates.archives.images_show_button", ["archive_id" => '1'])
        <input class="input input--readonly" readonly type="text" name="image_from_archive" id="image_archive1_input">
    </div>

    <div class="form-group">
        <label class="label">Основной текст <span class="required">*</span></label>
        <textarea class="simditor-wysiwyg" name="main_text" required>{{ old("main_text") }}</textarea>
    </div>

    <div class="form-group">
        <label class="label">Заголовок дополнительного текста</label>
        <input class="input" name="additional_text_title" type="text" value="{{ old('additional_text_title') }}">
    </div>

    <div class="form-group">
        <label class="label">Дополнительный текст</label>
        <textarea class="simditor-wysiwyg" name="additional_text_body">{{ old("additional_text_body") }}</textarea>
    </div>

    <div class="main-form__controls">
        <button class="button button--iconed button--success main-form__controls-button" type="submit"><span
                class="material-icons-outlined">
                done_all
            </span> Добавить</button>
    </div>

</form>

{{-- Images Archive with id = 1 --}}
@include("dashboard.templates.archives.images", ["archive_id" => "1"])

@endsection