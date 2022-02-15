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
        $crumb = ["Главная Конструкция", "Главная Конструкция", "Главная"];
        $title = ["Строим будущее вместе", "Кайраккумская ГЭС", "Нурекская ГЭС"];
        $description = ["Ведущая таджикская компания по строительству гидроэнергетических и инфраструктурных объектов", "В настоящее время TГЭМ совместно с Cobra занимаются реабилитацией Кайраккумской ГЭС. В рамках проекта планируется заменить 6 турбин и генераторов, а также часть вспомогательных систем. Общая установленная мощность станции будет увеличена на 35% и составит 174 МВт.", "Безопасность плотин P2.1 – Исследования и мониторинг P4 – ОРУ"];
        $image = ["slide1.jpg", "slide2.jpg", "слайдера Нурекская ГЭС.jpg"];
        $link = ["#", "#", "#"];
        $video = ["https://www.youtube.com/", "https://www.youtube.com/", "https://www.youtube.com/"];
        $priority = [1,2,3];

        for ($i = 0; $i < count($title); $i++) {
            $slider = new Slider();
            $slider->ruCrumb = $crumb[$i];
            $slider->tjCrumb = $crumb[$i];
            $slider->enCrumb = $crumb[$i];
            $slider->ruTitle = $title[$i];
            $slider->tjTitle = $title[$i];
            $slider->enTitle = $title[$i];
            $slider->ruDescription = $description[$i];
            $slider->tjDescription = $description[$i];
            $slider->enDescription = $description[$i];
            $slider->image = $image[$i];
            $slider->link = $link[$i];
            $slider->video = $video[$i];
            $slider->priority = $priority[$i];
            $slider->save();
        }
    }
}
