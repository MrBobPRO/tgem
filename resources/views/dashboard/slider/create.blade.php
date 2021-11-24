@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="create_form" action="{{ route('slider.store') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label class="label"> Текст над заголовоком <span class="required">*</span></label>
        <input class="input" name="crumb" type="text" value="{{ old('crumb') }}" required>
    </div>

    <div class="form-group">
        <label class="label">Заголовок <span class="required">*</span></label>
        <input class="input" name="title" type="text" value="{{ old('title') }}" required>
    </div>

    <div class="form-group">
        <label class="label">Описание слайда <span class="required">*</span></label>
        <textarea class="textarea" name="description" required rows="5">{{ old("description") }}</textarea>
    </div>

    <div class="form-group">
        <label class="label">Приоритет <span class="required">*</span></label>
        <input class="input" name="priority" type="number" value="{{ old('priority') }}" required>
    </div>

    <div class="form-group">
        <label class="label">Изображение <span class="required">*</span></label>
        {{-- Archive with id = 1 --}}
        <input class="input" name="image" type="file" accept=".png, .jpg, .jpeg" data-action="nullify-archive-input"
            data-archive-input-id="image_archive1_input" id="image_archive1_mirror_input" />
        @include("dashboard.templates.archives.images_show_button", ["archive_id" => '1'])
        <input class="input input--readonly" readonly type="text" name="image_from_archive" id="image_archive1_input">
    </div>

    <div class="form-group">
        <label class="label">Ссылка кнопки<span class="required">*</span></label>
        <input class="input" name="link" type="text" value="{{ old('link') }}" required>
    </div>

    <div class="form-group">
        <label class="label">Ссылка на видео <span class="required">*</span></label>
        <input class="input" name="video" type="text" value="{{ old('video') }}" required>
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