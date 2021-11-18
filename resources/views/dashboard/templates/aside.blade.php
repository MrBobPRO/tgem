<aside class="aside" id="aside">
    <a class="aside__logo" href="{{ route('home') }}" target="_blank">
        <img class="aside__logo-image" src="{{ asset('img/archive/logo.png') }}">
    </a>

    <img class="aside__avatar" src="{{ asset('img/archive/admin.jpg') }}">

    <nav class="aside__nav">
        <ul class="aside__nav-ul">
            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.index' || $route == 'dashboard.dropdowns.single' || $route == 'dashboard.dropdowns.create' || $route == 'dashboard.pages.index' || $route == 'dashboard.pages.single' || $route == 'dashboard.pages.create') aside__nav-link--active @endif"
                    href="{{route('dashboard.index')}}"><span
                        class="aside__nav-link-icon material-icons">menu_open</span> Меню</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.projects.index' || $route == 'dashboard.projects.single' || $route == 'dashboard.projects.create' || $route == 'dashboard.projects.groups.index' || $route == 'dashboard.projects.groups.single' || $route == 'dashboard.projects.groups.create') aside__nav-link--active @endif"
                    href="{{route('dashboard.projects.index')}}"><span
                        class="aside__nav-link-icon material-icons">location_city</span> Проекты</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.news.index' || $route == 'dashboard.news.single' || $route == 'dashboard.news.create') aside__nav-link--active @endif"
                    href="{{route('dashboard.news.index')}}"><span class="aside__nav-link-icon material-icons">article</span>
                    Новости</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.vacancies.index' || $route == 'dashboard.vacancies.single' || $route == 'dashboard.vacancies.create') aside__nav-link--active @endif"
                    href="{{route('dashboard.vacancies.index')}}"><span class="aside__nav-link-icon material-icons">work</span>
                    Вакансии</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.galleries.index') aside__nav-link--active @endif"
                    href="{{route('dashboard.index')}}"><span
                        class="aside__nav-link-icon material-icons">collections</span> Галерея</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.booking.index' || $route == 'dashboard.booking.records.single') aside__nav-link--active @endif"
                    href="{{route('dashboard.booking.index')}}"><span class="aside__nav-link-icon material-icons">edit</span>
                    Приёмная @if($new_booking_records_count > 0)
                    ({{ $new_booking_records_count}})@endif </a>
            </li>

            <li class="aside__nav-li">
                <form class="aside__form" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="aside__form-button" type="submit"><span class="aside__form-icon material-icons">logout</span>
                        Выйти</button>
                </form>
            </li>
        </ul>
    </nav>

</aside>