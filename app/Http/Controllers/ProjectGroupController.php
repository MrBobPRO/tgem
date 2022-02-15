<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Project;
use App\Models\ProjectGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectGroupController extends Controller
{
    public function dashboard_index(Request $request)
    {
        $groups = ProjectGroup::orderBy("ruTitle", "asc")->withCount("projects")->paginate(30);

        //used in search & counting
        $all_items = ProjectGroup::orderBy("ruTitle", "asc")->get();
        $items_count = count($all_items);

        return view("dashboard.project_groups.index", compact("groups", "all_items", "items_count"));
    }

    public function dashboard_create()
    {
        return view("dashboard.project_groups.create");
    }

    public function store(Request $request)
    {
        $validation_rules = [
            "ruTitle" => "unique:project_groups"
        ];

        $validation_messages = [
            "ruTitle.unique" => "Группа с таким заголовком уже существует !",
        ];

        Validator::make($request->all(), $validation_rules, $validation_messages)->validate();

        $group = new ProjectGroup();
        $multiLanguageFields = ['Title'];
        Helper::fillMultiLanguageFields($request, $group, $multiLanguageFields);
        $group->save();

        return redirect()->route("dashboard.projects.groups.index");
    }

    public function dashboard_single($id)
    {
        $group = ProjectGroup::find($id);

        return view("dashboard.project_groups.single", compact("group"));
    }

    public function update(Request $request)
    {
        $group = ProjectGroup::find($request->id);
        // Validate uique filends
        $validation_errors = [];
        if($request->ruTitle != $group->ruTitle) {
            $duplicate = ProjectGroup::where("ruTitle", $request->ruTitle)->first();
            if ($duplicate) array_push($validation_errors, "Группа с таким заголовком уже существует!");
        }

        if(count($validation_errors) > 0) return back()->withInput()->withErrors($validation_errors);

        $multiLanguageFields = ['Title'];
        Helper::fillMultiLanguageFields($request, $group, $multiLanguageFields);
        $group->save();

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        // need to get in array because of foreach multiple delete
        $ids = [$request->id];
        $this->permanent_delete($ids);

        return redirect()->route("dashboard.projects.groups.index");
    }

    public function remove_multiple(Request $request)
    {
        $this->permanent_delete($request->ids);

        return redirect()->back();
    }

    private function permanent_delete($ids)
    {
        foreach ($ids as $id) {
            $group = ProjectGroup::find($id);
            //change all groups projects "project_group_id" to another
            $exists = ProjectGroup::where("id", "!=", $id)->first();
            //!!!!!One group must exist at least!!!!!
            if(!$exists) return redirect()->back();

            foreach($group->projects as $project) {
                $project = Project::find($project->id);
                $project->project_group_id = $exists->id;
                $project->save();
            }

            $group->delete();
        }
    }
}
