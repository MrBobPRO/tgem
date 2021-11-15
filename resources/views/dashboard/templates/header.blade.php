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

        @endswitch
    </div> {{-- Page info start --}}

    {{-- Header Additional start --}}
    <div class="header__additional">
        <a class="header__additional-link" href="{{route('home')}}" target="_blank">На сайт<span
                class="material-icons-outlined header__additional-icob">home</span></a>
        <form class="header__additional-form" method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="header__additional-button" type="submit">Выход<span
                    class="material-icons-outlined header__additional-icon">exit_to_app</span></button>
        </form>
    </div> {{-- Header Additional end --}}

</header>