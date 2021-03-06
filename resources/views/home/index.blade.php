@extends('templates.master')
@section('content')
<main class="home">
    {{-- Main carousel start --}}
    <section class="owl-carousel-container">
        <div class="owl-carousel home__carousel" id="home__carousel">
            @foreach($slides as $slide)
            <div class="home__carousel-item" style="background-image: url('{{ asset('img/archive/' . $slide->image) }}')">
                <div class="home__carousel-overlay">
                    <div class="main-container home__carousel-text">
                        <h1 class="home__carousel-title">{{ $slide[$locale . 'Title'] }}</h1>
                        <p class="home__carousel-desc">{{ $slide[$locale . 'Description'] }}</p>
                        <div class="home__carousel-actions">
                            @if($slide->link)
                                <a href="{{ $slide->link }}" class="home__carousel-more"><span class="home__carousel-more-text">{{ __("Подробнее") }}</span></a>
                            @endif

                            @if($slide->video)
                                <a href="{{ $slide->video }}" target="_blank" class="home__carousel-play">
                                    <div class="ripple-container">
                                        <span class="material-icons ripple home__carousel-play-icon">play_arrow</span> 
                                    </div>
                                    {{ __("Посмотреть видео") }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>  {{-- Main carousel end --}}

    {{-- About start --}}
    <section class="home__about-wrapper">
        <div class="main-container home__about">
            <div class="home__about-text" style="background-image: url('{{ asset('img/archive/home-pattern.png') }}')">
                <h2 class="title--styled title--styled-left"><span class="seperator--left"></span>{{ __("О компании") }}</h2>
                <h1 class="main-title home__about-title">{{ __("Строительство") }}  <br>{{ __("и") }} {{ __("гидроэнергетика") }}</h1>
                @php $formatted = App\Models\Option::where('tag', 'about-company')->first(); @endphp
                <p class="home__about-desc wrap-whitespace">{{$formatted[$localedValue]}}</p>
                <div class="home__about-more">
                    <a href="about/about_us" class="button main-btn"><span class="main-btn__text">{{ __("Подробнее") }}</span></a>
                </div>
            </div>

            <div class="home__about-img-container">
                <img class="home__about-img" src="{{ asset('img/archive/home-about.jpg') }}" alt="Строительство гидроэнергетика">
                <div class="experience-box">
                    <div class="experience-box__inner">
                        <p class="experience-box__counter count-box"><span class="count-text"  data-speed="3500" data-stop="60"></span>+</p>
                        <p class="experience-box__txt" class="">{{ __("лет") }} <br> {{ __("опыта") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section> {{-- About end --}}

    {{-- Services start --}}
    <section class="home__services-wrapper">
        <div class="main-container home__services">
            <h2 class="title--styled title--styled-left"><span class="seperator--left"></span>{{ __("Наши услуги") }}</h2>
            <h1 class="main-title home__services-title">{{ __("Строительство") }},  <br>{{ __("проектирование") }}, {{ __("монтаж") }}</h1>

            <div class="owl-carousel-container services-carousel">
                <div class="owl-carousel services__carousel" id="services__carousel">
                    <div class="services-carousel__item">
                        <div class="services-carousel__item-inner">
                            <div class="services-carousel__pattern" style="background-image: url('{{ asset('img/archive/services-pattern.png') }}')"></div>
                            <p class="services-carousel__title">
                                {{ __("Строительство гидротехнических Сооружений") }}
                            </p>
                            <img class="services-carousel__icon" src="{{ asset('img/archive/excavator.png') }}" alt="excavator">
                            <a href="#" class="button secondary-btn services-carousel__button">{{ __("Подробнее") }}</a>
                        </div>
                    </div>

                    <div class="services-carousel__item">
                        <div class="services-carousel__item-inner">
                            <div class="services-carousel__pattern" style="background-image: url('{{ asset('img/archive/services-pattern.png') }}')"></div>
                            <p class="services-carousel__title">
                                {{ __("Строительство промышленных Комплексов") }}
                            </p>
                            <img class="services-carousel__icon" src="{{ asset('img/archive/building.png') }}" alt="building">
                            <a href="#" class="button secondary-btn services-carousel__button">{{ __("Подробнее") }}</a>
                        </div>
                    </div>

                    <div class="services-carousel__item">
                        <div class="services-carousel__item-inner">
                            <div class="services-carousel__pattern" style="background-image: url('{{ asset('img/archive/services-pattern.png') }}')"></div>
                            <p class="services-carousel__title">
                                {{ __("Монтаж электрооборудования до 500 кВ включительно") }}
                            </p>
                            <img class="services-carousel__icon" src="{{ asset('img/archive/welding.png') }}" alt="welding">
                            <a href="#" class="button secondary-btn services-carousel__button">{{ __("Подробнее") }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <img class="home__services-aside-img" src="{{ asset('img/archive/services-aside.png') }}" alt="builder">
        </div>
    </section>    {{-- Services end --}}

    {{-- Statistics start --}}
    <section class="statistics" style="background-image: url('{{ asset('img/archive/statistics-bg.jpg') }}')">
        <div class="main-container statistics__inner">
            <h2 class="title--styled title--styled-left title--styled-right"><span class="seperator--left seperator--light"></span>{{ __("Статистика") }}<span class="seperator--right seperator--light"></span></h2>
            <h1 class="main-title statistics__secondary-title">{{ __("У Нас") }}</h1>

            <div class="statistics__list">
                <div class="statistics__item wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <img class="statistics__item-icon" src="{{ asset('img/archive/earth.png') }}" alt="earth">
                    <div class="statistics__item-content">
                        <p class="statistics__item-key">{{ __("Выполненные проекты") }}</p>
                        <p class="statistics__item-value count-box"><span class="count-text" data-speed="3500" data-stop="150"></span>+</p>
                    </div>
                </div>

                <div class="statistics__item wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <img class="statistics__item-icon" src="{{ asset('img/archive/managment.png') }}" alt="managment">
                    <div class="statistics__item-content">
                        <p class="statistics__item-key">{{ __("Активные проекты") }}</p>
                        <p class="statistics__item-value count-box"><span class="count-text"  data-speed="3500" data-stop="23"></span></p>
                    </div>
                </div>

                <div class="statistics__item wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <img class="statistics__item-icon" src="{{ asset('img/archive/engineer.png') }}" alt="engineer">
                    <div class="statistics__item-content">
                        <p class="statistics__item-key">{{ __("Число сотрудников") }}</p>
                        <p class="statistics__item-value count-box"><span class="count-text"  data-speed="3500" data-stop="5000"></span>+</p>
                    </div>
                </div>
            </div>
        </div>
    </section>    {{-- Statistics end --}}


    {{-- Projects start --}}
    <section class="home__projects">
        <div class="main-container home__projects-inner">
            <h2 class="title--styled title--styled-left title--styled-right home__projects-title"><span class="seperator--left"></span>{{ __("Наши проекты") }}<span class="seperator--right"></span></h2>

            <div class="horizontal-tab home__projects-tab" data-content="projects-tab-content">
                <button class="horizontal-tab__button horizontal-tab__button--active home__projects-tab-button" data-pane="pj-content0">{{ __("Все проекты") }}</button>
                @foreach ($project_groups as $group)
                    <button class="horizontal-tab__button home__projects-tab-button" data-pane="pj-content{{$group->id}}">{{$group[$locale . 'Title']}}</button>
                @endforeach
            </div>
        
            <div class="horizontal-tab__content home__projects-tab-content" id="projects-tab-content">
                <div class="horizontal-tab__pane horizontal-tab__pane--active home__projects-tab-pane" id="pj-content0">
                    <div class="projects-list">
                        @foreach ($projects as $project)
                            <a class="projects-list__item" href="{{ route('projects.single', $project->url) }}">
                                <div class="project-list__image-container">
                                    <img class="projects-list__image" src="{{ asset('img/archive/medium/' . $project->image) }}" alt="{{$project[$locale . 'Title']}}">
                                </div>
                                <div class="projects-list__desc" href="{{ route('projects.single', $project->url) }}">
                                    <p class="projects-list__group">{{$project->group[$locale . 'Title']}}</p>
                                    <h3 class="projects-list__title">{{$project[$locale . 'Title']}}</h3>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                @foreach ($project_groups as $group)
                    <div class="horizontal-tab__pane home__projects-tab-pane" id="pj-content{{$group->id}}">
                        <div class="projects-list">
                            @foreach ($group->projects->take(6) as $project)
                                <a class="projects-list__item" href="{{ route('projects.single', $project->url) }}">
                                    <div class="project-list__image-container">
                                        <img class="projects-list__image" src="{{ asset('img/archive/medium/' . $project->image) }}" alt="{{$project[$locale . 'Title']}}">
                                    </div>
                                    <div class="projects-list__desc" href="{{ route('projects.single', $project->url) }}">
                                        <p class="projects-list__group">{{$project->group[$locale . 'Title']}}</p>
                                        <h3 class="projects-list__title">{{$project[$locale . 'Title']}}</h3>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <a href="{{ route('projects.completed') }}" class="button main-btn home__projects-btn"><span class="main-btn__text">{{ __("Посмотреть все проекты") }}</span></a>
            <img class="home__projects-aside-img" src="{{ asset('img/archive/projects-aside.png') }}" alt="architect">
        </div>
    </section>  {{-- Projects end --}}
    

    {{-- News start --}}
    <section class="home__news" style="background-image: url('{{ asset('img/archive/news-bg.png') }}')">
        {{-- News inner start --}}
        <div class="main-container home__news-inner"> 
            <h2 class="title--styled title--styled-left title--styled-right home__news-title"><span class="seperator--left"></span>{{ __("Последние новости") }}<span class="seperator--right"></span></h2>
            <h1 class="main-title home__news-desc">{{ __("Следите За Нашими") }}<br>{{ __("Последними Новостями") }}</h1>

            <div class="news-list">
                @foreach ($news as $new)
                    <a class="news-list__item wow
                        @if($loop->index == 0)
                            fadeInLeft
                        @elseif($loop->index == 1)
                            fadeInUp 
                        @else
                            fadeInRight 
                        @endif
                    " data-wow-delay="0ms" data-wow-duration="1500ms" href="{{ route('news.single', $new->url) }}">
                        <div class="news-list__image-container">
                            <img class="news-list__image" src="{{ asset('img/archive/medium/' . $new->image) }}" alt="{{$new[$locale . 'Title']}}">
                            @php 
                                $formatted = Carbon\Carbon::create($new->created_at)->locale($locale == 'tj' ? 'ru' : $locale);
                            @endphp
                            <div class="news-list__date">{{$formatted->isoFormat('DD')}}<span class="news-list__date-span">
                                {{$formatted->isoFormat("MMM")}}/{{$formatted->isoFormat("YY")}}
                            </div>
                        </div>

                        <div class="news-list__desc">
                            <h3 class="news-list__title">{{$new[$locale . 'Title']}}</h3>
                            <button class="button secondary-btn news-list__button">{{ __("Подробнее") }}</button>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>  {{-- News inners end --}}
    </section>    {{-- News end --}}

</main>

@endsection