@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="update_form" action="{{ route('slider.update') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="hidden" name="id" value="{{$slide->id}}">

    <div class="form-group">
        <label class="label">Текст над заголовоком <span class="required">*</span></label>
        <input class="input" name="crumb" type="text" value="{{ old('crumb') == '' ? $slide->crumb : old('crumb') }}"
            required>
    </div>

    <div class="form-group">
        <label class="label">Заголовок <span class="required">*</span></label>
        <input class="input" name="title" type="text" value="{{ old('title') == '' ? $slide->title : old('title') }}"
            required>
    </div>

    <div class="form-group">
        <label class="label">Описание слайда <span class="required">*</span></label>
        <textarea class="textarea" name="description" required>{{ old("description") == '' ? $slide->description : old("description") }}</textarea>
    </div>

    <div class="form-group">
        <label class="label">Приоритет <span class="required">*</span></label>
        <input class="input" name="priority" type="number" value="{{ old('priority') == '' ? $slide->priority : old('priority') }}"
            required>
    </div>

    <div class="form-group">
        <label class="label">Изображение <span class="required">*</span></label>
        {{-- Archive with id = 1 --}}
        <input class="input" name="image" type="file" accept=".png, .jpg, .jpeg" data-action="nullify-archive-input"
            data-archive-input-id="image_archive1_input" id="image_archive1_mirror_input"/>
        @include("dashboard.templates.archives.images_show_button", ["archive_id" => '1'])
        <input class="input input--readonly" readonly type="text" name="image_from_archive" id="image_archive1_input">

        <a class="form-group__image-container" href="{{ asset('img/archive/' . $slide->image)}}" target="_blank">
            <img class="form-group__image" src="{{ asset('img/archive/medium/' . $slide->image)}}">
            <span class="form-group__image-filename">{{$slide->image}}</span>
        </a>
    </div>

    <div class="form-group">
        <label class="label">Ссылка кнопки <span class="required">*</span></label>
        <input type="text" class="input" name="link" required value="{{ old("link") == '' ? $slide->link : old("link") }}">
    </div>

    <div class="form-group">
        <label class="label">Ссылка на видео <span class="required">*</span></label>
        <input type="text" class="input" name="video" required value="{{ old("video") == '' ? $slide->video : old("video") }}">
    </div>

    <div class="main-form__controls">
        <button class="button button--iconed button--success main-form__controls-button" type="submit"><span
                class="material-icons-outlined">
                done_all
            </span> Сохранить</button>

        <button class="button button--danger button--iconed main-form__controls-button" type="button"
            data-bs-toggle="modal" data-bs-target="#remove_single_modal"><span class="material-icons-outlined">
                remove_circle
            </span> Удалить</button>
    </div>
</form>

<!-- Remove Single Items Modal Start-->
<div class="modal fade" id="remove_single_modal" tabindex="-1" aria-labelledby="remove_single_modal_label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="remove_single_modal_label">Удалить</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Вы уверены что хотите удалить слайд ?
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-bs-dismiss="modal">Отмена</button>
                <form action="{{ route('slider.remove') }}" method="POST" id="remove_single_item_form">
                    @csrf
                    <input type="hidden" value="{{$slide->id}}" name="id" id="remove_single_modal_input"/>
                    <button type="submit" class="button button--danger" id="remove_single_modal_button">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Remove Single Items Modal End-->

{{-- Images Archive with id = 1 --}}
@include("dashboard.templates.archives.images", ["archive_id" => "1"])

@endsection