<?php

namespace Database\Seeders;

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
            $gallery->url = $this->transliterateIntoLatin($title[$i]);
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


    private function transliterateIntoLatin($string)
    {
        $cyr = [
            'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п',
            'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',
            'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П',
            'Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я', ' ',
            'ӣ', 'ӯ', 'ҳ', 'қ', 'ҷ', 'ғ', 'Ғ', 'Ӣ', 'Ӯ', 'Ҳ', 'Қ', 'Ҷ',
            '/', '\\', '|', '!', '?', '«', '»', '“', '”'
        ];

        $lat = [
            'a','b','v','g','d','e','io','zh','z','i','y','k','l','m','n','o','p',
            'r','s','t','u','f','h','ts','ch','sh','shb','a','i','y','e','yu','ya',
            'a','b','v','g','d','e','io','zh','z','i','y','k','l','m','n','o','p',
            'r','s','t','u','f','h','ts','ch','sh','shb','a','i','y','e','yu','ya', '_',
            'i', 'u', 'h', 'q', 'j', 'g', 'g', 'i', 'u', 'h', 'q', 'j',
            '_', '_', '_', '_', '_', '_', '_', '_', '_'
        ];
        //Trasilate url
        $transilation = str_replace($cyr, $lat, $string);

        //return lowercased url
        return strtolower($transilation);
    }
}
