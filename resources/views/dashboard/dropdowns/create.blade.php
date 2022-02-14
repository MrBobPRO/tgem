@extends('dashboard.templates.master')
@section("main")

<form class="main-form" id="create_form" action="{{ route('dropdowns.store') }}" method="POST"
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
                    <label class="label">Приоритет <span class="required">*</span></label>
                    <input class="input" name="priority" type="number" value="{{ old('priority') }}" required>
                </div>

                <div class="form-group">
                    <label class="label">Ссылка <span class="required">*</span></label>
                    <input class="input" name="url" type="text" value="{{ old('url') }}" required>
                </div>

                <div class="form-group switch-container">
                    <label for="may_have_childs">Может иметь дочерных страниц</label>
                    <label class="switch">
                        <input class="switch__input" type="checkbox" name="may_have_childs" id="may_have_childs" checked>
                        <span class="switch__slider"></span>
                    </label>
                </div>
            </div> {{-- RU Tab Content end --}}

            {{-- TJ Tab Content start --}}
            <div class="tab-pane fade" id="nav-tj" role="tabpanel" aria-labelledby="nav-tj-tab">
                <div class="form-group">
                    <label class="label">Заголовок</label>
                    <input class="input" name="tjTitle" type="text" value="{{ old('tjTitle') }}">
                </div>
            </div> {{-- TJ Tab Content end --}}

            {{-- EN Tab Content start --}}
            <div class="tab-pane fade" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                <div class="form-group">
                    <label class="label">Заголовок</label>
                    <input class="input" name="enTitle" type="text" value="{{ old('enTitle') }}">
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

@endsection