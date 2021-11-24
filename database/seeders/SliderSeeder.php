<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $crumb = ["Главная Конструкция", "Главная Конструкция"];
        $title = ["Строим будущее вместе", "Кайракумская ГЭС"];
        $description = ["Ведущая таджикская компания по строительству гидроэнергетических и инфраструктурных объектов", "Ведущая таджикская компания по строительству гидроэнергетических и инфраструктурных объектов"];
        $image = ["slide1.jpg", "slide2.jpg"];
        $link = ["#", "#"];
        $video = ["https://www.youtube.com/", "https://www.youtube.com/"];
        $priority = [1,2];

        for ($i = 0; $i < count($title); $i++) {
            $slider = new Slider();
            $slider->crumb = $crumb[$i];
            $slider->title = $title[$i];
            $slider->description = $description[$i];
            $slider->image = $image[$i];
            $slider->link = $link[$i];
            $slider->video = $video[$i];
            $slider->priority = $priority[$i];
            $slider->save();
        }
    }
}
