<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = ["Подписание контракта по проекту Управления водными ресурсами в бассейне реки Пяндж", "JICA сдаст в эксплуатацию 2 подстанции в Душанбе", "Официальный запуск проекта “Энергоснабжение сельского джамоата Ромит”"];
        $thumbnail = ["1.jpg", "2.jpg", "3.jpg"];

        for($i = 0; $i < count($title); $i++) {
            $gallery = new Gallery();
            $gallery->title = $title[$i];
            $gallery->thumbnail = $thumbnail[$i];
            $gallery->save();
        }
    }
}
