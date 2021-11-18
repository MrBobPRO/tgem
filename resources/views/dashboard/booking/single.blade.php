@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="update_form" action="#" method="POST"
    enctype="multipart/form-data">

    <div class="form-group">
        <label class="label">Имя</label>
        <input class="input input--readonly" readonly type="text" value="{{ $record->name }}">
    </div>

    <div class="form-group">
        <label class="label">Организация</label>
        <input class="input input--readonly" readonly type="text" value="{{ $record->organization }}">
    </div>

    <div class="form-group">
        <label class="label">Город</label>
        <input class="input input--readonly" readonly type="text" value="{{ $record->city }}">
    </div>

    <div class="form-group">
        <label class="label">Телефон</label>
        <input class="input input--readonly" readonly type="text" value="{{ $record->phone }}">
    </div>

    <div class="form-group">
        <label class="label">E - mail</label>
        <input class="input input--readonly" readonly type="text" value="{{ $record->email }}">
    </div>

    <div class="form-group">
        <label class="label">Текст <span class="required">*</span></label>
        <textarea class="textarea textarea--readonly" readonly>{{ $record->body }}</textarea>
    </div>

    <div class="main-form__controls">
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
                Вы уверены что хотите удалить запись ?
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-bs-dismiss="modal">Отмена</button>
                <form action="{{ route('booking.records.remove') }}" method="POST" id="remove_single_item_form">
                    @csrf
                    <input type="hidden" value="{{$record->id}}" name="id" id="remove_single_modal_input"/>
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