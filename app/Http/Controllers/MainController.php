<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectGroup;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        $projects = Project::latest()->take(6)->get();
        $project_groups = ProjectGroup::all();

        return view("home.index", compact("projects", "project_groups"));
    }
}
