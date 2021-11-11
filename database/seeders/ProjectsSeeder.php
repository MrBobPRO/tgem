<?php

namespace Database\Seeders;

use App\Helpers\Helper;
use App\Models\Project;
use App\Models\ProjectGroup;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //-----------Create Project Groups----------
        $group_names = ["Строительные проекты", "Энергетические проекты"];
        foreach($group_names as $name) {
            $project_group = new ProjectGroup();
            $project_group->name = $name;
            $project_group->save();
        }

        //-----------COMPLETED Projects----------
        $titles = ["Строительство ЛЭП в ИР Афганистан", "ПС «Ромит» 110/10 кВ", "Проект АСКУЭ (Худжанд)"];

        $bodies = [
            "<p>Строительство ЛЭП 20 кВ от ПС «Мазаре Шариф»  до города Мармол и от ПС «Мазаре Шариф»  до аэропорта Мазаре Шариф на севере Афганистана.</p>
            <p>Финансирование проекта: Германский Банк Развития (KfW)</p>
            <p>Консультант проекта: Fichtner</p>
            <p><b>Выполненные работы:</b></p>
            <p>Проектирование</p>
            <p>Строительство</p>
            <p>Доставка оборудования, кабеля, аксессуаров, ж/б опор,</p>
            <p>металлических опор</p>
            <p>Строительство ЛЭП 20 кВ</p>
            <p>Прокладка провода протяженностью 43км</p>
            <p><b>Период реализации проекта:</b></p>
            <p>25.04.2012 – 25.05.2014 гг.</p>",


            "<p>Проект: Электроснабджение джамоата Ромит<br></p>
            <p>Финансирование: KOICA</p>
            <p>В рамках данного проекта, финансируемого Корейским агентством международного сотрудничества, для электроснабжения 9 селений джамоата Ромит было выполнено:</p>
            <p>Строительство подстанции 110/20/10 кВ</p>
            <p>Поставка и монтаж трансформатора 10 МВА и</p>
            <p>Прокладка  500 метров линии электропередачи 110 кВ</p>
            <p>Прокладка 46,75 км и ЛЭП 20 кВ с установкой 810 железобетонных опор</p>
            <p>Прокладка 15 км ЛЭП 0,4 кВ с установкой 428 опор</p>
            <p>Установка 9 ТП 20/0,4 кВ</p>
            <p>Установка системы учета электроэнергии во всех указанных населенных пунктах.</p>",


            "<p>В 2017 году ОАО «ТГЭМ» успешно реализовала проект «Снижения потерь электроэнергии в Согдийской области», финансируемый ЕБРР, ЕИБ и ЕС/ИФЦА.</p>
            <p>В Рамках проекта 100 000 хозяйств города Худжанд были подключены к АСКУЭ и установлены интеллектуальные счетчики.</p>
            <p>Выполненные работы:</p>
            <p>Поставка и монтаж 100 тыс. интеллектуальных счетчиков и системы считывания, оборудование для аудита и билинговая система в Худжанде и близлежащих муниципальных образованиях.</p>
            <p>Период реализации проекта:</p>
            <p>2015-2017 гг.</p>"
        ];

        $images = ["1.jpg", "2.jpg", "3.jpg"];

        for($i = 0; $i < count($titles); $i++) {
            $project = new Project();
            $project->title = $titles[$i];
            $project->body = $bodies[$i];
            $project->image = $images[$i];
            $project->completed = 1;
            $project->project_group_id = 1;
            $project->url = Helper::transliterate_into_latin($titles[$i]);
            $project->save();
        }



        //-----------UNCOMPLETED Projects----------
        $titles = ["Строительство завода по производству электрооборудования", "Реабилитация Нурекской ГЭС", "Реабилитация Кайраккумской ГЭС"];

        $bodies = [
            "<p>ТГЭМ построит завод по производству электрооборудования.</p>
            <p>Согласно проекту, предприятие будет производить:</p>
            <ul>
            <li>Низковольтные комплектные устройство – ЩО, ЩР, ВРУ, ГРЩ, ПР, ОЩ, ЯВ, ЯРВ, ЯВГ.<li>
            <li>Распределительные шкафы – ЯКНО, КСО 6/10, 20 кВ.<li>
            <li>Комплектные распределительные устройство -КРУ и КРУН 6/10, 20 кВ.<li>
            <li>Шкафы управление и РЗ и А.<li>
            <li>Комплектные трансформаторные подстанции – КТП 6/10, 20 кВ.<li>
            <li>Электрические счетчики.<li>
            <li>Система уличного освещения<li>
            <li>Солнечные водонагреватели.<li>
            <li>Опоры ЛЭП<li>
            <li>Другие несерийные металлоконструкции<li>
            </ul>",
    
            
            "<p><b>Безопасность плотин P2.1 – Исследования и мониторинг</b></p>
            <p>Вращательное бурение, сбор нарушенных и ненарушенных образцов грунта и горных пород, видеосъемка и лабораторные испытания, а также измерения уровня грунтовых вод в процессе бурения.</p>
            <p>Бурение / очистка существующих скважин, ведение видеосъемки всех скважин и установка КИПиА (пьезометры и инклинометры).</p>
            <p><b>P4 – ОРУ</b></p>
            <p>Поставка и монтаж 6 автотрансформаторов 525/242/10 кВ, 200/200/25 МВА,</p>
            <p>Монтаж распределительного устройства 6 кВ</p>
            <p>Монтаж 6 выключателей 500 кВ</p>
            <p>Вспомогательное оборудование 500 кВ</p>
            <p>Установка и монтаж ограничителей перенапряжения, изоляторов и соединительного оборудования</p>",


            "<p>В настоящее время Cobra и TГЭМ занимаются реабилитацией Кайраккумской ГЭС. В рамках проекта планируется заменить 6 турбин и генераторов, а также часть вспомогательных систем. Общая установленная мощность станции будет увеличена на 35% и составит 174 МВт.</p>
            <p></b>Будет выполнено:</b></p>
            <p>Замена 6 гидроагрегатов (6х29 МВт)</p>
            <p>Строительство ОРУ 110 кВ</p>
            <p>Строительство КРУЭ 110 кВ
            <p>Восстановление каменно-насыпной и бетонных дамб</p>
            <p>Замена 6 повышающих трансформаторов</p>"
        ];

        $images = ["4.jpg", "5.jpg", "6.jpg"];

        for($i = 0; $i < count($titles); $i++) {
            $project = new Project();
            $project->title = $titles[$i];
            $project->body = $bodies[$i];
            $project->image = $images[$i];
            $project->completed = 0;
            $project->project_group_id = 2;
            $project->url = Helper::transliterate_into_latin($titles[$i]);
            $project->save();
        }

    }
}
