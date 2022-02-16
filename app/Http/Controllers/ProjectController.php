<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Project;
use App\Models\ProjectGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function completed()
    {
        $projects = Project::where("completed", true)->latest()->paginate(9);
        $page_title = __("Выполненные Проекты");

        return view("projects.index", compact("projects", "page_title"));
    }

    public function current()
    {
        $projects = Project::where("completed", false)->latest()->paginate(9);
        $page_title = __("Текущие Проекты");

        return view("projects.index", compact("projects", "page_title"));
    }

    public function single($url)
    {
        $project = Project::where("url", $url)->first();

        return view("projects.single", compact("project"));
    }

    public function dashboard_index(Request $request)
    {
        // Generate parameters for order request
        $order_by = $request->order_by;
        if (!$order_by) $order_by = "created_at";

        $order_type = $request->order_type;
        if (!$order_type) $order_type = "desc";

        $active_page = $request->page;
        if (!$active_page) $active_page = 1;

        $projects = Project::withCount("images")
            ->orderBy($order_by, $order_type)
            ->paginate(30, ["*"], "page", $active_page)
            ->appends($request->except("page"));

        //used in search & counting
        $all_items = Project::orderBy("ruTitle", "asc")->get();
        $items_count = count($all_items);

        return view("dashboard.projects.index", compact("projects", "all_items", "items_count", "order_by", "order_type", "active_page"));
    }

    public function dashboard_create()
    {
        $groups = ProjectGroup::orderBy("ruTitle", "asc")->get();

        return view("dashboard.projects.create", compact("groups"));
    }

    public function store(Request $request)
    {
        // Validate uique fields
        $validation_errors = [];
        if(!$request->file('image') && !$request->image_from_archive)
            array_push($validation_errors, "Изображение не выбрано. Выберите изображение из архива или добавьте новый!");

        if (count($validation_errors) > 0) return back()->withInput()->withErrors($validation_errors);

        $validation_rules = [
            "title" => "unique:projects"
        ];

        $validation_messages = [
            "title.unique" => "Проект с таким заголовком уже существует !",
        ];

        Validator::make($request->all(), $validation_rules, $validation_messages)->validate();

        $project = new Project();
        $multiLanguageFields = ['Title', 'Body'];
        Helper::fillMultiLanguageFields($request, $project, $multiLanguageFields);

        $project->completed = $request->completed;
        $project->project_group_id = $request->project_group_id;
        $project->url = Helper::transliterate_into_latin($request->ruTitle);
        $project->image = $request->image_from_archive ? $request->image_from_archive : "error"; 
        $project->save();

        //resize image and store in archive
        if($request->file("image")) {
            $image = $request->file("image");
            $filename = Helper::rename_file_if_exists("img/archive/", $image);
            $project->image = $filename;
            $project->save();
            Helper::store_image_into_archive($image, $filename);
        }

        return redirect()->route("dashboard.projects.index");
    }

    public function dashboard_single($id)
    {
        $project = Project::find($id);
        $groups = ProjectGroup::orderBy("ruTitle", "asc")->get();

        return view("dashboard.projects.single", compact("project", "groups"));
    }

    public function update(Request $request)
    {
        $project = Project::find($request->id);
        // Validate uique filends
        $validation_errors = [];
        if($request->ruTitle != $project->ruTitle) {
            $duplicate = Project::where("ruTitle", $request->ruTitle)->first();
            if ($duplicate) array_push($validation_errors, "Проект с таким заголовком уже существует!");
        }

        if(count($validation_errors) > 0) return back()->withInput()->withErrors($validation_errors);

        $multiLanguageFields = ['Title', 'Body'];
        Helper::fillMultiLanguageFields($request, $project, $multiLanguageFields);

        $project->completed = $request->completed;
        $project->project_group_id = $request->project_group_id;
        $project->url = Helper::transliterate_into_latin($request->ruTitle);
        $project->image = $request->image_from_archive ? $request->image_from_archive : $project->image; 
        $project->save();

        //resize image and store in archive
        if($request->file("image")) {
            $image = $request->file("image");
            $filename = Helper::rename_file_if_exists("img/archive/", $image);
            $project->image = $filename;
            $project->save();
            Helper::store_image_into_archive($image, $filename);
        }

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        // need to get in array because of foreach multiple delete
        $ids = [$request->id];
        $this->permanent_delete($ids);

        return redirect()->route("dashboard.projects.index");
    }

    public function remove_multiple(Request $request)
    {
        $this->permanent_delete($request->ids);

        return redirect()->back();
    }

    private function permanent_delete($ids)
    {
        foreach ($ids as $id) {
            $project = Project::find($id);
            $project->images()->delete();
            $project->delete();
        }
    }

}
