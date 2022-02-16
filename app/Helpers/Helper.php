<?php

namespace App\Helpers;

use App\Models\Locale;
use Image;

class Helper {

    public static function getDefaultLocale()
    {
        $locale = Locale::where('primary', true)->first();

        return $locale->value;
    }

    public static function getSecondaryLocales()
    {
        $locales = Locale::where('primary', false)->pluck('value')->toArray();

        return $locales;
    }

    /**
     * remove tags, slice body, replace many spaces by one, remove first whitespace
     * and return clean text
     * used while sharing in socials/messangers
     * 
     * @param string $string
     * @return string
     */
    public static function cleanShareText($string)
    {
        $cleaned = preg_replace('#<[^>]+>#', ' ', $string);
        $cleaned = str_replace('&nbsp;', ' ', $cleaned);
        $cleaned = mb_strlen($cleaned) < 170 ? $cleaned : mb_substr($cleaned, 0, 166) . '...';
        $cleaned = preg_replace('!\s+!', ' ', $cleaned);
        $cleaned = trim($cleaned);

        return $cleaned;
    }

    public static function transliterate_into_latin($string)
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

    public static function delete_if_exists($path)
    {
        if(file_exists($path)) {
            unlink($path);
        }
    }

    public static function rename_file_if_exists($path, $file) 
    {
        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = '.' . $file->getClientOriginalExtension();
        $full_name = $name . $extension;

        while(file_exists(public_path($path) . $full_name)) {
            $name = $name . '(1)'; 
            $full_name = $name . $extension;
        }

        return $full_name;
    }

    public static function store_image_into_archive($image, $filename)
    {
        $archive_path = public_path("img/archive");
        $image->move($archive_path, $filename);

        //create image instence from original
        $original = Image::make($archive_path . "/" . $filename);
        // make image thumbs (medium width : 500px)
        if($original->width() > 500) {
            $original->resize(500, null, function($constraint) {
                $constraint->aspectRatio();
            });
        }
        $original->save($archive_path . "/medium/" . $filename);

        // make image thumbs (small width : 200px)
        if($original->width() > 200) {
            $original->resize(200, null, function($constraint) {
                $constraint->aspectRatio();
            });
        }
        $original->save($archive_path . "/small/" . $filename);

        return true;
    }


    /**
     * Filling fields for the Default locale are required! 
     * Unfilled fields of Secondary locales will automatically be filled with data from the Default locale!
     * 
     * @param \Http\Request $request
     * @param \Eloquent\Model $item
     * @param array $fields
     * @return void
     */
    public static function fillMultiLanguageFields($request, $item, $fields)
    {
        $defaultLocale = Helper::getDefaultLocale();
        $secondaryLocales = Helper::getSecondaryLocales();

        foreach ($fields as $field) {
            $item[$defaultLocale . $field] = $request[$defaultLocale . $field];

            foreach ($secondaryLocales as $secLoc) {
                $item[$secLoc . $field] = $request[$secLoc . $field] ? $request[$secLoc . $field] : $request[$defaultLocale . $field];
            }
        }

        return;
    }

}

?>