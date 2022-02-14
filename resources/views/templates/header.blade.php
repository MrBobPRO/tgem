<header class="header">

    <div class="mobile-logo">
        <img class="mobile-logo__img" src="{{ asset('img/archive/logo.png') }}" alt="ТГЕМ лого">
    </div>

    @if($route == "home")
    {{-- Header contacts start --}}
    <div class="header__contacts-wrapper">
        <div class="main-container header__contacts">
            <a href="/" class="logo header__contacts-logo">
                <img class="logo__img" src="{{ asset('img/archive/logo.png') }}" alt="ТГЕМ лого">
            </a>

            <div class="header__contacts-item">
                <p class="header__contacts-title">Телефон:</p>
                <a href="tel:+9922381111" class="header__contacts-link">(+992 37) 238 1111, 238 1313</a>
            </div>

            <div class="header__contacts-item header__contacts-item--seperator">
                <p class="header__contacts-title">ПН - ПТ:</p>
                <a class="header__contacts-link">08:00 - 18:00</a>
            </div>

            <div class="header__contacts-item">
                <p class="header__contacts-title">Ул. Н. Хувайдуллоева 377/1</p>
                <a href="/contacts/our_contacts" class="header__contacts-link">734060 Г. Душанбе</a>
            </div>
        </div>
    </div> {{-- Header contacts end --}}

    {{-- Home Secondary Navbar start --}}
    <nav class="main-container navbar secondary-navbar">
        <span class="material-icons aside-toggler secondary-navbar__aside-toggler">notes</span>
        {{-- Home econdary Navbar start end --}}
        <ul class="navbar__list secondary-navbar__list">

            @foreach($dropdowns as $dropdown)
            @if(!$dropdown->may_have_childs)
            <li class="navbar__item secondary-navbar__item">
                <a class="navbar__link secondary-navbar__link" href="{{$dropdown->url}}">{{$dropdown[$locale . 'Title']}}</a>
            </li>
            @else
            <li class="dropdown navbar__dropdown">
                <a href="javascript::void(0)"
                    class="dropdown__btn navbar__dropdown-btn secondary-navbar__dropdown-btn">{{$dropdown[$locale . 'Title']}}</a>

                <ul class="dropdown__list navbar__dropdown-list">
                    @foreach($dropdown->pages()->orderBy("priority", "asc")->get(); as $dp_pg)
                    <li class="dropdown__item navbar__dropdown-item">
                        <a class="dropdown__link navbar__dropdown-link"
                            href="{{route('home') . '/' . $dropdown->url . '/' . $dp_pg->url }}">{{$dp_pg[$locale . 'Title']}}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endif
            @endforeach

            {{-- Locale switcher start --}}
            <li class="dropdown navbar__dropdown locale-dropdown">
                <a href="javascript::void(0)" class="dropdown__btn navbar__dropdown-btn secondary-navbar__dropdown-btn">
                    <img src="{{ asset('img/archive/' . $curLocale->image) }}">
                    {{$curLocale->shortname}}
                </a>

                <ul class="dropdown__list navbar__dropdown-list">
                    @foreach($locales as $loc)
                    <li class="dropdown__item navbar__dropdown-item">
                        <form action="{{ route('locale.switch') }}" method="POST">
                            @csrf
                            <input type="hidden" name="locale" value="{{ $loc->value }}">
                            <button class="dropdown__link navbar__dropdown-link" href="#">
                                <img src="{{ asset('img/archive/' . $loc->image) }}">
                                {{$loc->name}}
                            </button>
                        </form>
                    </li>
                    @endforeach
                </ul>
            </li> {{-- Locale switcher end --}}
        </ul> {{-- Home econdary Navbar List end --}}

        <div class="search-toggler">
            <span class="material-icons search-toggler__icon">search</span>
        </div>

        <span class="material-icons mobile-menu-toggler">menu</span>
    </nav> {{-- Home Secondary Navbar end --}}


    @else {{-- if its NOT HOME PAGE --}}
    {{-- Main navbar start --}}
    <div class="navbar-container">
        {{-- reduced-navbar class added because not enough free space for locale switcher --}}
        <nav class="main-container navbar reduced-navbar">

            <a href="/" class="logo">
                <img class="logo__img" src="{{ asset('img/archive/logo.png') }}" alt="ТГЕМ лого">
            </a>

            <ul class="navbar__list">
                @foreach($dropdowns as $dropdown)
                @if(!$dropdown->may_have_childs)
                <li class="navbar__item">
                    <a class="navbar__link" href="{{$dropdown->url}}">{{$dropdown[$locale . 'Title']}}</a>
                </li>
                @else
                <li class="dropdown navbar__dropdown">
                    <a href="javascript::void(0)" class="dropdown__btn navbar__dropdown-btn">{{$dropdown[$locale . 'Title']}}</a>

                    <ul class="dropdown__list navbar__dropdown-list">
                        @foreach($dropdown->pages()->orderBy("priority", "asc")->get(); as $dp_pg)
                        <li class="dropdown__item navbar__dropdown-item">
                            <a class="dropdown__link navbar__dropdown-link"
                                href="{{route('home') . '/' . $dropdown->url . '/' . $dp_pg->url }}">{{$dp_pg[$locale . 'Title']}}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endif
                @endforeach

                {{-- Locale switcher start --}}
                <li class="dropdown navbar__dropdown locale-dropdown">
                    <a href="javascript::void(0)" class="dropdown__btn navbar__dropdown-btn secondary-navbar__dropdown-btn">
                        <img src="{{ asset('img/archive/' . $curLocale->image) }}">
                        {{$curLocale->shortname}}
                    </a>

                    <ul class="dropdown__list navbar__dropdown-list">
                        @foreach($locales as $loc)
                        <li class="dropdown__item navbar__dropdown-item">
                            <form action="{{ route('locale.switch') }}" method="POST">
                                @csrf
                                <input type="hidden" name="locale" value="{{ $loc->value }}">
                                <button class="dropdown__link navbar__dropdown-link" href="#">
                                    <img src="{{ asset('img/archive/' . $loc->image) }}">
                                    {{$loc->name}}
                                </button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                </li> {{-- Locale switcher end --}}
            </ul> {{-- Home navbar list end --}}

            <span class="material-icons aside-toggler">notes</span>

            <div class="search-toggler">
                <span class="material-icons search-toggler__icon">search</span>
            </div>

            <span class="material-icons mobile-menu-toggler">menu</span>
        </nav> {{-- Main navbar end --}}
    </div>
    @endif


    {{-- Fixed navbar start. Fixed on scroll --}}
    <div class="navbar-container navbar-container--fixed @if($route == 'home') home-navbar-container--fixed @endif "
        id="fixed_navbar_container">
        <nav class="main-container navbar">

            <a href="/" class="logo">
                <img class="logo__img" src="{{ asset('img/archive/logo.png') }}" alt="ТГЕМ лого">
            </a>

            <ul class="navbar__list">
                @foreach($dropdowns as $dropdown)
                @if(!$dropdown->may_have_childs)
                <li class="navbar__item">
                    <a class="navbar__link" href="{{$dropdown->url}}">{{$dropdown[$locale . 'Title']}}</a>
                </li>
                @else
                <li class="dropdown navbar__dropdown">
                    <a href="javascript::void(0)" class="dropdown__btn navbar__dropdown-btn">{{$dropdown[$locale . 'Title']}}</a>

                    <ul class="dropdown__list navbar__dropdown-list">
                        @foreach($dropdown->pages()->orderBy("priority", "asc")->get(); as $dp_pg)
                        <li class="dropdown__item navbar__dropdown-item">
                            <a class="dropdown__link navbar__dropdown-link"
                                href="{{route('home') . '/' . $dropdown->url . '/' . $dp_pg->url }}">{{$dp_pg[$locale . 'Title']}}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endif
                @endforeach
            </ul> {{-- Home navbar list end --}}

            <span class="material-icons aside-toggler">notes</span>

            <div class="search-toggler">
                <span class="material-icons search-toggler__icon">search</span>
            </div>

        </nav> {{-- Main navbar end --}}
    </div> {{-- Fixed navbar end. Fixed on scroll --}}


    {{-- Aside start --}}
    <aside class="aside" id="aside">
        <div class="aside__overlay" data-action="hide-aside"></div>
        <div class="aside__widget">
            <button class="aside__widget-hide-btn" data-action="hide-aside">X</button>
            <img class="logo aside__widget-logo" src="{{ asset('img/archive/logo-white.png') }}" alt="ТГЕМ лого">
            <h1 class="aside__widget-title">О компании</h1>
            <p class="aside__widget-desc">ТГЭМ – ведущая таджикская компания по строительству гидроэнергетических и
                инфраструктурных объектов</p>
            <h1 class="aside__widget-title">Контакты</h1>

            <ul class="aside__widget-list">
                <li class="aside__widget-list-item"><span class="material-icons aside__widget-icon">home</span> 734060
                    г. Душанбе, ул. Н. Хувайдуллоева 377/1</li>
                <li class="aside__widget-list-item"><span class="material-icons aside__widget-icon">phone</span> (+992
                    37) 2381111, 2381313</li>
                <li class="aside__widget-list-item"><span class="material-icons aside__widget-icon">email</span>
                    info@tgem.tj</li>
                <li class="aside__widget-list-item"><span class="material-icons aside__widget-icon">schedule</span>
                    Будние дни: 09.00 - 18.00 Воскресенье: Закрыто</li>
            </ul>
        </div>
    </aside>
    {{-- Aside end --}}

    {{-- Search Popup start --}}
    <div class="search-popup" id="search_popup">
        <div class="search-popup__overlay"></div>
        <button class="search-popup__hide-btn" id="hide_search_btn">
            <span class="material-icons-outlined search-popup__hide-btn-icon">close</span>
        </button>

        <form action="{{ route('search') }}" method="GET" class="search-popup__form">
            <input type="text" name="keyword" placeholder="Поиск..." class="search-popup__input" required minlength="3">
            <button type="submit" class="search-popup__form-btn">
                <span class="material-icons-outlined">search</span>
            </button>
        </form>
    </div>
    {{-- Search Popup end --}}


    {{-- Mobile Menu start --}}
    <div class="mobile-menu" id="mobile_menu">
        <div class="mobile-menu__overlay" data-action="hide-mobile-menu"></div>

        <nav class="mobile-menu__nav">
            <button class="mobile-menu__hide-btn" data-action="hide-mobile-menu">X</button>
            <img class="logo mobile-menu__logo" src="{{ asset('img/archive/logo.png') }}" alt="ТГЕМ лого">
            <ul class="mobile-menu__ul">
                @foreach($dropdowns as $dropdown)
                @if(!$dropdown->may_have_childs)
                <li class="mobile-menu__item">
                    <a class="mobile-dropdown__link" href="{{ $dropdown->url }}">{{ $dropdown[$locale . 'Title'] }}</a>
                </li>
                @else
                <div class="mobile-dropdown">
                    <button class="mobile-dropdown__toggler">{{ $dropdown[$locale . 'Title'] }}<span
                            class="material-icons-outlined mobile-dropdown__icon">expand_more</span></button>
                    <ul class="mobile-dropdown__list">
                        @foreach($dropdown->pages()->orderBy("priority", "asc")->get(); as $dp_pg)
                        <li class="mobile-dropdown__item">
                            <a class="mobile-dropdown__link"
                                href="{{route('home') . '/' . $dropdown->url . '/' . $dp_pg->url }}">{{ $dp_pg[$locale . 'Title']
                                }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @endforeach
            </ul>

        </nav>
    </div>
    {{-- Mobile Menu end --}}


</header>