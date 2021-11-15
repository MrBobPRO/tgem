<?php

namespace App\Http\Controllers;

use App\Models\Dropdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DropdownController extends Controller
{

    public function webmaster_single($id)
    {
        $dropdown = Dropdown::find($id);

        return view("dashboard.dropdowns.single", compact("dropdown"));
    }

    public function update(Request $request)
    {
        $dropdown = Dropdown::find($request->id);
        // Validate uique filends
        $validation_errors = [];
        if ($request->title != $dropdown->title) {
            $duplicate = Dropdown::where("title", $request->title)->first();
            if ($duplicate) array_push($validation_errors, "Выпадающй список с таким заголовком уже существует !");
        }
        if ($request->url != $dropdown->url) {
            $duplicate = Dropdown::where("url", $request->url)->first();
            if ($duplicate) array_push($validation_errors, "Выпадающй список с такой ссылкой уже существует !");
        }

        if (count($validation_errors) > 0) return back()->withInput()->withErrors($validation_errors);

        $dropdown->title = $request->title;
        $dropdown->priority = $request->priority;
        $dropdown->url = $request->url;
        $dropdown->may_have_childs = $request->may_have_childs ? true : false;
        $dropdown->save();

        return redirect()->back();
    }

    public function webmaster_create()
    {
        return view("dashboard.dropdowns.create");
    }

    public function store(Request $request)
    {
        $validation_rules = [
            "title" => "unique:dropdowns",
            "url" => "unique:dropdowns"
        ];

        $validation_messages = [
            "title.unique" => "Выпадающй список с таким заголовком уже существует !",
            "url.unique" => "Выпадающй список с такой ссылкой уже существует !",
        ];

        Validator::make($request->all(), $validation_rules, $validation_messages)->validate();

        $dropdown = new Dropdown();
        $dropdown->title = $request->title;
        $dropdown->priority = $request->priority;
        $dropdown->url = $request->url;
        $dropdown->may_have_childs = $request->may_have_childs ? true : false;
        $dropdown->save();

        return redirect()->route("dashboard.index");
    }

    public function remove(Request $request)
    {
        // need to get in array because of foreach multiple delete
        $ids = [$request->id];
        $this->delete_dropdown($ids);

        return redirect()->route("dashboard.index");
    }

    public function remove_multiple(Request $request)
    {
        $this->delete_dropdown($request->ids);

        return redirect()->route("dashboard.index");
    }

    private function delete_dropdown($ids)
    {
        foreach ($ids as $id) {
            $dropdown = Dropdown::find($id);
            // delete dropdown pages
            $dropdown->pages()->delete();
        }
    }
}
