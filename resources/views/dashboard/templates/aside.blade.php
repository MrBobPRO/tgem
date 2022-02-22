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
                <a class="aside__nav-link @if($route == 'dashboard.slider.index' || $route == 'dashboard.slider.single' || $route == 'dashboard.slider.create') aside__nav-link--active @endif"
                    href="{{route('dashboard.slider.index')}}"><span class="aside__nav-link-icon material-icons">perm_media</span>
                    Слайдер</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.news.index' || $route == 'dashboard.news.single' || $route == 'dashboard.news.create') aside__nav-link--active @endif"
                    href="{{route('dashboard.news.index')}}"><span class="aside__nav-link-icon material-icons">article</span>
                    Новости</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.projects.index' || $route == 'dashboard.projects.single' || $route == 'dashboard.projects.create' || $route == 'dashboard.projects.groups.index' || $route == 'dashboard.projects.groups.single' || $route == 'dashboard.projects.groups.create') aside__nav-link--active @endif"
                    href="{{route('dashboard.projects.index')}}"><span
                        class="aside__nav-link-icon material-icons">location_city</span> Проекты</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.vacancies.index' || $route == 'dashboard.vacancies.single' || $route == 'dashboard.vacancies.create') aside__nav-link--active @endif"
                    href="{{route('dashboard.vacancies.index')}}"><span class="aside__nav-link-icon material-icons">work</span>
                    Вакансии</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.galleries.index' || $route == 'dashboard.galleries.single' || $route == 'dashboard.galleries.create') aside__nav-link--active @endif"
                    href="{{route('dashboard.galleries.index')}}"><span
                        class="aside__nav-link-icon material-icons">collections</span> Галерея</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.options.index' || $route == 'dashboard.options.single') aside__nav-link--active @endif"
                    href="{{route('dashboard.options.index')}}"><span
                        class="aside__nav-link-icon material-icons">collections</span> Тексты</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.translations.index' || $route == 'dashboard.translations.single') aside__nav-link--active @endif"
                    href="{{route('dashboard.translations.index')}}"><span
                        class="aside__nav-link-icon material-icons">translate</span> Переводы</a>
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