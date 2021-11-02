<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function completed()
    {
        $projects = Project::where("completed", true)->paginate(9);
        $page_title = "Выполненные Проекты";

        return view("projects.index", compact("projects", "page_title"));
    }

    public function current()
    {
        $projects = Project::where("completed", false)->paginate(9);
        $page_title = "Текущие Проекты";

        return view("projects.index", compact("projects", "page_title"));
    }

    public function single($url)
    {
        $project = Project::where("url", $url)->first();

        return view("projects.single", compact("project"));
    }


}
