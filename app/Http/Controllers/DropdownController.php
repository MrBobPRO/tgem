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
        $dropdown->title = $request->title;
        $dropdown->priority = $request->priority;
        $dropdown->url = $request->url;
        $dropdown->no_childs = $request->childs ? false : true;
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
            "title.unique" => "Выпадающй список с таким названием уже существует !",
            "url.unique" => "Выпадающй список с такой ссылкой уже существует !",
        ];

        Validator::make($request->all(), $validation_rules, $validation_messages)->validate();

        $dropdown = new Dropdown();
        $dropdown->title = $request->title;
        $dropdown->priority = $request->priority;
        $dropdown->url = $request->url;
        $dropdown->no_childs = $request->childs ? false : true;
        $dropdown->save();

        return redirect()->route("dashboard.index");
    }

    public function remove(Request $request)
    {
        dd($request->id);
    }

    public function remove_multiple(Request $request)
    {
        dd($request->ids);
    }

}
