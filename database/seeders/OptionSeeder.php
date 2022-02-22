<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $option = new Option();
        $option->key = 'О компании';
        $option->ruValue = 'ТГЭМ – ведущая компания по строительству гидроэнергетических и инфраструктурных объектов. 

За более чем полувековую историю своего существования наша компания выполнила и продолжает выполнять строительные, электромонтажные и пусконаладочные работы на большинстве крупных объектах Республики Таджикистан и за ее пределами.';
        $option->enValue = 'TGEM is a leading company in the construction of hydropower and infrastructure facilities. 

For more than half a century of its existence, our company has performed and continues to perform construction, electrical installation and commissioning work at most large facilities in the Republic of Tajikistan and beyond.';
        $option->tjValue = $option->ruValue;
        $option->tag = 'about-company';
        $option->save();


        $option = new Option();
        $option->key = 'Адресс - полный';
        $option->ruValue = '734060, Республика Таджикистан, г.Душанбе, ул. Н. Хувайдуллаева 377/1';
        $option->enValue = '734060, Tajikistan, Dushanbe, Khuvaydulloeva 377 st.';
        $option->tjValue = $option->ruValue;
        $option->tag = 'address-full';
        $option->save();


        $option = new Option();
        $option->key = 'Адресс - улица';
        $option->ruValue = 'ул. Н. Хувайдуллоева 377/1';
        $option->enValue = 'Khuvaydulloeva 377 st.';
        $option->tjValue = $option->ruValue;
        $option->tag = 'address-street';
        $option->save();

        $option = new Option();
        $option->key = 'Адресс - индекс & город';
        $option->ruValue = '734060 г. Душанбе';
        $option->enValue = '734060 Dushanbe';
        $option->tjValue = $option->ruValue;
        $option->tag = 'address-city';
        $option->save();

        $option = new Option();
        $option->key = 'О компании - короткий текст';
        $option->ruValue = 'ТГЭМ – ведущая таджикская компания по строительству гидроэнергетических и инфраструктурных объектов.';
        $option->enValue = 'TGEM is a leading company in the construction of hydropower and infrastructure facilities.';
        $option->tjValue = $option->ruValue;
        $option->tag = 'about-company-short';
        $option->save();


        $option = new Option();
        $option->key = 'Онлайн приёмная генерального директора - описание';
        $option->ruValue = 'На данной странице вы можете обратиться к генеральному директору ОАО «ТГЭМ» Сафарову Икболу Давлатовичу';
        $option->enValue = 'On this page you can contact to the General Director of JSC «TGEM» Safarov Iqbol Davlatovich';
        $option->tjValue = $option->ruValue;
        $option->tag = 'online-booking-text';
        $option->save();


        // $option = new Option();
        // $option->key = 'О компании';
        // $option->ruValue = 'AAAAAAAAAAAAAAAAAA';
        // $option->enValue = 'AAAAAAAAAAAAAAAAAA';
        // $option->tjValue = $option->ruValue;
        // $option->tag = 'AAAAAAAAAAAAAAAAAA';
        // $option->save();


        // $option = new Option();
        // $option->key = 'О компании';
        // $option->ruValue = 'AAAAAAAAAAAAAAAAAA';
        // $option->enValue = 'AAAAAAAAAAAAAAAAAA';
        // $option->tjValue = $option->ruValue;
        // $option->tag = 'AAAAAAAAAAAAAAAAAA';
        // $option->save();


        // $option = new Option();
        // $option->key = 'О компании';
        // $option->ruValue = 'AAAAAAAAAAAAAAAAAA';
        // $option->enValue = 'AAAAAAAAAAAAAAAAAA';
        // $option->tjValue = $option->ruValue;
        // $option->tag = 'AAAAAAAAAAAAAAAAAA';
        // $option->save();


        // $option = new Option();
        // $option->key = 'О компании';
        // $option->ruValue = 'AAAAAAAAAAAAAAAAAA';
        // $option->enValue = 'AAAAAAAAAAAAAAAAAA';
        // $option->tjValue = $option->ruValue;
        // $option->tag = 'AAAAAAAAAAAAAAAAAA';
        // $option->save();


        // $option = new Option();
        // $option->key = 'О компании';
        // $option->ruValue = 'AAAAAAAAAAAAAAAAAA';
        // $option->enValue = 'AAAAAAAAAAAAAAAAAA';
        // $option->tjValue = $option->ruValue;
        // $option->tag = 'AAAAAAAAAAAAAAAAAA';
        // $option->save();


        // $option = new Option();
        // $option->key = 'О компании';
        // $option->ruValue = 'AAAAAAAAAAAAAAAAAA';
        // $option->enValue = 'AAAAAAAAAAAAAAAAAA';
        // $option->tjValue = $option->ruValue;
        // $option->tag = 'AAAAAAAAAAAAAAAAAA';
        // $option->save();


        // $option = new Option();
        // $option->key = 'О компании';
        // $option->ruValue = 'AAAAAAAAAAAAAAAAAA';
        // $option->enValue = 'AAAAAAAAAAAAAAAAAA';
        // $option->tjValue = $option->ruValue;
        // $option->tag = 'AAAAAAAAAAAAAAAAAA';
        // $option->save();


        // $option = new Option();
        // $option->key = 'О компании';
        // $option->ruValue = 'AAAAAAAAAAAAAAAAAA';
        // $option->enValue = 'AAAAAAAAAAAAAAAAAA';
        // $option->tjValue = $option->ruValue;
        // $option->tag = 'AAAAAAAAAAAAAAAAAA';
        // $option->save();


        // $option = new Option();
        // $option->key = 'О компании';
        // $option->ruValue = 'AAAAAAAAAAAAAAAAAA';
        // $option->enValue = 'AAAAAAAAAAAAAAAAAA';
        // $option->tjValue = $option->ruValue;
        // $option->tag = 'AAAAAAAAAAAAAAAAAA';
        // $option->save();


        // $option = new Option();
        // $option->key = 'О компании';
        // $option->ruValue = 'AAAAAAAAAAAAAAAAAA';
        // $option->enValue = 'AAAAAAAAAAAAAAAAAA';
        // $option->tjValue = $option->ruValue;
        // $option->tag = 'AAAAAAAAAAAAAAAAAA';
        // $option->save();

    }
}