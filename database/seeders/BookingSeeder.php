<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ["Икром Рахимов", "Сухроб Мирзоев", "Бобур Нуридинов"];
        $org = ["Evolet", "Vegapharm", "Belinda Ophtalmology"];
        $city = ["Куриган", "Бадахшон", "Душанбе"];
        $phone = ["999-99-99-99", "988-88-88-88", "977-77-77-77"];
        $email = ["igor_huligan@mail.ru", "suhrob_myasnik@gmail.com", "bobur_monstro@inbox.in"];
        $body = ["Тест №1 - проверка на ошибки", "Тест №2 - проверка от дизайнера", "Тест №3 - финальная проверка. Проверка от мастера"];

        for($i = 0; $i < count($name); $i++) {
            $booking = new Booking();
            $booking->name = $name[$i];
            $booking->organization = $org[$i];
            $booking->city = $city[$i];
            $booking->phone = $phone[$i];
            $booking->email = $email[$i];
            $booking->body = $body[$i];
            $booking->save();
        }
    }
}
