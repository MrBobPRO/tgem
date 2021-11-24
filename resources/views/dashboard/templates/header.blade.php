<header class="header" id="header">
    <span class="material-icons-outlined aside-toggler" id="aside_toggler" data-bs-toggle="tooltip"
        data-bs-placement="bottom" title="На весь экран">menu</span>
    {{-- Header Title start --}}
    <h1 class="header__title">
        @switch($route)
        @case('dashboard.index')
        Меню
        @break

        @case('dashboard.dropdowns.single')
        Меню / {{$dropdown->title}}
        @break

        @case('dashboard.dropdowns.create')
        Меню / Добавить выпадающий список
        @break

        @case('dashboard.pages.index')
        Меню / {{$dropdown->title}}
        @break

        @case('dashboard.pages.create')
        Меню / {{$dropdown->title}} / Добавить страницу
        @break

        @case('dashboard.pages.single')
        Меню / {{$page->dropdown->title}} / {{$page->title}}
        @break

        @case('dashboard.slider.index')
        Слайдер
        @break

        @case('dashboard.slider.create')
        Слайдер / Добавить слайд
        @break

        @case('dashboard.slider.single')
        Слайдер / {{$slide->title}}
        @break

        @case('dashboard.projects.index')
        Проекты
        @break

        @case('dashboard.projects.create')
        Проекты / Добавить новый
        @break

        @case('dashboard.projects.single')
        Проекты / {{$project->title}}
        @break

        @case('dashboard.projects.groups.index')
        Проекты / Группы
        @break

        @case('dashboard.projects.groups.create')
        Проекты / Группы / Добавить новый
        @break

        @case('dashboard.projects.groups.single')
        Проекты / Группы / {{$group->title}}
        @break

        @case('dashboard.news.index')
        Новости
        @break

        @case('dashboard.news.create')
        Новости / Добавить новый
        @break

        @case('dashboard.news.single')
        Новости / {{$new->title}}
        @break

        @case('dashboard.vacancies.index')
        Вакансии
        @break

        @case('dashboard.vacancies.create')
        Вакансии / Добавить новый
        @break

        @case('dashboard.vacancies.single')
        Вакансии / {{$vacancy->title}}
        @break

        @case('dashboard.galleries.index')
        Галерея
        @break

        @case('dashboard.galleries.create')
        Галерея / Добавить новый
        @break

        @case('dashboard.galleries.single')
        Галерея / {{$gallery->title}}
        @break

        @case('dashboard.booking.index')
        Приёмная генерального директора
        @break

        @case('dashboard.booking.records.single')
        Приёмная генерального директора / {{$record->name}}
        @break

        @endswitch
    </h1> {{-- Header Title end --}}

    {{-- Page info start --}}
    <div class="header__actions">
        {{-- Routes may have different actions --}}
        @switch($route)
        @case('dashboard.index')
        <span class="header__actions-span">Элементов : {{$items_count}}</span>
        <a class="header__actions-link" href="{{route('dashboard.dropdowns.create')}}">Добавить выпадающий список</a>
        <button class="header__actions-button" type="button" data-bs-toggle="modal"
            data-bs-target="#remove_multiple_modal">Удалить отмеченные</button>
        @break

        @case('dashboard.pages.index')
        <span class="header__actions-span">Элементов : {{$items_count}}</span>
        <a class="header__actions-link" href="{{route('dashboard.pages.create') . '?dropdown_id=' . $dropdown->id}}">Добавить страницу</a>
        <button class="header__actions-button" type="button" data-bs-toggle="modal"
            data-bs-target="#remove_multiple_modal">Удалить отмеченные</button>
        @break

        @case('dashboard.slider.index')
        <span class="header__actions-span">Элементов : {{$items_count}}</span>
        <a class="header__actions-link" href="{{route('dashboard.slider.create')}}">Добавить слайд</a>
        <button class="header__actions-button" type="button" data-bs-toggle="modal"
            data-bs-target="#remove_multiple_modal">Удалить отмеченные</button>
        @break

        @case('dashboard.projects.index')
        <span class="header__actions-span">Элементов : {{$items_count}}</span>
        <a class="header__actions-link" href="{{route('dashboard.projects.groups.index')}}">Группы</a>
        <a class="header__actions-link" href="{{route('dashboard.projects.create')}}">Добавить проект</a>
        <button class="header__actions-button" type="button" data-bs-toggle="modal"
            data-bs-target="#remove_multiple_modal">Удалить отмеченные</button>
        @break

        @case('dashboard.projects.groups.index')
        <span class="header__actions-span">Элементов : {{$items_count}}</span>
        <a class="header__actions-link" href="{{route('dashboard.projects.groups.create')}}">Добавить группу</a>
        <button class="header__actions-button" type="button" data-bs-toggle="modal"
            data-bs-target="#remove_multiple_modal">Удалить отмеченные</button>
        @break

        @case('dashboard.news.index')
        <span class="header__actions-span">Элементов : {{$items_count}}</span>
        <a class="header__actions-link" href="{{route('dashboard.news.create')}}">Добавить новость</a>
        <button class="header__actions-button" type="button" data-bs-toggle="modal"
            data-bs-target="#remove_multiple_modal">Удалить отмеченные</button>
        @break

        @case('dashboard.vacancies.index')
        <span class="header__actions-span">Элементов : {{$items_count}}</span>
        <a class="header__actions-link" href="{{route('dashboard.vacancies.create')}}">Добавить вакансию</a>
        <button class="header__actions-button" type="button" data-bs-toggle="modal"
            data-bs-target="#remove_multiple_modal">Удалить отмеченные</button>
        @break

        @case('dashboard.galleries.index')
        <span class="header__actions-span">Элементов : {{$items_count}}</span>
        <a class="header__actions-link" href="{{route('dashboard.galleries.create')}}">Добавить галерею</a>
        <button class="header__actions-button" type="button" data-bs-toggle="modal"
            data-bs-target="#remove_multiple_modal">Удалить отмеченные</button>
        @break

        @case('dashboard.booking.index')
        <span class="header__actions-span">Элементов : {{$items_count}}</span>
        <span class="header__actions-span">Новые записи : {{$new_records_count}}</span>
        <button class="header__actions-button" type="button" data-bs-toggle="modal"
            data-bs-target="#remove_multiple_modal">Удалить отмеченные</button>
        @break

        @endswitch
    </div> {{-- Page info end --}}

</header>