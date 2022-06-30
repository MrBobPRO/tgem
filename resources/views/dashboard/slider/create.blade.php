@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="create_form" action="{{ route('slider.store') }}" method="POST"
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
                    <label class="label"> Текст над заголовоком <span class="required">*</span></label>
                    <input class="input" name="ruCrumb" type="text" value="{{ old('ruCrumb') }}" required>
                </div>

                <div class="form-group">
                    <label class="label">Заголовок <span class="required">*</span></label>
                    <input class="input" name="ruTitle" type="text" value="{{ old('ruTitle') }}" required>
                </div>

                <div class="form-group">
                    <label class="label">Описание слайда <span class="required">*</span></label>
                    <textarea class="textarea" name="ruDescription" required rows="5">{{ old("ruDescription") }}</textarea>
                </div>

                <div class="form-group">
                    <label class="label">Приоритет <span class="required">*</span></label>
                    <input class="input" name="priority" type="number" value="{{ old('priority') }}" required>
                </div>

                <div class="form-group">
                    <label class="label">Изображение <span class="required">*</span></label>
                    {{-- Archive with id = 1 --}}
                    <input class="input" name="image" type="file" accept=".png, .jpg, .jpeg" data-action="nullify-archive-input"
                        data-archive-input-id="image_archive1_input" id="image_archive1_mirror_input" />
                    @include("dashboard.templates.archives.images_show_button", ["archive_id" => '1'])
                    <input class="input input--readonly" readonly type="text" name="image_from_archive" id="image_archive1_input">
                </div>

                <div class="form-group">
                    <label class="label">Ссылка кнопки. Включая http или https. Пример : https://somon.tj. Можно оставить пустым!</label>
                    <input class="input" name="link" type="text" value="{{ old('link') }}">
                </div>

                <div class="form-group">
                    <label class="label">Ссылка на видео. Включая http или https. Пример : https://somon.tj. Можно оставить пустым!</label>
                    <input class="input" name="video" type="text" value="{{ old('video') }}">
                </div>
            </div> {{-- RU Tab Content end --}}

            {{-- TJ Tab Content start --}}
            <div class="tab-pane fade" id="nav-tj" role="tabpanel" aria-labelledby="nav-tj-tab">
                <div class="form-group">
                    <label class="label">Текст над заголовоком</label>
                    <input class="input" name="tjCrumb" type="text" value="{{ old('tjCrumb') }}">
                </div>

                <div class="form-group">
                    <label class="label">Заголовок</label>
                    <input class="input" name="tjTitle" type="text" value="{{ old('tjTitle') }}">
                </div>

                <div class="form-group">
                    <label class="label">Описание слайда</label>
                    <textarea class="textarea" name="tjDescription" rows="5">{{ old("tjDescription") }}</textarea>
                </div>
            </div> {{-- TJ Tab Content end --}}

            {{-- EN Tab Content start --}}
            <div class="tab-pane fade" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                <div class="form-group">
                    <label class="label">Текст над заголовоком</label>
                    <input class="input" name="enCrumb" type="text" value="{{ old('enCrumb') }}">
                </div>

                <div class="form-group">
                    <label class="label">Заголовок</label>
                    <input class="input" name="enTitle" type="text" value="{{ old('enTitle') }}">
                </div>

                <div class="form-group">
                    <label class="label">Описание слайда</label>
                    <textarea class="textarea" name="enDescription" rows="5">{{ old("enDescription") }}</textarea>
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