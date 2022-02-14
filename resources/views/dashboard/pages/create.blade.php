@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="create_form" action="{{ route('pages.store') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="hidden" name="dropdown_id" value="{{$dropdown->id}}">

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
                    <label class="label">Заголовок<span class="required">*</span></label>
                    <input class="input" name="ruTitle" type="text" value="{{ old('ruTitle') }}" required>
                </div>

                <div class="form-group">
                    <label class="label">Приоритет <span class="required">*</span></label>
                    <input class="input" name="priority" type="number" value="{{ old('priority') }}" required>
                </div>

                <div class="form-group">
                    <label class="label">Ссылка <span class="required">*</span></label>
                    <input class="input" name="url" type="text" value="{{ old('url') }}" required>
                </div>

                <div class="form-group switch-container">
                    <label for="default_template">Имеет стандартный шаблон. Страницы нестандартным шаблоном
                        добавляются / редактируются программистами !</label>
                    <label class="switch">
                        <input class="switch__input" type="checkbox" disabled name="default_template" id="default_template" checked>
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
                </div>

                <div class="form-group">
                    <label class="label">Основной текст <span class="required">*</span></label>
                    <textarea class="simditor-wysiwyg" name="ruMainText" required>{{ old("ruMainText") }}</textarea>
                </div>

                <div class="form-group">
                    <label class="label">Заголовок дополнительного текста</label>
                    <input class="input" name="ruAdditionalTextTitle" type="text" value="{{ old('ruAdditionalTextTitle') }}">
                </div>

                <div class="form-group">
                    <label class="label">Дополнительный текст</label>
                    <textarea class="simditor-wysiwyg" name="ruAdditionalTextBody">{{ old("ruAdditionalTextBody") }}</textarea>
                </div>
            </div> {{-- RU Tab Content end --}}

            {{-- TJ Tab Content start --}}
            <div class="tab-pane fade" id="nav-tj" role="tabpanel" aria-labelledby="nav-tj-tab">
                <div class="form-group">
                    <label class="label">Заголовок</label>
                    <input class="input" name="tjTitle" type="text" value="{{ old('tjTitle') }}">
                </div>

                <div class="form-group">
                    <label class="label">Основной текст</label>
                    <textarea class="simditor-wysiwyg" name="tjMainText">{{ old("tjMainText") }}</textarea>
                </div>

                <div class="form-group">
                    <label class="label">Заголовок дополнительного текста</label>
                    <input class="input" name="tjAdditionalTextTitle" type="text" value="{{ old('tjAdditionalTextTitle') }}">
                </div>

                <div class="form-group">
                    <label class="label">Дополнительный текст</label>
                    <textarea class="simditor-wysiwyg" name="tjAdditionalTextBody">{{ old("tjAdditionalTextBody") }}</textarea>
                </div>
            </div> {{-- TJ Tab Content end --}}

            {{-- EN Tab Content start --}}
            <div class="tab-pane fade" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                <div class="form-group">
                    <label class="label">Заголовок</label>
                    <input class="input" name="enTitle" type="text" value="{{ old('enTitle') }}">
                </div>

                <div class="form-group">
                    <label class="label">Основной текст</label>
                    <textarea class="simditor-wysiwyg" name="enMainText">{{ old("enMainText") }}</textarea>
                </div>

                <div class="form-group">
                    <label class="label">Заголовок дополнительного текста</label>
                    <input class="input" name="enAdditionalTextTitle" type="text" value="{{ old('enAdditionalTextTitle') }}">
                </div>

                <div class="form-group">
                    <label class="label">Дополнительный текст</label>
                    <textarea class="simditor-wysiwyg" name="enAdditionalTextBody">{{ old("enAdditionalTextBody") }}</textarea>
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