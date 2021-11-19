@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="create_form" action="{{ route('vacancies.store') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label class="label">Заголовок <span class="required">*</span></label>
        <input class="input" name="title" type="text" value="{{ old('title') }}" required>
    </div>

    <div class="form-group">
        <label class="label">Текст <span class="required">*</span></label>
        <textarea class="simditor-wysiwyg" name="body" required>{{ old("body") }}</textarea>
    </div>

    <div class="form-group">
        <label class="label">Изображение <span class="required">*</span> . Ширина и высота объязательно должны быть одинаковыми !</label>
        {{-- Archive with id = 1 --}}
        <input class="input" name="image" type="file" accept=".png, .jpg, .jpeg" data-action="nullify-archive-input"
            data-archive-input-id="image_archive1_input" id="image_archive1_mirror_input" />
        @include("dashboard.templates.archives.images_show_button", ["archive_id" => '1'])
        <input class="input input--readonly" readonly type="text" name="image_from_archive" id="image_archive1_input">
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