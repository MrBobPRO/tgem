@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="update_form" action="{{ route('dropdowns.update') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="hidden" name="id" value="{{$dropdown->id}}">

    <div class="form-group">
        <label class="label">Заголовок *</label>
        <input class="input" name="title" type="text" value="{{$dropdown->title}}" required>
        @error('title')
            
        @enderror
    </div>

    <div class="form-group">
        <label class="label">Приоритет *</label>
        <input class="input" name="priority" type="number" value="{{$dropdown->priority}}" required>
    </div>

    <div class="form-group">
        <label class="label">Ссылка *</label>
        <input class="input" name="url" type="text" value="{{$dropdown->url}}" required>
    </div>

    <div class="form-group form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="childs" name="childs" {{$dropdown->no_childs ?
        '' : "checked"}}>
        <label class="form-check-label" for="childs">Может иметь дочерных страниц</label>
    </div>

    <div class="main-form__controls">
        <button class="button button--iconed main-form__controls-button" type="submit"><span class="material-icons-outlined">
            done_all
        </span> Сохранить</button>

    <button class="button button--danger button--iconed main-form__controls-button" type="button" data-bs-toggle="modal"
        data-bs-target="#remove_single_modal"><span class="material-icons-outlined">
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
                <form action="{{ route('dropdowns.remove') }}" method="POST" id="removee_single_item_form">
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