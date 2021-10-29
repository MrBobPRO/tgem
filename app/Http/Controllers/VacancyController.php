<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::orderBy("title", "asc")->get();
        $page_title = 'Вакансии';

        return view("vacancies.index", compact("vacancies", "page_title"));
    }
}
