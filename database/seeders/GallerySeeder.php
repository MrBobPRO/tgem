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
        $thumbnail = ["Водные ресурсы Пяндж.jpg", "JICA эксплуатация подстанции.jpg", "Энергоснабжение сельского джамоата Ромит.jpg"];

        for($i = 0; $i < count($title); $i++) {
            $gallery = new Gallery();
            $gallery->title = $title[$i];
            $gallery->thumbnail = $thumbnail[$i];
            $gallery->url = Helper::transliterate_into_latin($title[$i]);
            $gallery->save();
        }

        // Images
        $filename = ["Водные ресурсы Пяндж.jpg", "Водные ресурсы Пяндж 2.jpg", "Водные ресурсы Пяндж 3.jpg", "Водные ресурсы Пяндж 4.jpg", "JICA эксплуатация подстанции.jpg", "JICA эксплуатация подстанции 2.jpg", "JICA эксплуатация подстанции 3.jpg", "JICA эксплуатация подстанции 4.jpg", "Энергоснабжение сельского джамоата Ромит.jpg", "Энергоснабжение сельского джамоата Ромит 2.jpg", "Энергоснабжение сельского джамоата Ромит 3.jpg", "Энергоснабжение сельского джамоата Ромит 4.jpg"];
        $gallery_id = [1,1,1,1,2,2,2,2,3,3,3,3];
        for($i = 0; $i < count($filename); $i++) {
            $image = new Image();
            $image->filename = $filename[$i];
            $image->gallery_id = $gallery_id[$i];
            $image->save();
        }


        //Seriticate page images
        $filename = ["ЛИЦЕНЗИЯ М.Н.Р.Э.О.jpg", "СЕРТИФИКАТ ISO 9001-2015.jpg", "СЕРТИФИКАТ ISO 14001-2015.jpg", "СЕРТИФИКАТ ISO 18001-2015.jpg"];
        $title = ["ЛИЦЕНЗИЯ М.Н.Р.Э.О.", "СЕРТИФИКАТ ISO 9001:2015", "СЕРТИФИКАТ ISO 14001:2015", "СЕРТИФИКАТ ISO 18001 2015"];
        for($i = 0; $i < count($filename); $i++) {
            $image = new Image();
            $image->filename = $filename[$i];
            $image->title = $title[$i];
            $image->page_id = 5;
            $image->save();
        }
    }
}
