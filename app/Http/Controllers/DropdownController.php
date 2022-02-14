<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Dropdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DropdownController extends Controller
{
    public function dashboard_create()
    {
        return view("dashboard.dropdowns.create");
    }

    public function store(Request $request)
    {
        $validation_rules = [
            "ruTitle" => "unique:dropdowns",
            "url" => "unique:dropdowns"
        ];

        $validation_messages = [
            "ruTitle.unique" => "Выпадающй список с таким заголовком уже существует !",
            "url.unique" => "Выпадающй список с такой ссылкой уже существует !",
        ];

        Validator::make($request->all(), $validation_rules, $validation_messages)->validate();

        $dropdown = new Dropdown();
        $multiLanguageFields = ['Title'];
        Helper::fillMultiLanguageFields($request, $dropdown, $multiLanguageFields);
        $dropdown->priority = $request->priority;
        $dropdown->url = $request->url;
        $dropdown->may_have_childs = $request->may_have_childs ? true : false;
        $dropdown->save();

        return redirect()->route("dashboard.index");
    }

    public function dashboard_single($id)
    {   
        $dropdown = Dropdown::find($id);

        return view("dashboard.dropdowns.single", compact("dropdown"));
    }

    public function update(Request $request)
    {
        $dropdown = Dropdown::find($request->id);
        // Validate uique filends
        $validation_errors = [];
        if ($request->ruTitle != $dropdown->ruTitle) {
            $duplicate = Dropdown::where("ruTitle", $request->ruTitle)->first();
            if ($duplicate) array_push($validation_errors, "Выпадающй список с таким заголовком уже существует !");
        }
        if ($request->url != $dropdown->url) {
            $duplicate = Dropdown::where("url", $request->url)->first();
            if ($duplicate) array_push($validation_errors, "Выпадающй список с такой ссылкой уже существует !");
        }

        if (count($validation_errors) > 0) return back()->withInput()->withErrors($validation_errors);

        $multiLanguageFields = ['Title'];
        Helper::fillMultiLanguageFields($request, $dropdown, $multiLanguageFields);

        $dropdown->priority = $request->priority;
        $dropdown->url = $request->url;
        $dropdown->may_have_childs = $request->may_have_childs ? true : false;
        $dropdown->save();

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        // need to get in array because of foreach multiple delete
        $ids = [$request->id];
        $this->permanent_delete($ids);

        return redirect()->route("dashboard.index");
    }

    public function remove_multiple(Request $request)
    {
        $this->permanent_delete($request->ids);

        return redirect()->back();
    }

    private function permanent_delete($ids)
    {
        foreach ($ids as $id) {
            $dropdown = Dropdown::find($id);
            // delete dropdown pages
            foreach($dropdown->pages as $page) {
                $page->images()->delete();
            }
            $dropdown->pages()->delete();
            $dropdown->delete();
        }
    }
}
