<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\News;
use App\Models\Page;
use App\Models\Project;
use App\Models\ProjectGroup;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use stdClass;

class MainController extends Controller
{
    public function home()
    {
        $projects = Project::latest()->take(6)->get();
        $project_groups = ProjectGroup::all();

        $news = News::latest()->take(3)->get();

        return view("home.index", compact("projects", "project_groups", "news"));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $result = new stdClass;

        $result->pages = Page::where("title", "like", "%" . $keyword . "%")
            ->orWhere("main_text", "like", "%" . $keyword . "%")
            ->orWhere("additional_text_title", "like", "%" . $keyword . "%")
            ->orWhere("additional_text_body", "like", "%" . $keyword . "%")
            ->get();

        $result->news = News::where("title", "like", "%" . $keyword . "%")
            ->orWhere("body", "like", "%" . $keyword . "%")
            ->get();

        $result->projects = Project::where("title", "like", "%" . $keyword . "%")
            ->orWhere("body", "like", "%" . $keyword . "%")
            ->get();

        $result->galleries = Gallery::where("title", "like", "%" . $keyword . "%")
            ->get();

        $result->vacancies = Vacancy::where("title", "like", "%" . $keyword . "%")
            ->orWhere("body", "like", "%" . $keyword . "%")
            ->get();

        $results_count = $result->pages->count() 
            + $result->projects->count() 
            + $result->news->count() 
            + $result->galleries->count() 
            + $result->vacancies->count();

        return view("search.index", compact("keyword", "result", "results_count"));
    }
}
