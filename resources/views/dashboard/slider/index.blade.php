@extends('dashboard.templates.master')
@section("main")

{{-- Search start --}}
<section class="search">
    <div class="select2_single_container">
        <select class="select2_single select2_single_linked" data-placeholder="Поиск..."
            data-dropdown-css-class="select2_single_dropdown">
            <option></option>
            @foreach($all_items as $item)
            <option value="{{ route('dashboard.slider.single', $item->id)}}">{{$item->title}}</option>
            @endforeach
        </select>
    </div>
</section>
{{-- Search end --}}

{{-- Main list start --}}
<section class="list">
    {{-- Titles start --}}
    <div class="titles">
        <div class="titles__item width-33">
            @if($order_by != "title")
            <a class="titles__link"
                href="{{ route('dashboard.slider.index') . '?page=' . $active_page . '&order_by=title&order_type=asc' }}">Заголовок
                <span class="material-icons-outlined titles__icon">arrow_upward</span>
            </a>
            @elseif($order_by == "title" && $order_type == "asc")
            <a class="titles__link"
                href="{{ route('dashboard.slider.index') . '?page=' . $active_page . '&order_by=title&order_type=desc' }}">Заголовок
                <span class="material-icons-outlined titles__icon titles__icon--active">arrow_upward</span>
            </a>
            @elseif($order_by == "title" && $order_type == "desc")
            <a class="titles__link"
                href="{{ route('dashboard.slider.index') . '?page=' . $active_page . '&order_by=title&order_type=asc' }}">Заголовок
                <span class="material-icons-outlined titles__icon titles__icon--active">arrow_downward</span>
            </a>
            @endif
        </div>

        <div class="titles__item width-33">
            @if($order_by != "priority")
            <a class="titles__link"
                href="{{ route('dashboard.slider.index') . '?page=' . $active_page . '&order_by=priority&order_type=asc' }}">Приоритет
                <span class="material-icons-outlined titles__icon">arrow_upward</span>
            </a>
            @elseif($order_by == "priority" && $order_type == "asc")
            <a class="titles__link"
                href="{{ route('dashboard.slider.index') . '?page=' . $active_page . '&order_by=priority&order_type=desc' }}">Приоритет
                <span class="material-icons-outlined titles__icon titles__icon--active">arrow_upward</span>
            </a>
            @elseif($order_by == "priority" && $order_type == "desc")
            <a class="titles__link"
                href="{{ route('dashboard.slider.index') . '?page=' . $active_page . '&order_by=priority&order_type=asc' }}">Приоритет
                <span class="material-icons-outlined titles__icon titles__icon--active">arrow_downward</span>
            </a>
            @endif
        </div>

        <div class="titles__item width-33">
            @if($order_by != "link")
            <a class="titles__link"
                href="{{ route('dashboard.slider.index') . '?page=' . $active_page . '&order_by=link&order_type=desc' }}">Ссылка кнопки
                <span class="material-icons-outlined titles__icon">arrow_downward</span>
            </a>
            @elseif($order_by == "link" && $order_type == "asc")
            <a class="titles__link"
                href="{{ route('dashboard.slider.index') . '?page=' . $active_page . '&order_by=link&order_type=desc' }}">Ссылка кнопки
                <span class="material-icons-outlined titles__icon titles__icon--active">arrow_upward</span>
            </a>
            @elseif($order_by == "link" && $order_type == "desc")
            <a class="titles__link"
                href="{{ route('dashboard.slider.index') . '?page=' . $active_page . '&order_by=link&order_type=asc' }}">Ссылка кнопки
                <span class="material-icons-outlined titles__icon titles__icon--active">arrow_downward</span>
            </a>
            @endif
        </div>

        <div class="titles__controls">Действия</div>
    </div> {{-- Titles end --}}

    {{-- Multiple Items form start --}}
    <form action="{{ route('slider.remove_multiple') }}" method="POST" id="multiple_items_form">
        @csrf
        @foreach ($slides as $slide)
        {{-- List Item start --}}
        <div class="list__item">
            {{-- checkboxes for multiple remove --}}
            <div class="checkbox">
                <label for="{{$slide->id}}" class="checkbox__label">
                    <input class="checkbox__input" id="{{$slide->id}}" type="checkbox" name="ids[]"
                        value="{{$slide->id}}">
                    <span class="checkbox__checkmark"></span>
                </label>
            </div>

            <div class="list__item-div width-33">{{$slide->title}}</div>
            <div class="list__item-div width-33">{{$slide->priority}}</div>
            <div class="list__item-div width-33">{{$slide->link}}</div>

            {{-- Item Controls start --}}
            <div class="list__item-controls">
                <a class="control-button control-button--blue" href="{{ route('home')}}"
                    target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Посмотреть"><span
                        class="material-icons">visibility</span></a>

                <a class="control-button" href="{{route('dashboard.slider.single', $slide->id)}}" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" title="Редактировать"><span class="material-icons">edit</span></a>

                <button class="control-button control-button--red" type="button" data-action="show_single_remove_modal"
                    data-item-id="{{$slide->id}}" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="Удалить"><span class="material-icons">delete</span></button>
            </div> {{-- Item Controls start --}}
        </div> {{-- List Item start --}}
        @endforeach
    </form> {{-- Multiple Items form end --}}

    {{$slides->links()}}
</section> {{-- Main list end --}}


<!-- Remove Multiple Items Modal Start-->
<div class="modal fade" id="remove_multiple_modal" tabindex="-1" aria-labelledby="remove_multiple_modal_label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="remove_multiple_modal_label">Удалить</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Вы уверены что хотите удалить отмеченные слайды ?<br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-bs-dismiss="modal">Отмена</button>
                <button type="button" class="button button--danger" id="remove_multiple_modal_button">Удалить</button>
            </div>
        </div>
    </div>
</div>
<!-- Rmove Multiple Items Modal End-->


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
                <form action="{{ route('slider.remove') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" value="0" name="id" id="remove_single_modal_input" />
                    <button type="submit" class="button button--danger" id="remove_single_modal_button">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Remove Single Items Modal End-->


@endsection