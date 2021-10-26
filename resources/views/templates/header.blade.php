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

        {{-- Home Secondary Navbar start --}}
        <nav class="main-container navbar secondary-navbar">
            <span class="material-icons aside-toogler secondary-navbar__aside-toogler">menu_open</span>
            {{-- Home econdary Navbar start end --}}
            <ul class="navbar__list secondary-navbar__list">

                @foreach($dropdowns as $dropdown)
                    @if($dropdown->no_childs)
                        <li class="navbar__item secondary-navbar__item">
                            <a class="navbar__link secondary-navbar__link" href="{{$dropdown->url}}">{{$dropdown->title}}</a>
                        </li>
                    @else
                        <li class="dropdown navbar__dropdown">
                            <a href="javascript::void(0)" class="dropdown__btn navbar__dropdown-btn secondary-navbar__dropdown-btn">{{$dropdown->title}}</a>
        
                            <ul class="dropdown__list navbar__dropdown-list">
                                @foreach($dropdown->pages()->orderBy("priority", "asc")->get(); as $dp_pg)
                                    <li class="dropdown__item navbar__dropdown-item">
                                        <a class="dropdown__link navbar__dropdown-link" href="{{route('home') . '/' . $dropdown->url . '/' . $dp_pg->url }}">{{$dp_pg->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif

                @endforeach
            </ul>   {{-- Home econdary Navbar List end --}}

            <div class="search-toogler">
                <span class="material-icons search-toogler__icon">search</span>
            </div>
        </nav>  {{-- Home Secondary Navbar end --}}

    
    @else {{-- if its NOT HOME PAGE --}}
        {{-- Main navbar start --}}
        <div class="navbar-container">
            <nav class="main-container navbar">

                <a href="/" class="logo">
                    <img class="logo__img" src="{{ asset('img/main/logo.png') }}" alt="ТГЕМ лого">
                </a>
            
                <ul class="navbar__list">
                    @foreach($dropdowns as $dropdown)
                        @if($dropdown->no_childs)
                            <li class="navbar__item">
                                <a class="navbar__link" href="{{$dropdown->url}}">{{$dropdown->title}}</a>
                            </li>
                        @else
                            <li class="dropdown navbar__dropdown">
                                <a href="javascript::void(0)" class="dropdown__btn navbar__dropdown-btn">{{$dropdown->title}}</a>
            
                                <ul class="dropdown__list navbar__dropdown-list">
                                    @foreach($dropdown->pages()->orderBy("priority", "asc")->get(); as $dp_pg)
                                        <li class="dropdown__item navbar__dropdown-item">
                                            <a class="dropdown__link navbar__dropdown-link" href="{{route('home') . '/' . $dropdown->url . '/' . $dp_pg->url }}">{{$dp_pg->title}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
                </ul>  {{-- Home navbar list end --}}
            
                <span class="material-icons aside-toogler">menu_open</span>

                <div class="search-toogler">
                    <span class="material-icons search-toogler__icon">search</span>
                </div>
            
            </nav> {{-- Main navbar end --}}
        </div>
    @endif


    {{-- Fixed navbar start. Fixed on scroll --}}
    <div class="navbar-container navbar-container--fixed @if($route == 'home') home-navbar-container--fixed @endif " id="fixed_navbar_container">
        <nav class="main-container navbar">

            <a href="/" class="logo">
                <img class="logo__img" src="{{ asset('img/main/logo.png') }}" alt="ТГЕМ лого">
            </a>
        
            <ul class="navbar__list">
                @foreach($dropdowns as $dropdown)
                    @if($dropdown->no_childs)
                        <li class="navbar__item">
                            <a class="navbar__link" href="{{$dropdown->url}}">{{$dropdown->title}}</a>
                        </li>
                    @else
                        <li class="dropdown navbar__dropdown">
                            <a href="javascript::void(0)" class="dropdown__btn navbar__dropdown-btn">{{$dropdown->title}}</a>
        
                            <ul class="dropdown__list navbar__dropdown-list">
                                @foreach($dropdown->pages()->orderBy("priority", "asc")->get(); as $dp_pg)
                                    <li class="dropdown__item navbar__dropdown-item">
                                        <a class="dropdown__link navbar__dropdown-link" href="{{route('home') . '/' . $dropdown->url . '/' . $dp_pg->url }}">{{$dp_pg->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>  {{-- Home navbar list end --}}
        
            <span class="material-icons aside-toogler">menu_open</span>

            <div class="search-toogler">
                <span class="material-icons search-toogler__icon">search</span>
            </div>
        
        </nav> {{-- Main navbar end --}}
    </div>  {{-- Fixed navbar end. Fixed on scroll --}}

</header>