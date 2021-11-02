@extends('templates.master')
@section('content')

<main class="home">
    {{-- Main carousel start --}}
    <section class="owl-carousel-container">
        <div class="owl-carousel home__carousel" id="home__carousel">
            <div class="home__carousel-item" style="background-image: url({{ asset('img/home/carousel/slide1.jpg') }})">
                <div class="home__carousel-overlay">
                    <div class="main-container home__carousel-text">
                        <span class="home__carousel-crumb">Главная Конструкция</span>
                        <h1 class="home__carousel-title">Строим будущее вместе</h1>
                        <p class="home__carousel-desc">Ведущая таджикская компания по строительству гидроэнергетических и инфраструктурных объектов</p>
                        <div class="home__carousel-actions">
                            <a href="#" class="home__carousel-more"><span class="home__carousel-more-text">Подробнее</span></a>
                            <a href="#" class="home__carousel-play">
                                <div class="ripple-container">
                                    <span class="material-icons ripple home__carousel-play-icon">play_arrow</span> 
                                </div>
                                Посмотреть видео
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="home__carousel-item" style="background-image: url({{ asset('img/home/carousel/slide2.jpg') }})">
                <div class="home__carousel-overlay">
                    <div class="main-container home__carousel-text">
                        <span class="home__carousel-crumb">Главная Конструкция</span>
                        <h1 class="home__carousel-title">Кайракумская ГЭС</h1>
                        <p class="home__carousel-desc">Ведущая таджикская компания по строительству гидроэнергетических и инфраструктурных объектов</p>
                        <div class="home__carousel-actions">
                            <a href="#" class="home__carousel-more"><span class="home__carousel-more-text">Подробнее</span></a>
                            <a href="#" class="home__carousel-play">
                                <div class="ripple-container">
                                    <span class="material-icons ripple home__carousel-play-icon">play_arrow</span> 
                                </div>
                                Посмотреть видео
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  {{-- Main carousel end --}}

    {{-- About start --}}
    <section class="home__about-wrapper">
        <div class="main-container home__about">
            <div class="home__about-text" style="background-image: url({{ asset('img/home/about/pattern.png') }})">
                <h2 class="title--styled title--styled-left"><span class="seperator--left"></span>О компании</h2>
                <h1 class="main-title home__about-title">Строительство  <br>и гидроэнергетика</h1>
                <p class="home__about-desc">За более чем полувековую историю своего существования наша компания выполнила и продолжает выполнять строительные, электромонтажные и пусконаладочные работы на большиства крупных объектах Республики Таджикистан и за ее пределами.</p>
                <div class="home__about-more">
                    <a href="#" class="button main-btn"><span class="main-btn__text">Подробнее</span></a>
                    <img class="home__about-signature" src="{{ asset('img/home/about/signature.png') }}">
                </div>
            </div>

            <div class="home__about-img-container">
                <img class="home__about-img" src="{{ asset('img/home/about/main.jpg') }}">
                <div class="experience-box">
                    <div class="experience-box__inner">
                        <p class="experience-box__counter">50+</p>
                        <p class="experience-box__txt" class="">Лет <br> Стажа</p>
                    </div>
                </div>
            </div>
        </div>
    </section> {{-- About end --}}

    {{-- Services start --}}
    <section class="home__services-wrapper">
        <div class="main-container home__services">
            <h2 class="title--styled title--styled-left"><span class="seperator--left"></span>Наши услуги</h2>
            <h1 class="main-title home__services-title">Строительство,  <br>проективароние, монтаж</h1>

            <div class="owl-carousel-container services-carousel">
                <div class="owl-carousel services__carousel" id="services__carousel">
                    <div class="services-carousel__item">
                        <div class="services-carousel__item-inner">
                            <div class="services-carousel__pattern" style="background-image: url({{ asset('img/home/services/pattern.png') }})"></div>
                            <p class="services-carousel__title">
                                Строительство <br>гидротехнических <br>Сооружений
                            </p>
                            <img class="services-carousel__icon" src="{{ asset('img/home/services/excavator.png') }}">
                            <button class="button secondary-btn services-carousel__button">Подробнее</button>
                        </div>
                    </div>

                    <div class="services-carousel__item">
                        <div class="services-carousel__item-inner">
                            <div class="services-carousel__pattern" style="background-image: url({{ asset('img/home/services/pattern.png') }})"></div>
                            <p class="services-carousel__title">
                                Строительство <br>промышленных <br>Комплексов
                            </p>
                            <img class="services-carousel__icon" src="{{ asset('img/home/services/building.png') }}">
                            <button class="button secondary-btn services-carousel__button">Подробнее</button>
                        </div>
                    </div>

                    <div class="services-carousel__item">
                        <div class="services-carousel__item-inner">
                            <div class="services-carousel__pattern" style="background-image: url({{ asset('img/home/services/pattern.png') }})"></div>
                            <p class="services-carousel__title">
                                Монтаж <br>электрооборудования <br>до 500 кВ включительно
                            </p>
                            <img class="services-carousel__icon" src="{{ asset('img/home/services/welding.png') }}">
                            <button class="button secondary-btn services-carousel__button">Подробнее</button>
                        </div>
                    </div>
                </div>
            </div>

            <img class="home__services-aside-img" src="{{ asset('img/home/services/aside.png') }}">
        </div>
    </section>    {{-- Services end --}}

    {{-- Statistics start --}}
    <section class="statistics" style="background-image: url({{ asset('img/home/statistics/background.jpg') }})">
        <div class="main-container statistics__inner">
            <h2 class="title--styled title--styled-left title--styled-right"><span class="seperator--left seperator--light"></span>Статистика<span class="seperator--right seperator--light"></span></h2>
            <h1 class="main-title statistics__secondary-title">У Нас</h1>

            <div class="statistics__list">
                <div class="statistics__item">
                    <img class="statistics__item-icon" src="{{ asset('img/home/statistics/earth.png') }}">
                    <div class="statistics__item-content">
                        <p class="statistics__item-key">Выполненные проекты</p>
                        <p class="statistics__item-value">150</p>
                    </div>
                </div>

                <div class="statistics__item">
                    <img class="statistics__item-icon" src="{{ asset('img/home/statistics/managment.png') }}">
                    <div class="statistics__item-content">
                        <p class="statistics__item-key">Активные проекты</p>
                        <p class="statistics__item-value">15</p>
                    </div>
                </div>

                <div class="statistics__item">
                    <img class="statistics__item-icon" src="{{ asset('img/home/statistics/engineer.png') }}">
                    <div class="statistics__item-content">
                        <p class="statistics__item-key">Число сотрудников</p>
                        <p class="statistics__item-value">3500</p>
                    </div>
                </div>
            </div>
        </div>
    </section>    {{-- Statistics end --}}


    {{-- Projects start --}}
    <section class="home__projects">
        <div class="main-container home__projects-inner">
            <h2 class="title--styled title--styled-left title--styled-right home__projects-title"><span class="seperator--left"></span>Наши проекты<span class="seperator--right"></span></h2>

            <div class="horizontal-tab home__projects-tab" data-content="projects-tab-content">
                <button class="horizontal-tab__button horizontal-tab__button--active home__projects-tab-button" data-pane="pj-content0">Все проекты</button>
                @foreach ($project_groups as $group)
                    <button class="horizontal-tab__button home__projects-tab-button" data-pane="pj-content{{$group->id}}">{{$group->name}}</button>
                @endforeach
            </div>
        
            <div class="horizontal-tab__content home__projects-tab-content" id="projects-tab-content">
                <div class="horizontal-tab__pane horizontal-tab__pane--active home__projects-tab-pane" id="pj-content0">
                    <div class="projects-list">
                        @foreach ($projects as $project)
                            <a class="projects-list__item" href="{{ route('projects.single', $project->url) }}">
                                <div class="project-list__image-container">
                                    <img class="projects-list__image" src="{{ asset('img/projects/thumbs/' . $project->image) }}">
                                </div>
                                <div class="projects-list__desc" href="{{ route('projects.single', $project->url) }}">
                                    <p class="projects-list__group">{{$project->group->name}}</p>
                                    <h3 class="projects-list__title">{{$project->title}}</h3>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                @foreach ($project_groups as $group)
                    <div class="horizontal-tab__pane home__projects-tab-pane" id="pj-content{{$group->id}}">
                        <div class="projects-list">
                            @foreach ($group->projects as $project)
                                <a class="projects-list__item" href="{{ route('projects.single', $project->url) }}">
                                    <div class="project-list__image-container">
                                        <img class="projects-list__image" src="{{ asset('img/projects/thumbs/' . $project->image) }}">
                                    </div>
                                    <div class="projects-list__desc" href="{{ route('projects.single', $project->url) }}">
                                        <p class="projects-list__group">{{$project->group->name}}</p>
                                        <h3 class="projects-list__title">{{$project->title}}</h3>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="button main-btn home__projects-btn"><span class="main-btn__text">Посмотреть все проекты</span></button>
            <img class="home__projects-aside-img" src="{{ asset('img/home/projects/aside.png') }}">
        </div>
    </section>  {{-- Projects end --}}
    

    {{-- News start --}}
    <section class="home__news" style="background-image: url({{ asset('img/home/news/background.png') }})">
        {{-- News inner start --}}
        <div class="main-container home__news-inner"> 
            <h2 class="title--styled title--styled-left title--styled-right home__news-title"><span class="seperator--left"></span>Последние новости<span class="seperator--right"></span></h2>
            <h1 class="main-title home__news-desc">Следите За Нашими<br>Последними Новостями</h1>

            <div class="news-list">
                @foreach ($news as $new)
                    <a class="news-list__item" href="{{ route('news.single', $new->url) }}">
                        <div class="news-list__image-container">
                            <img class="news-list__image" src="{{ asset('img/news/thumbs/' . $new->image) }}">
                            <?php $formatted = Carbon\Carbon::create($new->created_at)->locale("ru"); ?>   
                            <div class="news-list__date">{{$formatted->isoFormat('DD')}}<span class="news-list__date-span">
                                {{$formatted->isoFormat("MMM")}}/{{$formatted->isoFormat("YY")}}
                            </div>
                        </div>

                        <div class="news-list__desc">
                            <h3 class="news-list__title">{{$new->title}}</h3>
                            <button class="button secondary-btn news-list__button">Полробнее</button>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>  {{-- News inners end --}}
    </section>    {{-- News end --}}

</main>

@endsection