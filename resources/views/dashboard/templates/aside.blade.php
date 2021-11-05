<aside class="aside" id="aside">
    <img class="aside__avatar" src="{{ asset('img/dashboard/admin.jpg') }}">
    <h3 class="aside__username">Админ</h3>

    <nav class="aside__nav">
        <ul class="aside__nav-ul">
            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.index' || $route == 'dashboard.dropdowns.single' || $route == 'dashboard.dropdowns.create' || $route == 'dashboard.dropdown.pages' || $route == 'dashboard.pages.single' || $route == 'dashboard.pages.create') aside__nav-link--active @endif"
                    href="{{route('dashboard.index')}}"><span
                        class="aside__nav-link-icon material-icons">menu_open</span> Меню</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.projects.index') aside__nav-link--active @endif"
                    href="{{route('dashboard.index')}}"><span
                        class="aside__nav-link-icon material-icons">location_city</span> Проекты</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.news.index') aside__nav-link--active @endif"
                    href="{{route('dashboard.index')}}"><span class="aside__nav-link-icon material-icons">article</span>
                    Новости</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.images.index') aside__nav-link--active @endif"
                    href="{{route('dashboard.index')}}"><span class="aside__nav-link-icon material-icons">work</span>
                    Вакансии</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.galleries.index') aside__nav-link--active @endif"
                    href="{{route('dashboard.index')}}"><span
                        class="aside__nav-link-icon material-icons">collections</span> Галерея</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.images.index') aside__nav-link--active @endif"
                    href="{{route('dashboard.index')}}"><span class="aside__nav-link-icon material-icons">image</span>
                    Картинки</a>
            </li>

            <li class="aside__nav-li">
                <a class="aside__nav-link @if($route == 'dashboard.images.index') aside__nav-link--active @endif"
                    href="{{route('dashboard.index')}}"><span class="aside__nav-link-icon material-icons">edit</span>
                    Приёмная</a>
            </li>
        </ul>
    </nav>

</aside>