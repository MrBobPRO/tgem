@extends('dashboard.templates.master')
@section("main")

{{-- Search start --}}
<section class="search">
    <div class="select2_single_container">
        <select class="select2_single select2_single_linked" data-placeholder="Поиск..."
            data-dropdown-css-class="select2_single_dropdown">
            <option></option>
            @foreach($all_items as $item)
            <option value="{{ route('dashboard.projects.single', $item->id)}}">{{$item->title}}</option>
            @endforeach
        </select>
    </div>
</section>
{{-- Search end --}}

{{-- Main list start --}}
<section class="list">
    {{-- Titles start --}}
    <div class="titles">
        <div class="titles__item width-50">Заголовок</div>
        <div class="titles__item width-50">Количество проектов</div>
        <div class="titles__controls">Действия</div>
    </div> {{-- Titles end --}}

    {{-- Multiple Items form start --}}
    <form action="{{ route('projects.groups.remove_multiple') }}" method="POST" id="multiple_items_form">
        @csrf
        @foreach ($groups as $group)
        {{-- List Item start --}}
        <div class="list__item">
            {{-- checkboxes for multiple remove --}}
            <div class="checkbox">
                <label for="{{$group->id}}" class="checkbox__label">
                    <input class="checkbox__input" id="{{$group->id}}" type="checkbox" name="ids[]"
                        value="{{$group->id}}">
                    <span class="checkbox__checkmark"></span>
                </label>
            </div>

            <div class="list__item-div width-50">{{$group->title}}</div>
            <div class="list__item-div width-50">{{$group->projects_count}}</div>

            {{-- Item Controls start --}}
            <div class="list__item-controls">
                <a class="control-button" href="{{route('dashboard.projects.groups.single', $group->id)}}" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" title="Редактировать"><span class="material-icons">edit</span></a>

                <button class="control-button control-button--red" type="button" data-action="show_single_remove_modal"
                    data-item-id="{{$group->id}}" data-bs-toggle="tooltip" data-bs-placement="bottom"
                    title="Удалить"><span class="material-icons">delete</span></button>
            </div> {{-- Item Controls start --}}
        </div> {{-- List Item start --}}
        @endforeach
    </form> {{-- Multiple Items form end --}}

    {{$groups->links()}}
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
                Вы уверены что хотите удалить отмеченные группы ?<br>
                Группы всех проектов удаляемой группы будут изменены автоматический ! <br><br>
                <b>Как миннимум 1 группа должна существовать.</b>
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
                Вы уверены что хотите удалить группу ? <br>
                Группы всех проектов удаляемой группы будут изменены автоматический ! <br><br>
                <b>Как миннимум 1 группа должна существовать.</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-bs-dismiss="modal">Отмена</button>
                <form action="{{ route('projects.groups.remove') }}" method="POST">
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