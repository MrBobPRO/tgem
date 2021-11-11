<?php

namespace Database\Seeders;

use App\Helpers\Helper;
use App\Models\Gallery;
use App\Models\Image;
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
            $gallery->url = Helper::transliterate_into_latin($title[$i]);
            $gallery->save();
        }

        // Images
        $filename = ["1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg", "6.jpg", "7.jpg", "8.jpg", "9.jpg", "10.jpg", "11.jpg", "12.jpg"];
        $gallery_id = [1,1,1,1,2,2,2,2,3,3,3,3];
        for($i = 0; $i < count($filename); $i++) {
            $image = new Image();
            $image->filename = $filename[$i];
            $image->gallery_id = $gallery_id[$i];
            $image->save();
        }


        //Seriticate page images
        $filename = ["13.jpg", "14.jpg", "15.jpg", "16.jpg"];
        $title = ["ЛИЦЕНЗИЯ М.Н.Р.Э.О.", "СЕРТИФИКАТ ISO 9001:2015", "СЕРТИФИКАТ ISO 14001:2015", "СЕРТИФИКАТ ISO 18001:2015"];
        for($i = 0; $i < count($filename); $i++) {
            $image = new Image();
            $image->filename = $filename[$i];
            $image->title = $title[$i];
            $image->page_id = 5;
            $image->save();
        }
    }
}
