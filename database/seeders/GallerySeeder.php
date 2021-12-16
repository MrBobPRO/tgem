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

        $gallery = new Gallery();
        $gallery->title = "Открытие подстанции 110/20/10 кВ и ЛЭП 04 кВ в селе Ромит города Вахдат";
        $gallery->thumbnail = "ПС 110-20-10 Ромит.jpg";
        $gallery->url = Helper::transliterate_into_latin("Открытие подстанции 110/20/10 кВ и ЛЭП 04 кВ в селе Ромит города Вахдат");
        $gallery->save();
        
        $image = new Image();
        $image->filename = "ПС 110-20-10 Ромит.jpg";
        $image->gallery_id = 1;
        $image->save();
        for ($i = 2; $i < 14; $i++) {
            $image = new Image();
            $image->filename = "ПС 110-20-10 Ромит " . $i . ".jpg";
            $image->gallery_id = 1;
            $image->save();
        }


        $gallery = new Gallery();
        $gallery->title = "Сдача в эксплуатацию электрической подстанции «Равшан» 220/110/35/10 кВ в городе Турсунзода";
        $gallery->thumbnail = "Сдача в эксплуатацию Равшан 220-110-35-10.jpg";
        $gallery->url = Helper::transliterate_into_latin("Сдача в эксплуатацию электрической подстанции «Равшан» 220/110/35/10 кВ в городе Турсунзода");
        $gallery->save();
        
        $image = new Image();
        $image->filename = "Сдача в эксплуатацию Равшан 220-110-35-10.jpg";
        $image->gallery_id = 2;
        $image->save();
        for ($i = 2; $i < 6; $i++) {
            $image = new Image();
            $image->filename = "Сдача в эксплуатацию Равшан 220-110-35-10 " . $i . ".jpg";
            $image->gallery_id = 2;
            $image->save();
        }


        $gallery = new Gallery();
        $gallery->title = "Подписание контракта по проекту Управления водными ресурсами в бассейне реки Пяндж";
        $gallery->thumbnail = "Подписание контракта реки Пяндж.jpg";
        $gallery->url = Helper::transliterate_into_latin("Подписание контракта по проекту Управления водными ресурсами в бассейне реки Пяндж");
        $gallery->save();
        
        $image = new Image();
        $image->filename = "Подписание контракта реки Пяндж.jpg";
        $image->gallery_id = 3;
        $image->save();
        for ($i = 2; $i < 5; $i++) {
            $image = new Image();
            $image->filename = "Подписание контракта реки Пяндж " . $i . ".jpg";
            $image->gallery_id = 3;
            $image->save();
        }


        $gallery = new Gallery();
        $gallery->title = "ОАО «ТГЭМ» повторно оказала гуманитарную помощь управлению здравоохранения города Душанбе";
        $gallery->thumbnail = "Гуманитарная помощь здравоохранению Душанбе.jpg";
        $gallery->url = Helper::transliterate_into_latin("ОАО «ТГЭМ» повторно оказала гуманитарную помощь управлению здравоохранения города Душанбе");
        $gallery->save();
        
        $image = new Image();
        $image->filename = "Гуманитарная помощь здравоохранению Душанбе.jpg";
        $image->gallery_id = 4;
        $image->save();
        for ($i = 2; $i < 7; $i++) {
            $image = new Image();
            $image->filename = "Гуманитарная помощь здравоохранению Душанбе " . $i . ".jpg";
            $image->gallery_id = 4;
            $image->save();
        }


        $gallery = new Gallery();
        $gallery->title = "Управлению здравоохранения Душанбе предоставлено 20 тыс. тестов для определения коронавируса";
        $gallery->thumbnail = "20 тыс. тестов для определения коронавируса.jpg";
        $gallery->url = Helper::transliterate_into_latin("Управлению здравоохранения Душанбе предоставлено 20 тыс. тестов для определения коронавируса");
        $gallery->save();
        
        $image = new Image();
        $image->filename = "20 тыс. тестов для определения коронавируса.jpg";
        $image->gallery_id = 5;
        $image->save();
        for ($i = 2; $i < 7; $i++) {
            $image = new Image();
            $image->filename = "20 тыс. тестов для определения коронавируса " . $i . ".jpg";
            $image->gallery_id = 5;
            $image->save();
        }


        $gallery = new Gallery();
        $gallery->title = "Подписания контракта по проекту “Реконструкция Нурекской ГЭС”";
        $gallery->thumbnail = "Водные ресурсы Пяндж.jpg";
        $gallery->url = Helper::transliterate_into_latin("Подписания контракта по проекту “Реконструкция Нурекской ГЭС”");
        $gallery->save();
        
        $image = new Image();
        $image->filename = "Водные ресурсы Пяндж.jpg";
        $image->gallery_id = 6;
        $image->save();
        for ($i = 2; $i < 6; $i++) {
            $image = new Image();
            $image->filename = "Водные ресурсы Пяндж " . $i . ".jpg";
            $image->gallery_id = 6;
            $image->save();
        }


        $gallery = new Gallery();
        $gallery->title = "JICA сдаст в эксплуатацию 2 подстанции в Душанбе";
        $gallery->thumbnail = "JICA эксплуатация подстанции.jpg";
        $gallery->url = Helper::transliterate_into_latin("JICA сдаст в эксплуатацию 2 подстанции в Душанбе");
        $gallery->save();
        
        // Add gallery images 
        $image = new Image();
        $image->filename = "JICA эксплуатация подстанции.jpg";
        $image->gallery_id = 7;
        $image->save();
        for ($i = 2; $i < 10; $i++) {
            $image = new Image();
            $image->filename = "JICA эксплуатация подстанции " . $i . ".jpg";
            $image->gallery_id = 7;
            $image->save();
        }


        $gallery = new Gallery();
        $gallery->title = "Церемония ввода в действие второго агрегата Рогунской гидроэлектростанции";
        $gallery->thumbnail = "Церемония ввода в действие второго агрегата Рогунской гидроэлектростанции.jpg";
        $gallery->url = Helper::transliterate_into_latin("Церемония ввода в действие второго агрегата Рогунской гидроэлектростанции");
        $gallery->save();
        
        // Add gallery images 
        $image = new Image();
        $image->filename = "Церемония ввода в действие второго агрегата Рогунской гидроэлектростанции.jpg";
        $image->gallery_id = 8;
        $image->save();
        for ($i = 2; $i < 6; $i++) {
            $image = new Image();
            $image->filename = "Церемония ввода в действие второго агрегата Рогунской гидроэлектростанции " . $i . ".jpg";
            $image->gallery_id = 8;
            $image->save();
        }


        $gallery = new Gallery();
        $gallery->title = "Открытие ПС “Темурмалик”";
        $gallery->thumbnail = "Открытие ПС Темурмалик.jpg";
        $gallery->url = Helper::transliterate_into_latin("Открытие ПС “Темурмалик”");
        $gallery->save();
        
        // Add gallery images 
        $image = new Image();
        $image->filename = "Открытие ПС Темурмалик.jpg";
        $image->gallery_id = 9;
        $image->save();
        for ($i = 2; $i < 18; $i++) {
            $image = new Image();
            $image->filename = "Открытие ПС Темурмалик " . $i . ".jpg";
            $image->gallery_id = 9;
            $image->save();
        }



        $gallery = new Gallery();
        $gallery->title = "Турнир по мини-футболу «КОИНОТИ НАВ 2018»";
        $gallery->thumbnail = "Турнир по мини-футболу КОИНОТИ НАВ 2018.jpg";
        $gallery->url = Helper::transliterate_into_latin("Турнир по мини-футболу «КОИНОТИ НАВ 2018»");
        $gallery->save();
        
        $image = new Image();
        $image->filename = "Турнир по мини-футболу КОИНОТИ НАВ 2018.jpg";
        $image->gallery_id = 10;
        $image->save();
        for ($i = 2; $i < 18; $i++) {
            $image = new Image();
            $image->filename = "Турнир по мини-футболу КОИНОТИ НАВ 2018 " . $i . ".jpg";
            $image->gallery_id = 10;
            $image->save();
        }



        $gallery = new Gallery();
        $gallery->title = "Техника";
        $gallery->thumbnail = "Техника.jpg";
        $gallery->url = Helper::transliterate_into_latin("Техника");
        $gallery->save();
        
        $image = new Image();
        $image->filename = "Техника.jpg";
        $image->gallery_id = 11;
        $image->save();
        for ($i = 2; $i < 27; $i++) {
            $image = new Image();
            $image->filename = "Техника " . $i . ".jpg";
            $image->gallery_id = 11;
            $image->save();
        }


        $gallery = new Gallery();
        $gallery->title = "Тренинг в ТТУ";
        $gallery->thumbnail = "Тренинги для выпускников ТТУ.jpg";
        $gallery->url = Helper::transliterate_into_latin("Тренинг в ТТУ");
        $gallery->save();
        
        $image = new Image();
        $image->filename = "Тренинги для выпускников ТТУ.jpg";
        $image->gallery_id = 12;
        $image->save();
        for ($i = 2; $i < 13; $i++) {
            $image = new Image();
            $image->filename = "Тренинги для выпускников ТТУ " . $i . ".jpg";
            $image->gallery_id = 12;
            $image->save();
        }


        $gallery = new Gallery();
        $gallery->title = "Официальный запуск проекта “Энергоснабжение сельского джамоата Ромит”";
        $gallery->thumbnail = "Энергоснабжение сельского джамоата Ромит.jpg";
        $gallery->url = Helper::transliterate_into_latin("Официальный запуск проекта “Энергоснабжение сельского джамоата Ромит”");
        $gallery->save();
        
        $image = new Image();
        $image->filename = "Энергоснабжение сельского джамоата Ромит.jpg";
        $image->gallery_id = 13;
        $image->save();
        for ($i = 2; $i < 16; $i++) {
            $image = new Image();
            $image->filename = "Энергоснабжение сельского джамоата Ромит " . $i . ".jpg";
            $image->gallery_id = 13;
            $image->save();
        }


        $gallery = new Gallery();
        $gallery->title = "Открытие ПС 110/10 «Вахдат»";
        $gallery->thumbnail = "ПС 110-10 Вахдат.jpg";
        $gallery->url = Helper::transliterate_into_latin("Открытие ПС 110/10 «Вахдат»");
        $gallery->save();
        
        $image = new Image();
        $image->filename = "ПС 110-10 Вахдат.jpg";
        $image->gallery_id = 14;
        $image->save();
        for ($i = 2; $i < 9; $i++) {
            $image = new Image();
            $image->filename = "ПС 110-10 Вахдат " . $i . ".jpg";
            $image->gallery_id = 14;
            $image->save();
        }


        // $title = ["Подписание контракта по проекту Управления водными ресурсами в бассейне реки Пяндж", "JICA сдаст в эксплуатацию 2 подстанции в Душанбе", "Официальный запуск проекта “Энергоснабжение сельского джамоата Ромит”"];
        // $thumbnail = ["Водные ресурсы Пяндж.jpg", "JICA эксплуатация подстанции.jpg", "Энергоснабжение сельского джамоата Ромит.jpg"];

        // for($i = 0; $i < count($title); $i++) {
        //     $gallery = new Gallery();
        //     $gallery->title = $title[$i];
        //     $gallery->thumbnail = $thumbnail[$i];
        //     $gallery->url = Helper::transliterate_into_latin($title[$i]);
        //     $gallery->save();
        // }

        // Images
        // $filename = ["Водные ресурсы Пяндж.jpg", "Водные ресурсы Пяндж 2.jpg", "Водные ресурсы Пяндж 3.jpg", "Водные ресурсы Пяндж 4.jpg", "JICA эксплуатация подстанции.jpg", "JICA эксплуатация подстанции 2.jpg", "JICA эксплуатация подстанции 3.jpg", "JICA эксплуатация подстанции 4.jpg", "Энергоснабжение сельского джамоата Ромит.jpg", "Энергоснабжение сельского джамоата Ромит 2.jpg", "Энергоснабжение сельского джамоата Ромит 3.jpg", "Энергоснабжение сельского джамоата Ромит 4.jpg"];
        // $gallery_id = [1,1,1,1,2,2,2,2,3,3,3,3];
        // for($i = 0; $i < count($filename); $i++) {
        //     $image = new Image();
        //     $image->filename = $filename[$i];
        //     $image->gallery_id = $gallery_id[$i];
        //     $image->save();
        // }


        //Seriticate page images
        $filename = ["ЛИЦЕНЗИЯ М.Н.Р.Э.О.jpg", "СЕРТИФИКАТ ISO 9001-2015.jpg", "СЕРТИФИКАТ ISO 14001-2015.jpg", "СЕРТИФИКАТ ISO 18001-2015.jpg"];
        $title = ["ЛИЦЕНЗИЯ М.Н.Р.Э.О.", "СЕРТИФИКАТ ISO 9001:2015", "СЕРТИФИКАТ ISO 14001:2015", "СЕРТИФИКАТ OHSAS 18001:2015"];
        for($i = 0; $i < count($filename); $i++) {
            $image = new Image();
            $image->filename = $filename[$i];
            $image->title = $title[$i];
            $image->page_id = 5;
            $image->save();
        }
    }
}
