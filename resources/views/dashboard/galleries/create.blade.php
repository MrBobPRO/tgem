@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="create_form" action="{{ route('galleries.store') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label class="label">Заголовок на русском<span class="required">*</span></label>
        <input class="input" name="ruTitle" type="text" value="{{ old('ruTitle') }}" required>
    </div>

    <div class="form-group">
        <label class="label">Заголовок на таджикском</label>
        <input class="input" name="tjTitle" type="text" value="{{ old('tjTitle') }}">
    </div>

    <div class="form-group">
        <label class="label">Заголовок на английском</label>
        <input class="input" name="enTitle" type="text" value="{{ old('enTitle') }}">
    </div>

    <div class="form-group">
        <label class="label">Миниатюрное изображение <span class="required">*</span></label>
        {{-- Archive with id = 1 --}}
        <input class="input" name="thumbnail" type="file" accept=".png, .jpg, .jpeg" data-action="nullify-archive-input"
            data-archive-input-id="image_archive1_input" id="image_archive1_mirror_input" />
        @include("dashboard.templates.archives.images_show_button", ["archive_id" => '1'])
        <input class="input input--readonly" readonly type="text" name="thumbnail_from_archive" id="image_archive1_input">
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