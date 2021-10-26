<?php

namespace Database\Seeders;

use App\Models\Dropdown;
use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //----------Dropdowns start----------
        $title = ["Главная", "О Компании", "Деятельность", "Проекты", "Медиа", "Карьера", "Контакты"];
        $url = ["/", "about", "activity", "projects", "media", "career", "contacts"];
        $priority = [1,2,3,4,5,6,7];
        $no_childs = [true, false, false, false, false, false, false];

        for ($i = 0; $i < count($title); $i++) {
            $dropdown = new Dropdown();
            $dropdown->title = $title[$i];
            $dropdown->url = $url[$i];
            $dropdown->priority = $priority[$i];
            $dropdown->no_childs = $no_childs[$i];
            $dropdown->save();
        }
        //----------Dropdowns end----------



        //----------Pages start----------
        // About Dropdowns pages
        $title = ["О Нас", "История", "Корпоративная культура", "Социальная ответственность", "Сертификаты"];
        $dropdown_id = [2,2,2,2,2];
        $priority = [1,2,3,4,5];
        $default_template = [true,true,true,true,true];
        $url = ["about_us", "our_history", "corporate_culture", "social responsibility", "certificates"];

        for ($i = 0; $i < count($title); $i++) {
            $page = new Page();
            $page->title = $title[$i];
            $page->dropdown_id = $dropdown_id[$i];
            $page->priority = $priority[$i];
            $page->default_template = $default_template[$i];
            $page->url = $url[$i];
            $page->save();
        }

        // Activity Dropdowns pages
        $title = ["Строительство", "Энергетика"];
        $dropdown_id = [3,3];
        $priority = [1,2];
        $default_template = [true,true];
        $url = ["construction", "energy"];

        for ($i = 0; $i < count($title); $i++) {
            $page = new Page();
            $page->title = $title[$i];
            $page->dropdown_id = $dropdown_id[$i];
            $page->priority = $priority[$i];
            $page->default_template = $default_template[$i];
            $page->url = $url[$i];
            $page->save();
        }

        // Projects Dropdowns pages
        $title = ["Выполненные проекты", "Текущие проекты"];
        $dropdown_id = [4,4];
        $priority = [1,2];
        $default_template = [false,false];
        $url = ["completed_projects", "current_projects"];

        for ($i = 0; $i < count($title); $i++) {
            $page = new Page();
            $page->title = $title[$i];
            $page->dropdown_id = $dropdown_id[$i];
            $page->priority = $priority[$i];
            $page->default_template = $default_template[$i];
            $page->url = $url[$i];
            $page->save();
        }

        // Media Dropdowns pages
        $title = ["Новости компании", "Отраслевые новости", "Галерея"];
        $dropdown_id = [5,5,5];
        $priority = [1,2,3];
        $default_template = [false,false,false];
        $url = ["company_news", "industry_news", "gallery"];

        for ($i = 0; $i < count($title); $i++) {
            $page = new Page();
            $page->title = $title[$i];
            $page->dropdown_id = $dropdown_id[$i];
            $page->priority = $priority[$i];
            $page->default_template = $default_template[$i];
            $page->url = $url[$i];
            $page->save();
        }

        // Career Dropdowns pages
        $title = ["Карьера в ТГЭМ", "Вакансии"];
        $dropdown_id = [6,6];
        $priority = [1,2];
        $default_template = [true,false];
        $url = ["career_in_tgem", "vacancies"];

        for ($i = 0; $i < count($title); $i++) {
            $page = new Page();
            $page->title = $title[$i];
            $page->dropdown_id = $dropdown_id[$i];
            $page->priority = $priority[$i];
            $page->default_template = $default_template[$i];
            $page->url = $url[$i];
            $page->save();
        }

        // Contacts Dropdowns pages
        $title = ["Контакты", "Онлайн запись"];
        $dropdown_id = [7,7];
        $priority = [1,2];
        $default_template = [false,false];
        $url = ["our_contacts", "online_booking"];

        for ($i = 0; $i < count($title); $i++) {
            $page = new Page();
            $page->title = $title[$i];
            $page->dropdown_id = $dropdown_id[$i];
            $page->priority = $priority[$i];
            $page->default_template = $default_template[$i];
            $page->url = $url[$i];
            $page->save();
        }

        //----------Pages end----------
    }
}
