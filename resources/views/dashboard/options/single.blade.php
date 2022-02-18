@extends('dashboard.templates.master')
@section("main")

<form class="main-form" action="{{ route('options.update') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="hidden" name="id" value="{{ $option->id }}">

    <div class="form-group">
        <label class="label">Значение на русском <span class="required">*</span></label>
        <textarea class="textarea" name="ruValue" required rows="8">{!! stripcslashes($option->ruValue) !!}</textarea>
    </div>

    <div class="form-group">
        <label class="label">Значение на таджикском <span class="required">*</span></label>
        <textarea class="textarea" name="tjValue" required rows="8">{!! stripcslashes($option->tjValue) !!}</textarea>
    </div>

    <div class="form-group">
        <label class="label">Значение на английском <span class="required">*</span></label>
        <textarea class="textarea" name="enValue" required rows="8">{!! stripcslashes($option->enValue) !!}</textarea>
    </div>

    <div class="main-form__controls">
        <button class="button button--iconed button--success main-form__controls-button" type="submit"><span
                class="material-icons-outlined">
                done_all
            </span> Сохранить</button>
    </div>

</form>

@endsection