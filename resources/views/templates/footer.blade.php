{{-- Main pages Footer is different from other pages footer --}}
<footer class="footer" style="background-image: url('{{ asset( $route == 'home' ? 'img/archive/footer.jpg' : 'img/archive/footer2.jpg') }}')">
    <div class="main-container footer__inner @if($route == 'home') footer__inner--home @endif">
        {{-- Footer contacts start --}}
        <div class="footer__inner-item">
            <h4 class="main-title footer__inner-title">{{ __("Контакты") }}</h4>

            <a class="footer__link--iconed" href="/contacts/our_contacts">
                @php $formatted = App\Models\Option::where('tag', 'address-street')->first(); @endphp
                @php $formatted2 = App\Models\Option::where('tag', 'address-city')->first(); @endphp
                <span class="material-icons footer__link-icon">home</span> {{ $formatted[$localedValue] }}, {{ $formatted2[$localedValue] }}
            </a>

            <a class="footer__link--iconed" href="mailto:info@tgem.tj">
                <span class="material-icons footer__link-icon">email</span> {{ __("Почта") }} : info@tgem.tj
            </a>

            <a class="footer__link--iconed" href="tel:+9922381111">
                <span class="material-icons footer__link-icon">phone</span> {{ __("Телефон") }} : (+992 37) 238 1111, 238 1313
            </a>
        </div>  {{-- Footer contacts end --}}

        {{-- Footer news start --}}
        <div class="footer__inner-item">
            <h4 class="main-title footer__inner-title">{{ __("Новости") }}</h4>
            
            <div class="footer__news">
                @foreach ($footer_news as $fn)
                    <a href="{{ route('news.single', $fn->url) }}" class="footer__news-item">
                        <img src="{{ asset('img/archive/small/' . $fn->image) }}" class="footer__news-image" alt="{{$fn->title}}">
                        <div class="footer__news-desc">
                            <h4 class="footer__news-title" title="{{$fn[$locale . 'Title']}}">{{$fn[$locale . 'Title']}}</h4>
                            @php
                                $formatted = Carbon\Carbon::create($fn->created_at)->locale($locale == 'tj' ? 'ru' : $locale);
                            @endphp
                            <p class="footer__news-date">{{$formatted->isoFormat("MMMM DD, YYYY")}}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>  {{-- Footer news end --}}

        <div class="footer__inner-item">
            <h4 class="main-title footer__inner-title">{{ __("Деятельность") }}</h4>
            
            <a class="footer__link--iconed" href="/activity/construction">
                <span class="material-icons footer__link-icon">task_alt</span> {{ __("Строительство") }}
            </a>

            <a class="footer__link--iconed" href="/activity/energy">
                <span class="material-icons footer__link-icon">task_alt</span> {{ __("Энергетика") }}
            </a>
        </div>

        @if($route == "home")
            <div class="footer__inner-item">
                <h4 class="main-title footer__inner-title">{{ __("Онлайн запись") }}</h4>
                <p>{{ __("Онлайн-приемная Генерального директора") }}</p>

                <a href="/contacts/online_booking" class="button main-btn footer__button"><span class="main-btn__text footer__button-text">{{ __("Записатсья") }}</span></a>
            </div>
        @else
            <div class="footer__inner-item footer__inner-about">
                <a href="/" class="logo footer__logo">
                    <img class="logo__img" src="{{ asset('img/archive/logo-white.png') }}" alt="ТГЕМ лого">
                </a>

                @php $formatted = App\Models\Option::where('tag', 'about-company-short')->first(); @endphp
                <p class="footer__inner-about-text">{{ $formatted[$localedValue] }}</p>
            </div>
        @endif

    </div>

    <div class="footer__copyright">
        <div class="main-container">© {{date('Y')}} {{ __("ОАО") }}&nbsp;<b>«{{ __("Точикгидроэлектромонтаж") }}»</b>. {{ __("Все права защищены") }}.</div>
    </div>
</footer>