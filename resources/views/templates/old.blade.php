<header class="header">
    @if($route == "home")
        {{-- Header contacts start --}}
        <div class="header__contacts-wrapper">
            <div class="main-container header__contacts">
                <a href="/" class="logo header__contacts-logo">
                    <img class="logo__img" src="{{ asset('img/main/logo.png') }}" alt="ТГЕМ лого">
                </a>

                <div class="header__contacts-item">
                    <p class="header__contacts-title">Телефон:</p>
                    <a href="#" class="header__contacts-link">(+992 37) 238 1111, 238 1313</a>
                </div>

                <div class="header__contacts-item header__contacts-item--seperator">
                    <p class="header__contacts-title">ПН - ПТ:</p>
                    <a href="javascript:void(0)" class="header__contacts-link">08:00 - 18:00</a>
                </div>

                <div class="header__contacts-item">
                    <p class="header__contacts-title">Ул. Н. Хувайдуллоева 377/1</p>
                    <a href="#" class="header__contacts-link">734060 Г. Душанбе</a>
                </div>
            </div>
        </div>  {{-- Header contacts end --}}

        {{-- Home navbar start --}}
        <nav class="main-container navbar home-navbar">
            <span class="material-icons aside-toogler">menu_open</span>

            <ul class="navbar__list home-navbar__list">
                <li class="navbar__item home-navbar__item">
                    <a class="navbar__link home-navbar__link" href="#">Главная</a>
                </li>

                <li class="dropdown navbar__dropdown">
                    <a href="javascript::void(0)" class="dropdown__btn navbar__dropdown-btn home-navbar__dropdown-btn">О Компании</a>

                    <ul class="dropdown__list navbar__dropdown-list">
                        <li class="dropdown__item navbar__dropdown-item">
                            <a class="dropdown__link navbar__dropdown-link" href="#">О Нас</a>
                        </li>

                        <li class="dropdown__item navbar__dropdown-item">
                            <a class="dropdown__link navbar__dropdown-link" href="#">История</a>
                        </li>

                        <li class="dropdown__item navbar__dropdown-item">
                            <a class="dropdown__link navbar__dropdown-link" href="#">Корпоративная культура</a>
                        </li>

                        <li class="dropdown__item navbar__dropdown-item">
                            <a class="dropdown__link navbar__dropdown-link" href="#">Социальная ответственность</a>
                        </li>

                        <li class="dropdown__item navbar__dropdown-item">
                            <a class="dropdown__link navbar__dropdown-link" href="#">Сертификаты</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown navbar__dropdown">
                    <a href="javascript::void(0)" class="dropdown__btn navbar__dropdown-btn home-navbar__dropdown-btn">Деятельность</a>

                    <ul class="dropdown__list navbar__dropdown-list">
                        <li class="dropdown__item navbar__dropdown-item">
                            <a class="dropdown__link navbar__dropdown-link" href="#">Строительство</a>
                        </li>

                        <li class="dropdown__item navbar__dropdown-item">
                            <a class="dropdown__link navbar__dropdown-link" href="#">Энергетика</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown navbar__dropdown">
                    <a href="javascript::void(0)" class="dropdown__btn navbar__dropdown-btn home-navbar__dropdown-btn">Проекты</a>

                    <ul class="dropdown__list navbar__dropdown-list">
                        <li class="dropdown__item navbar__dropdown-item">
                            <a class="dropdown__link navbar__dropdown-link" href="#">Выполненные проекты</a>
                        </li>

                        <li class="dropdown__item navbar__dropdown-item">
                            <a class="dropdown__link navbar__dropdown-link" href="#">Текущие проекты</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown navbar__dropdown">
                    <a href="javascript::void(0)" class="dropdown__btn navbar__dropdown-btn home-navbar__dropdown-btn">Медиа</a>

                    <ul class="dropdown__list navbar__dropdown-list">
                        <li class="dropdown__item navbar__dropdown-item">
                            <a class="dropdown__link navbar__dropdown-link" href="#">Новости компании</a>
                        </li>

                        <li class="dropdown__item navbar__dropdown-item">
                            <a class="dropdown__link navbar__dropdown-link" href="#">Отраслевые новости</a>
                        </li>

                        <li class="dropdown__item navbar__dropdown-item">
                            <a class="dropdown__link navbar__dropdown-link" href="#">Галерея</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown navbar__dropdown">
                    <a href="javascript::void(0)" class="dropdown__btn navbar__dropdown-btn home-navbar__dropdown-btn">Карьера</a>

                    <ul class="dropdown__list navbar__dropdown-list">
                        <li class="dropdown__item navbar__dropdown-item">
                            <a class="dropdown__link navbar__dropdown-link" href="#">Карьера в ТГЭМ</a>
                        </li>

                        <li class="dropdown__item navbar__dropdown-item">
                            <a class="dropdown__link navbar__dropdown-link" href="#">Вакансии</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown navbar__dropdown">
                    <a href="javascript::void(0)" class="dropdown__btn navbar__dropdown-btn home-navbar__dropdown-btn">Контакты</a>

                    <ul class="dropdown__list navbar__dropdown-list">
                        <li class="dropdown__item navbar__dropdown-item">
                            <a class="dropdown__link navbar__dropdown-link" href="#">Контакты</a>
                        </li>

                        <li class="dropdown__item navbar__dropdown-item">
                            <a class="dropdown__link navbar__dropdown-link" href="#">Онлайн запись</a>
                        </li>
                    </ul>
                </li>
            </ul>  {{-- Home navbar list end --}}

            <div class="search-toogler">
                <span class="material-icons search-toogler__icon">search</span>
            </div>

        </nav> {{-- Home navbar end --}}


    @endif
</header>