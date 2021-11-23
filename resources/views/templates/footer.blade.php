{{-- Main pages Footer is different from other pages footer --}}
<footer class="footer" style="background-image: url({{ asset( $route == 'home' ? 'img/archive/footer.jpg' : 'img/archive/footer2.jpg') }})">
    <div class="main-container footer__inner @if($route == 'home') footer__inner--home @endif">
        {{-- Footer contacts start --}}
        <div class="footer__inner-item">
            <h4 class="main-title footer__inner-title">Контакты</h4>

            <a class="footer__link--iconed" href="/contacts/our_contacts">
                <span class="material-icons footer__link-icon">home</span> 734060 г. Душанбе, ул. Н. Хувайдуллоева 377/1
            </a>

            <a class="footer__link--iconed" href="mailto:info@tgem.tj">
                <span class="material-icons footer__link-icon">email</span> Почта : info@tgem.tj
            </a>

            <a class="footer__link--iconed" href="tel:+9922381111">
                <span class="material-icons footer__link-icon">phone</span> Телефон : (+992 37) 238 1111, 238 1313
            </a>
        </div>  {{-- Footer contacts end --}}

        {{-- Footer news start --}}
        <div class="footer__inner-item">
            <h4 class="main-title footer__inner-title">Новости</h4>
            
            <div class="footer__news">
                @foreach ($footer_news as $fn)
                    <a href="{{ route('news.single', $fn->url) }}" class="footer__news-item">
                        <img src="{{ asset('img/archive/small/' . $fn->image) }}" class="footer__news-image" alt="{{$fn->title}}">
                        <div class="footer__news-desc">
                            <h4 class="footer__news-title" title="{{$fn->title}}">{{$fn->title}}</h4>
                            @php
                                $formatted = Carbon\Carbon::create($fn->created_at)->locale("ru");
                            @endphp
                            <p class="footer__news-date">{{$formatted->isoFormat("MMMM DD, YYYY")}}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>  {{-- Footer news end --}}

        <div class="footer__inner-item">
            <h4 class="main-title footer__inner-title">Деятельность</h4>
            
            <a class="footer__link--iconed" href="/activity/construction">
                <span class="material-icons footer__link-icon">task_alt</span> Строительство
            </a>

            <a class="footer__link--iconed" href="/activity/energy">
                <span class="material-icons footer__link-icon">task_alt</span> Энергетика
            </a>
        </div>

        @if($route == "home")
            <div class="footer__inner-item">
                <h4 class="main-title footer__inner-title">Онлайн запись</h4>
                <p>Онлайн-приемная Генерального директора</p>

                <a href="/contacts/online_booking" class="button main-btn footer__button"><span class="main-btn__text footer__button-text">Записатсья</span></a>
            </div>
        @else
            <div class="footer__inner-item footer__inner-about">
                <a href="/" class="logo footer__logo">
                    <img class="logo__img" src="{{ asset('img/archive/logo-white.png') }}" alt="ТГЕМ лого">
                </a>

                <p class="footer__inner-about-text">ТГЭМ – ведущая таджикская компания по строительству гидроэнергетических и инфраструктурных объектов.</p>
            </div>
        @endif

    </div>

    <div class="footer__copyright">
        <div class="main-container">© {{date('Y')}} ОАО <b>«Точикгидроэлектромонтаж»</b>. Все права защищены.</div>
    </div>
</footer>