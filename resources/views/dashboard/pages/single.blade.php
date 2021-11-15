@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="update_form" action="{{ route('pages.update') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="hidden" name="id" value="{{$page->id}}">

    <div class="form-group">
        <label class="label">Заголовок <span class="required">*</span></label>
        <input class="input" name="title" type="text" value="{{ old('title') == '' ? $page->title : old('title') }}"
            required>
    </div>

    <div class="form-group">
        <label class="label">Приоритет <span class="required">*</span></label>
        <input class="input" name="priority" type="number"
            value="{{ old('priority') == '' ? $page->priority : old('priority') }}" required>
    </div>

    <div class="form-group">
        <label class="label">Ссылка <span class="required">*</span></label>
        <input class="input" name="url" type="text" value="{{ old('url') == '' ? $page->url : old('url') }}" required>
    </div>

    <div class="form-group switch-container">
        <label for="default_template">Имеет стандартный шаблон. Страницы нестандартным шаблоном
            добавляются / редактируются программистами !</label>
        <label class="switch">
            <input class="switch__input" type="checkbox" disabled name="default_template" id="default_template" {{$page->default_template ? "checked" : ''}}>
            <span class="switch__slider"></span>
        </label>
    </div>

    <div class="form-group">
        <label class="label">Изображение <span class="required">*</span></label>
        <input class="input" name="image" type="file">
        <a class="form-group__image-container" href="{{ asset('img/archive/' . $page->image)}}" target="_blank">
            <img class="form-group__image" src="{{ asset('img/archive/' . $page->image)}}">
            <span class="form-group__image-filename">{{$page->image}}</span>
        </a>

    </div>

    <div class="form-group">
        <label class="label">Основной текст <span class="required">*</span></label>
        <textarea class="simditor-wysiwyg" name="main_text" required>{{ old("main_text") == "" ? $page->main_text : old("main_text") }}</textarea>
    </div>

    <div class="form-group">
        <label class="label">Заголовок дополнительного текста</label>
        <input class="input" name="additional_text_title" type="text" value="{{ old('additional_text_title') == '' ? $page->additional_text_title : old('additional_text_title') }}">
    </div>

    <div class="form-group">
        <label class="label">Дополнительный текст</label>
        <textarea class="simditor-wysiwyg" name="additional_text_body">{{ old("additional_text_body") == "" ? $page->additional_text_body : old("additional_text_body") }}</textarea>
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
                Вы уверены что хотите удалить страницу ?
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-bs-dismiss="modal">Отмена</button>
                <form action="{{ route('pages.remove') }}" method="POST" id="removee_single_item_form">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$page->id}}" name="id" id="remove_single_modal_input" />
                    <button type="submit" class="button button--danger" id="remove_single_modal_button">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Remove Single Items Modal End-->

</form>

@endsection