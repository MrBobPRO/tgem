@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="create_form" action="{{ route('projects.store') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="locales-tab">
        {{-- Tab Navs start --}}
        <nav class="locales-nav">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-ru-tab" data-bs-toggle="tab" data-bs-target="#nav-ru"
                    type="button" role="tab" aria-controls="nav-ru" aria-selected="true">Русский
                </button>
    
                <button class="nav-link" id="nav-tj-tab" data-bs-toggle="tab" data-bs-target="#nav-tj"
                    type="button" role="tab" aria-controls="nav-tj" aria-selected="false">Таджикский
                </button>

                <button class="nav-link" id="nav-en-tab" data-bs-toggle="tab" data-bs-target="#nav-en"
                    type="button" role="tab" aria-controls="nav-en" aria-selected="false">Английский
                </button>
            </div>
        </nav> {{-- Tab Navs end --}}

        {{-- Tab Content start --}}
        <div class="tab-content locales-tab__content" id="nav-tabContent">
            {{-- RU Tab Content start --}}
            <div class="tab-pane fade show active" id="nav-ru" role="tabpanel" aria-labelledby="nav-ru-tab">
                <div class="form-group">
                    <label class="label">Заголовок <span class="required">*</span></label>
                    <input class="input" name="ruTitle" type="text" value="{{ old('ruTitle') }}" required>
                </div>

                <div class="form-group">
                    <label class="label">Текст <span class="required">*</span></label>
                    <textarea class="simditor-wysiwyg" name="ruBody" required>{{ old("ruBody") }}</textarea>
                </div>

                <div class="form-group">
                    <label class="label">Группа <span class="required">*</span></label>
                    <div class="select2_single_container form-group__select2-single">
                        <select class="select2_single" data-dropdown-css-class="select2_single_dropdown" name="project_group_id">
                            @foreach($groups as $group)
                            <option value="{{$group->id}}" {{ old('project_group_id') == $group->id ? 'selected' : '' }}>{{$group->ruTitle}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="label">Статус <span class="required">*</span></label>
                    <div class="select2_single_container form-group__select2-single">
                        <select class="select2_single" data-dropdown-css-class="select2_single_dropdown" name="completed">
                            <option value="1" {{ old('completed') == 1 ? 'selected' : '' }}>Выполненный проект</option>
                            <option value="0" {{ old('completed') === 0 ? 'selected' : '' }}>Текущий проект</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="label">Изображение <span class="required">*</span></label>
                    {{-- Archive with id = 1 --}}
                    <input class="input" name="image" type="file" accept=".png, .jpg, .jpeg" data-action="nullify-archive-input"
                        data-archive-input-id="image_archive1_input" id="image_archive1_mirror_input" />
                    @include("dashboard.templates.archives.images_show_button", ["archive_id" => '1'])
                    <input class="input input--readonly" readonly type="text" name="image_from_archive" id="image_archive1_input">
                </div>
            </div> {{-- RU Tab Content end --}}

            {{-- TJ Tab Content start --}}
            <div class="tab-pane fade" id="nav-tj" role="tabpanel" aria-labelledby="nav-tj-tab">
                <div class="form-group">
                    <label class="label">Заголовок</label>
                    <input class="input" name="tjTitle" type="text" value="{{ old('tjTitle') }}">
                </div>

                <div class="form-group">
                    <label class="label">Текст</label>
                    <textarea class="simditor-wysiwyg" name="tjBody">{{ old("tjBody") }}</textarea>
                </div>
            </div> {{-- TJ Tab Content end --}}

            {{-- EN Tab Content start --}}
            <div class="tab-pane fade" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                <div class="form-group">
                    <label class="label">Заголовок</label>
                    <input class="input" name="enTitle" type="text" value="{{ old('enTitle') }}">
                </div>

                <div class="form-group">
                    <label class="label">Текст</label>
                    <textarea class="simditor-wysiwyg" name="enBody">{{ old("enBody") }}</textarea>
                </div>
            </div> {{-- EN Tab Content end --}}

        </div> {{-- Tab Content end --}}
    </div> {{-- Tab end --}}

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