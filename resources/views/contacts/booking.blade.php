@extends('templates.master')

@section("title", $page_title)

@section('content')

<main class="online-booking-page">
    @include("templates.crumbs", ["main_title" => __("Главная"), "main_link" => route("home"), "page_title" => $page_title])

    <div class="main-container online-booking__inner">
        <form class="online-booking__form" method="POST" action="{{ route('booking.email') }}" style="background-image: url('{{ asset('img/archive/booking-pattern.png') }}')">
            @csrf
            <div class="online-booking__cap">
                <img class="online-booking__cap-image" src="{{ asset('img/archive/medium/cap.png') }}">
            </div>

            <div class="online-booking__form-about">
                <h1 class="online-booking__form-title">{{ __("Онлайн-приемная") }} <br> {{ __("генерального директора") }}</h1>
                @php $formatted = App\Models\Option::where('tag', 'online-booking-text')->first(); @endphp
                <p class="online-booking__form-text">{{ $formatted[$localedValue] }}</p>
            </div>

            <div class="online-booking__form-body">
                <div class="online-booking__form-left">
                    <input class="input-text online-booking__input" type="text" name="name" placeholder="{{ __("Ваше имя") }} *" required>
                    <input class="input-text online-booking__input" type="text" name="organization" placeholder="{{ __("Организация") }}">
                    <input class="input-text online-booking__input" type="text" name="city" placeholder="{{ __("Город") }}">
                    <input  class="input-text online-booking__input" type="text" name="phone" placeholder="{{ __("Телефон") }} *" required>
                </div>
    
                <div class="online-booking__form-right">
                    <input class="input-text online-booking__input" type="email" name="email" placeholder="E-mail">
                    <textarea class="textarea" name="body" rows="6" placeholder="{{ __("Текст сообщение") }} *" required></textarea>
                    <button type="submit" class="button main-btn online-booking__button"><span class="main-btn__text">{{ __("Отправить") }}</span></a>
                </div>
            </div>
            
        </form>
    </div>

</main>

@endsection