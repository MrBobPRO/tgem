@extends('templates.master')
@section('content')

<main class="online-booking-page">
    @include("templates.crumbs", ["main_title" => "Главная", "main_link" => route("home"), "page_title" => $page_title])

    <div class="main-container online-booking__inner">
        <form class="online-booking__form" action="#" style="background-image: url({{ asset('img/contacts/booking-pattern.png') }})">
            <div class="online-booking__cap">
                <img class="online-booking__cap-image" src="{{ asset('img/contacts/cap.png') }}">
            </div>

            <div class="online-booking__form-about">
                <h1 class="online-booking__form-title">Онлайн-приемная <br> генерального директора</h1>
                <p class="online-booking__form-text">На данной странице вы можете обратиться к генеральному директору ОАО «ТГЭМ» Сафарову Икболу Давлатовичу</p>
            </div>

            <div class="online-booking__form-body">
                <div class="online-booking__form-left">
                    <input class="input-text online-booking__input" type="text" name="name" placeholder="Ваше имя *" required>
                    <input class="input-text online-booking__input" type="text" name="organization" placeholder="Организация">
                    <input class="input-text online-booking__input" type="text" name="city" placeholder="Город">
                    <input  class="input-text online-booking__input" type="text" name="phone" placeholder="Телефон *" required>
                </div>
    
                <div class="online-booking__form-right">
                    <input class="input-text online-booking__input" type="email" name="email" placeholder="E-mail">
                    <textarea class="textarea" name="body" rows="6" placeholder="Текст сообщение *" required></textarea>
                    <button type="submit" class="button main-btn online-booking__button"><span class="main-btn__text">Отправить</span></a>
                </div>
            </div>

        </form>
    </div>

</main>

@endsection