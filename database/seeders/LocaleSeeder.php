<?php

namespace Database\Seeders;

use App\Models\Locale;
use Illuminate\Database\Seeder;

class LocaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $value = ['ru', 'en', 'tj'];
        $name = ['Русский', 'Английский', 'Таджикский'];
        $shortname = ['ru', 'en', 'tj'];
        $logo = ['logo-ru.png', 'logo-en.png', 'logo-tj.png'];
        $image = ['ru-flag.png', 'en-flag.png', 'tj-flag.png'];

        for($i=0; $i<count($name); $i++) {
            $locale = new Locale();
            $locale->value = $value[$i];
            $locale->name = $name[$i];
            $locale->shortname = $shortname[$i];
            $locale->logo = $logo[$i];
            $locale->image = $image[$i];
            $locale->save();
        }
    }
}