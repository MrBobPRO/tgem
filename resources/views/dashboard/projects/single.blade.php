@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="update_form" action="{{ route('projects.update') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="hidden" name="id" value="{{$project->id}}">

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
                    <input class="input" name="ruTitle" type="text" value="{{ old('ruTitle') == '' ? $project->ruTitle : old('ruTitle') }}"
                        required>
                </div>

                <div class="form-group">
                    <label class="label">Текст <span class="required">*</span></label>
                    <textarea class="simditor-wysiwyg" name="ruBody" required>{{ old("ruBody") == '' ? $project->ruBody : old("ruBody") }}</textarea>
                </div>

                <div class="form-group">
                    <label class="label">Группа <span class="required">*</span></label>
                    <div class="select2_single_container form-group__select2-single">
                        <select class="select2_single" data-dropdown-css-class="select2_single_dropdown" name="project_group_id">
                            @foreach($groups as $group)
                            <option value="{{$group->id}}" 
                                @if(old('project_group_id') != '')
                                    {{ old('project_group_id') == $group->id ? 'selected' : '' }}
                                @else
                                    {{ $project->project_group_id == $group->id ? 'selected' : ''}}
                                @endif
                                    >{{$group->ruTitle}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="label">Статус <span class="required">*</span></label>
                    <div class="select2_single_container form-group__select2-single">
                        <select class="select2_single" data-dropdown-css-class="select2_single_dropdown" name="completed">
                            <option value="1" 
                            @if(old('completed') != '')
                                {{ old('completed') == 1 ? 'selected' : '' }}
                            @else
                                {{ $project->completed == 1 ? 'selected' : ''}}
                            @endif
                            >Выполненный проект</option>

                            <option value="0" 
                            @if(old('completed') != '')
                                {{ old('completed') == 0 ? 'selected' : '' }}
                            @else
                                {{ $project->completed == 0 ? 'selected' : ''}}
                            @endif
                            >Текущий проект</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="label">Изображение <span class="required">*</span></label>
                    {{-- Archive with id = 1 --}}
                    <input class="input" name="image" type="file" accept=".png, .jpg, .jpeg" data-action="nullify-archive-input"
                        data-archive-input-id="image_archive1_input" id="image_archive1_mirror_input"/>
                    @include("dashboard.templates.archives.images_show_button", ["archive_id" => '1'])
                    <input class="input input--readonly" readonly type="text" name="image_from_archive" id="image_archive1_input">

                    <a class="form-group__image-container" href="{{ asset('img/archive/' . $project->image)}}" target="_blank">
                        <img class="form-group__image" src="{{ asset('img/archive/medium/' . $project->image)}}">
                        <span class="form-group__image-filename">{{$project->image}}</span>
                    </a>
                </div>
            </div> {{-- RU Tab Content end --}}

            {{-- TJ Tab Content start --}}
            <div class="tab-pane fade" id="nav-tj" role="tabpanel" aria-labelledby="nav-tj-tab">
                <div class="form-group">
                    <label class="label">Заголовок</label>
                    <input class="input" name="tjTitle" type="text" value="{{old('tjTitle') == '' ? $project->tjTitle : old('tjTitle') }}">
                </div>

                <div class="form-group">
                    <label class="label">Текст</label>
                    <textarea class="simditor-wysiwyg" name="tjBody">{{ old("tjBody") == '' ? $project->tjBody : old("tjBody") }}</textarea>
                </div>
            </div> {{-- TJ Tab Content end --}}

            {{-- EN Tab Content start --}}
            <div class="tab-pane fade" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                <div class="form-group">
                    <label class="label">Заголовок</label>
                    <input class="input" name="enTitle" type="text" value="{{old('enTitle') == '' ? $project->enTitle : old('enTitle') }}">
                </div>

                <div class="form-group">
                    <label class="label">Текст</label>
                    <textarea class="simditor-wysiwyg" name="enBody">{{ old("enBody") == '' ? $project->enBody : old("enBody") }}</textarea>
                </div>
            </div> {{-- EN Tab Content end --}}

        </div> {{-- Tab Content end --}}
    </div> {{-- Tab end --}}

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
                Вы уверены что хотите удалить проект ?
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-bs-dismiss="modal">Отмена</button>
                <form action="{{ route('projects.remove') }}" method="POST" id="remove_single_item_form">
                    @csrf
                    <input type="hidden" value="{{$project->id}}" name="id" id="remove_single_modal_input"/>
                    <button type="submit" class="button button--danger" id="remove_single_modal_button">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Remove Single Items Modal End-->

{{-- Images Archive with id = 1 --}}
@include("dashboard.templates.archives.images", ["archive_id" => "1"])

{{-- Galleries archive_id => 99 --}}
@include("dashboard.templates.common_gallery_edit", ["relation_column_name" => "project_id", "item" => $project])

@endsection