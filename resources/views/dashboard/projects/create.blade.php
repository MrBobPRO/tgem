@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="create_form" action="{{ route('projects.store') }}" method="POST"
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
        <label class="label">Группа <span class="required">*</span></label>
        <div class="select2_single_container form-group__select2-single">
            <select class="select2_single" data-dropdown-css-class="select2_single_dropdown" name="project_group_id">
                @foreach($groups as $group)
                <option value="{{$group->id}}" {{ old('project_group_id') == $group->id ? 'selected' : '' }}>{{$group->title}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="label">Статус <span class="required">*</span></label>
        <div class="select2_single_container form-group__select2-single">
            <select class="select2_single" data-dropdown-css-class="select2_single_dropdown" name="completed">
                <option value="1" {{ old('completed') == 1 ? 'selected' : '' }}>Выполненный проект</option>
                <option value="0" {{ old('completed') == 0 ? 'selected' : '' }}>Текущий проект</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="label">Изображение <span class="required">*</span></label>
        {{-- Archive with id = 1 --}}
        <input class="input" name="image" type="file" data-action="nullify-archive-input"
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