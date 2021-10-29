<?php

namespace Database\Seeders;

use App\Models\Vacancy;
use Illuminate\Database\Seeder;

class VacanciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = ["Инженер-эколог", "Табельщик", "Машинист", "Инженер-строитель", "Инженер ПТО", "Аналитик"];
        $image = ["1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg", "6.jpg"];

        for($i = 0; $i < count($title); $i++) {
            $vacancy = new Vacancy();
            $vacancy->title = $title[$i];
            $vacancy->image = $image[$i];
            $vacancy->body = "Текст вакансии";
            $vacancy->save();
        }
    }
}
