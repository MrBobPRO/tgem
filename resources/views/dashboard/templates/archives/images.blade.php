    <!-- Image Archive Modal start-->
    <div class="modal fade archive-modal image-archive-modal" id="image_archive{{$archive_id}}" tabindex="-1" aria-labelledby="image_archive{{$archive_id}}_label"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            {{-- Image Archive Modal Content start --}}
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="image_archive{{$archive_id}}_label">
                        <span class="material-icons-outlined">image</span> Выбрать изображение из архива
                    </h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span class="material-icons-outlined">close</span>
                    </button>
                </div>

                {{-- Image Archive Modal Body start --}}
                <div class="modal-body archive__body">
                    {{-- Search start --}}
                    <div class="archive__search">
                        <input class="archive__search-input" type="text" list="image-archive__list{{$archive_id}}" placeholder="Поиск..." data-action="update_archive_list" data-archive-list-id="image_archive{{$archive_id}}_list"><span class="material-icons-outlined archive__search-icon">search</span>
                    </div>
                    <datalist id="image-archive__list{{$archive_id}}">
                        @foreach ($images as $img)
                            <option value="{{$img}}"></option>
                        @endforeach
                    </datalist>
                    {{-- Search end --}}

                    <div class="archive__list" id="image_archive{{$archive_id}}_list">
                        @foreach ($images as $img)
                            <div class="archive__list-item" data-archive-filename="{{$img}}">
                                <a href="{{ asset('img/archive/' . $img)}}" target="_blank">
                                    <img class="archive__list-image" src="{{ asset('img/archive/small/' . $img)}}">
                                </a>
                                <button data-action="validate_archive_input" data-archive-input-id="image_archive{{$archive_id}}_input" data-mirror-input-id="image_archive{{$archive_id}}_mirror_input" data-modal-id="image_archive{{$archive_id}}" class="archive__list-filename">{{$img}}</button>
                            </div>
                        @endforeach
                    </div>
                </div> {{-- Image Archive Modal Body end --}}

            </div> {{-- Image Archive Modal Content end --}}
        </div>
    </div>  <!-- Image Archive Modal end-->