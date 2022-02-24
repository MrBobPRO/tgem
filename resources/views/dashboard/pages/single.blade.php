@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="update_form" action="{{ route('pages.update') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="hidden" name="id" value="{{$page->id}}">

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
                    <input class="input" name="ruTitle" type="text" value="{{ old('ruTitle') == '' ? $page->ruTitle : old('ruTitle') }}"
                        required>
                </div>

                @if($page->default_template)
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
                        {{-- Archive with id = 1 --}}
                        <input class="input" name="image" type="file" accept=".png, .jpg, .jpeg" data-action="nullify-archive-input"
                            data-archive-input-id="image_archive1_input" id="image_archive1_mirror_input"/>
                        @include("dashboard.templates.archives.images_show_button", ["archive_id" => '1'])
                        <input class="input input--readonly" readonly type="text" name="image_from_archive" id="image_archive1_input">

                        <a class="form-group__image-container" href="{{ asset('img/archive/' . $page->image)}}" target="_blank">
                            <img class="form-group__image" src="{{ asset('img/archive/medium/' . $page->image)}}">
                            <span class="form-group__image-filename">{{$page->image}}</span>
                        </a>
                    </div>

                    <div class="form-group">
                        <label class="label">Основной текст <span class="required">*</span></label>
                        <textarea class="simditor-wysiwyg" name="ruMainText" required>{{ old("ruMainText") == "" ? $page->ruMainText : old("ruMainText") }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="label">Заголовок дополнительного текста</label>
                        <input class="input" name="ruAdditionalTextTitle" type="text" value="{{ old('ruAdditionalTextTitle') == '' ? $page->ruAdditionalTextTitle : old('ruAdditionalTextTitle') }}">
                    </div>

                    <div class="form-group">
                        <label class="label">Дополнительный текст</label>
                        <textarea class="simditor-wysiwyg" name="ruAdditionalTextBody">{{ old("ruAdditionalTextBody") == "" ? $page->ruAdditionalTextBody : old("ruAdditionalTextBody") }}</textarea>
                    </div>
                @endif

            </div> {{-- RU Tab Content end --}}

            {{-- TJ Tab Content start --}}
            <div class="tab-pane fade" id="nav-tj" role="tabpanel" aria-labelledby="nav-tj-tab">
                <div class="form-group">
                    <label class="label">Заголовок</label>
                    <input class="input" name="tjTitle" type="text" value="{{old('tjTitle') == '' ? $page->tjTitle : old('tjTitle') }}">
                </div>

                @if($page->default_template)
                    <div class="form-group">
                        <label class="label">Основной текст</label>
                        <textarea class="simditor-wysiwyg" name="tjMainText">{{ old("tjMainText") == "" ? $page->tjMainText : old("tjMainText") }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="label">Заголовок дополнительного текста</label>
                        <input class="input" name="tjAdditionalTextTitle" type="text" value="{{ old('tjAdditionalTextTitle') == '' ? $page->tjAdditionalTextTitle : old('tjAdditionalTextTitle') }}">
                    </div>

                    <div class="form-group">
                        <label class="label">Дополнительный текст</label>
                        <textarea class="simditor-wysiwyg" name="tjAdditionalTextBody">{{ old("tjAdditionalTextBody") == "" ? $page->tjAdditionalTextBody : old("tjAdditionalTextBody") }}</textarea>
                    </div>
                @endif
            </div> {{-- TJ Tab Content end --}}

            {{-- EN Tab Content start --}}
            <div class="tab-pane fade" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                <div class="form-group">
                    <label class="label">Заголовок</label>
                    <input class="input" name="enTitle" type="text" value="{{old('enTitle') == '' ? $page->enTitle : old('enTitle') }}">
                </div>

                @if($page->default_template)
                    <div class="form-group">
                        <label class="label">Основной текст</label>
                        <textarea class="simditor-wysiwyg" name="enMainText">{{ old("enMainText") == "" ? $page->enMainText : old("enMainText") }}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="label">Заголовок дополнительного текста</label>
                        <input class="input" name="enAdditionalTextTitle" type="text" value="{{ old('enAdditionalTextTitle') == '' ? $page->enAdditionalTextTitle : old('enAdditionalTextTitle') }}">
                    </div>

                    <div class="form-group">
                        <label class="label">Дополнительный текст</label>
                        <textarea class="simditor-wysiwyg" name="enAdditionalTextBody">{{ old("enAdditionalTextBody") == "" ? $page->enAdditionalTextBody : old("enAdditionalTextBody") }}</textarea>
                    </div>
                @endif
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
                Вы уверены что хотите удалить страницу ?
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-bs-dismiss="modal">Отмена</button>
                <form action="{{ route('pages.remove') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$page->id}}" name="id" id="remove_single_modal_input"/>
                    <button type="submit" class="button button--danger" id="remove_single_modal_button">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Remove Single Items Modal End-->

{{-- Images Archive with id = 1 --}}
@include("dashboard.templates.archives.images", ["archive_id" => "1"])

@if($page->default_template)
    {{-- Galleries archive_id => 99 --}}
    @include("dashboard.templates.common_gallery_edit", ["relation_column_name" => "page_id", "item" => $page])
@endif

@endsection