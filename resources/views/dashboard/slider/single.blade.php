@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="update_form" action="{{ route('slider.update') }}" method="POST"
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="hidden" name="id" value="{{$slide->id}}">

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
                    <label class="label">Текст над заголовоком <span class="required">*</span></label>
                    <input class="input" name="ruCrumb" type="text" value="{{ old('ruCrumb') == '' ? $slide->ruCrumb : old('ruCrumb') }}"
                        required>
                </div>

                <div class="form-group">
                    <label class="label">Заголовок <span class="required">*</span></label>
                    <input class="input" name="ruTitle" type="text" value="{{ old('ruTitle') == '' ? $slide->ruTitle : old('ruTitle') }}"
                        required>
                </div>

                <div class="form-group">
                    <label class="label">Описание слайда <span class="required">*</span></label>
                    <textarea class="textarea" name="ruDescription" rows="5" required>{{ old("ruDescription") == '' ? $slide->ruDescription : old("ruDescription") }}</textarea>
                </div>

                <div class="form-group">
                    <label class="label">Приоритет <span class="required">*</span></label>
                    <input class="input" name="priority" type="number" value="{{ old('priority') == '' ? $slide->priority : old('priority') }}"
                        required>
                </div>

                <div class="form-group">
                    <label class="label">Изображение <span class="required">*</span></label>
                    {{-- Archive with id = 1 --}}
                    <input class="input" name="image" type="file" accept=".png, .jpg, .jpeg" data-action="nullify-archive-input"
                        data-archive-input-id="image_archive1_input" id="image_archive1_mirror_input"/>
                    @include("dashboard.templates.archives.images_show_button", ["archive_id" => '1'])
                    <input class="input input--readonly" readonly type="text" name="image_from_archive" id="image_archive1_input">

                    <a class="form-group__image-container" href="{{ asset('img/archive/' . $slide->image)}}" target="_blank">
                        <img class="form-group__image" src="{{ asset('img/archive/medium/' . $slide->image)}}">
                        <span class="form-group__image-filename">{{$slide->image}}</span>
                    </a>
                </div>

                <div class="form-group">
                    <label class="label">Ссылка кнопки. Включая http или https. Пример : https://somon.tj. Можно оставить пустым!</label>
                    <input type="text" class="input" name="link" value="{{ old("link") == '' ? $slide->link : old("link") }}">
                </div>

                <div class="form-group">
                    <label class="label">Ссылка на видео. Включая http или https. Пример : https://somon.tj. Можно оставить пустым!</label>
                    <input type="text" class="input" name="video" value="{{ old("video") == '' ? $slide->video : old("video") }}">
                </div>
            </div> {{-- RU Tab Content end --}}

            {{-- TJ Tab Content start --}}
            <div class="tab-pane fade" id="nav-tj" role="tabpanel" aria-labelledby="nav-tj-tab">
                <div class="form-group">
                    <label class="label">Текст над заголовоком</label>
                    <input class="input" name="tjCrumb" type="text" value="{{ old('tjCrumb') == '' ? $slide->tjCrumb : old('tjCrumb') }}">
                </div>

                <div class="form-group">
                    <label class="label">Заголовок</label>
                    <input class="input" name="tjTitle" type="text" value="{{old('tjTitle') == '' ? $slide->tjTitle : old('tjTitle') }}">
                </div>

                <div class="form-group">
                    <label class="label">Описание слайда</label>
                    <textarea class="textarea" name="tjDescription" rows="5">{{ old("tjDescription") == '' ? $slide->tjDescription : old("tjDescription") }}</textarea>
                </div>
            </div> {{-- TJ Tab Content end --}}

            {{-- EN Tab Content start --}}
            <div class="tab-pane fade" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                <div class="form-group">
                    <label class="label">Текст над заголовоком</label>
                    <input class="input" name="enCrumb" type="text" value="{{ old('enCrumb') == '' ? $slide->enCrumb : old('enCrumb') }}">
                </div>

                <div class="form-group">
                    <label class="label">Заголовок</label>
                    <input class="input" name="enTitle" type="text" value="{{old('enTitle') == '' ? $slide->enTitle : old('enTitle') }}">
                </div>

                <div class="form-group">
                    <label class="label">Описание слайда</label>
                    <textarea class="textarea" name="enDescription" rows="5">{{ old("enDescription") == '' ? $slide->ruDescription : old("enDescription") }}</textarea>
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
                Вы уверены что хотите удалить слайд ?
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-bs-dismiss="modal">Отмена</button>
                <form action="{{ route('slider.remove') }}" method="POST" id="remove_single_item_form">
                    @csrf
                    <input type="hidden" value="{{$slide->id}}" name="id" id="remove_single_modal_input"/>
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