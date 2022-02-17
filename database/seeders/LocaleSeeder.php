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
        $value = ['ru', 'tj', 'en'];
        $name = ['Русский', 'Тоҷикӣ', 'English'];
        $shortname = ['ru', 'tj', 'en'];
        $primary = [1, 0, 0];
        $logo = ['logo-ru.png', 'logo-tj.png', 'logo-en.png'];
        $image = ['flag-ru.png', 'flag-tj.png', 'flag-en.png'];

        for($i=0; $i<count($name); $i++) {
            $locale = new Locale();
            $locale->value = $value[$i];
            $locale->name = $name[$i];
            $locale->shortname = $shortname[$i];
            $locale->primary = $primary[$i];
            $locale->logo = $logo[$i];
            $locale->image = $image[$i];
            $locale->save();
        }
    }
}