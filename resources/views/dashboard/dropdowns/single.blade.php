@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="update_form" action="{{ route('dropdowns.update') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="hidden" name="id" value="{{$dropdown->id}}">

    <div class="form-group">
        <label class="label">Заголовок <span class="required">*</span></label>
        <input class="input" name="title" type="text" value="{{old('title') == '' ? $dropdown->title : old('title') }}">
    </div>

    <div class="form-group">
        <label class="label">Приоритет <span class="required">*</span></label>
        <input class="input" name="priority" type="number"
            value="{{old('priority') == '' ? $dropdown->priority : old('priority') }}" required>
    </div>

    <div class="form-group">
        <label class="label">Ссылка <span class="required">*</span></label>
        <input class="input" name="url" type="text" value="{{old('url') == '' ? $dropdown->url : old('url') }}"
            required>
    </div>

    <div class="form-group switch-container">
        <label for="may_have_childs">Может иметь дочерных страниц</label>
        <label class="switch">
            <input class="switch__input" type="checkbox" name="may_have_childs" id="may_have_childs"
                @if(old("may_have_childs")=="on" ) checked @elseif(old('may_have_childs')=='' &&
                !$dropdown->may_have_childs)
            ''
            @elseif(old('may_have_childs') == '' && $dropdown->may_have_childs)
            checked
            @endif
            ">
            <span class="switch__slider"></span>
        </label>
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
                Вы уверены что хотите удалить выпадающий список ?<br><br>
                <b>Также удалятся все страницы выпадающего списка !</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-bs-dismiss="modal">Отмена</button>
                <form action="{{ route('dropdowns.remove') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$dropdown->id}}" name="id" id="remove_single_modal_input" />
                    <button type="submit" class="button button--danger" id="remove_single_modal_button">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Remove Single Items Modal End-->


@endsection