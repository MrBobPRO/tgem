
<div class="common-gallery">
    <h1 class="common-gallery__title">Картинки галереи <span class="common-gallery__title-counter">{{ $item->images()->count() }} штук</span></h1>
    <div class="common-gallery__list">
        {{-- store image form start --}}
        <form class="common-gallery__form" action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $relation_column_name }}" name="relation_column_name">
            <input type="hidden" value="{{ $item->id }}" name="relation_column_id">

            <h1 class="common-gallery__form-title">Добавить новую картинку</h1>
            <label class="label">Заголовок</label>
            <input class="input common-gallery__title-input" name="title" type="text">

            <label class="label">Изображение <span class="required">*</span></label>
            {{-- Archive with id = 1 --}}
            <input class="input" name="image" type="file" data-action="nullify-archive-input"
                data-archive-input-id="image_archive99_input" id="image_archive99_mirror_input"/>
            @include("dashboard.templates.archives.images_show_button", ["archive_id" => '99'])
            <input class="input input--readonly" readonly type="text" name="image_from_archive" id="image_archive99_input">

            <div class="main-form__controls common-gallery__form-controls">
                <button class="button button--iconed button--success main-form__controls-button" type="submit"><span
                        class="material-icons-outlined">
                        add
                    </span> Добавить</button>
            </div>
        </form>  {{-- store image form end --}}

        @foreach ($item->images as $image)
            <form class="common-gallery__form" action="{{ route('images.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $image->id }}">
                <label class="label">Заголовок</label>
                <input class="input common-gallery__title-input" name="title" type="text" value="{{ $image->title }}">

                <label class="label">Картинка <span class="required">*</span></label>
                <a class="form-group__image-container" href="{{ asset('img/archive/' . $image->filename)}}" target="_blank">
                    <img class="form-group__image" src="{{ asset('img/archive/medium/' . $image->filename)}}">
                    <span class="form-group__image-filename">{{$image->filename}}</span>
                </a>

                <div class="main-form__controls common-gallery__form-controls">
                    <button class="button button--iconed button--success main-form__controls-button" type="submit"><span
                            class="material-icons-outlined">
                            done_all
                        </span> Сохранить</button>
            
                    <button class="button button--danger button--iconed main-form__controls-button" type="button" data-action="show_common_gallery_remove_image_modal" data-image-id="{{ $image->id }}">
                        <span class="material-icons-outlined">
                            remove_circle
                        </span> Удалить</button>
                </div>
            </form>
        @endforeach
    </div>

    {{-- Image archive with id = 99 --}}
    @include("dashboard.templates.archives.images", ["archive_id" => "99"])

    <!-- Remove Single Gallery Image Modal Start-->
    <div class="modal fade" id="common_gallery_remove_image_modal" tabindex="-1" aria-labelledby="common_gallery_remove_image_modal_label"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="common_gallery_remove_image_modal_label">Удалить</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Вы уверены что хотите удалить картинку из галереи ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="button" data-bs-dismiss="modal">Отмена</button>
                    <form action="{{ route('images.remove') }}" method="POST" id="common_gallery_remove_image_modal_form">
                        @csrf
                        <input type="hidden" value="0" name="id" id="common_gallery_remove_image_modal_input"/>
                        <button type="submit" class="button button--danger" id="remove_single_modal_button">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Remove Single Gallery Image Modal End-->

</div>