<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Dropdown;
use App\Models\Page;
use Image;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function default($drdwn, $pg)
    {
        $dropdown = Dropdown::where("url", $drdwn)->first();
        if (!$dropdown) return "Такой страницы не существует !";

        $page = $dropdown->pages()->where("url", $pg)->first();
        if (!$page) return "Такой страницы не существует !";

        return view("pages.default_template", compact("page"));
    }


    public function dashboard_index($dropdown_id, Request $request)
    {
        //get dropdown title. Used in header as page title
        $dropdown = Dropdown::find($dropdown_id);

        // Generate parameters for order request
        $order_by = $request->order_by;
        if (!$order_by) $order_by = "priority";

        $order_type = $request->order_type;
        if (!$order_type) $order_type = "asc";

        $active_page = $request->page;
        if (!$active_page) $active_page = 1;

        $pages = Page::where("dropdown_id", $dropdown->id)
            ->withCount("images")
            ->orderBy($order_by, $order_type)
            ->paginate(30, ["*"], "page", $active_page)
            ->appends($request->except("page"));

        //used in search & counting
        $all_items = Page::where("dropdown_id", $dropdown->id)->orderBy("title", "asc")->get();
        $items_count = count($all_items);

        return view("dashboard.pages.index", compact("pages", "all_items", "items_count", "dropdown", "order_by", "order_type", "active_page"));
    }

    public function dashboard_create(Request $request)
    {
        $dropdown = Dropdown::find($request->dropdown_id);

        return view("dashboard.pages.create", compact("dropdown"));
    }

    public function store(Request $request)
    {
        $dropdown = Dropdown::find($request->dropdown_id);
        // Validate uique fields
        $validation_errors = [];
        if(!$request->file('image') && !$request->image_from_archive)
            array_push($validation_errors, "Изображение не выбрано. Выберите изображение из архива или добавьте новый!");

        $duplicate = $dropdown->pages()->where("title", $request->title)->first();
        if ($duplicate)
            array_push($validation_errors, "Выпадающй список с таким именем уже существует !");

        $duplicate = $dropdown->pages()->where("url", $request->url)->first();
        if ($duplicate)
            array_push($validation_errors, "Страница с такой ссылкой уже существует !");

        if (count($validation_errors) > 0) return back()->withInput()->withErrors($validation_errors);

        $page = new Page();
        $page->title = $request->title;
        $page->priority = $request->priority;
        $page->url = $request->url;
        $page->dropdown_id = $request->dropdown_id;
        $page->image = $request->image_from_archive ? $request->image_from_archive : "error"; 
        $page->default_template = true;
        $page->main_text = $request->main_text;
        $page->additional_text_title = $request->additional_text_title;
        $page->additional_text_body = $request->additional_text_body;
        $page->save();

        //resize image and store in archive
        if($request->file("image")) {
            $image = $request->file("image");
            $filename = Helper::rename_file_if_exists("img/archive/", $image);
            $page->image = $filename;
            $page->save();
            Helper::store_image_into_archive($image, $filename);
        }

        return redirect()->route("dashboard.pages.index", $dropdown->id);
    }

    public function dashboard_single($id)
    {
        $page = Page::find($id);

        return view("dashboard.pages.single", compact("page"));
    }

    public function update(Request $request)
    {
        $page = Page::find($request->id);
        // Validate uique filends
        $validation_errors = [];
        if($request->title != $page->title) {
            $duplicate = Page::where("dropdown_id", $page->dropdown_id)->where("title", $request->title)->first();
            if ($duplicate) array_push($validation_errors, "Страница с таким заголовком в текущем выпадающем списке уже существует!");
        }
        if($request->url != $page->url) {
            $duplicate = Page::where("dropdown_id", $page->dropdown_id)->where("url", $request->url)->first();
            if ($duplicate) array_push($validation_errors, "Страница с такой ссылкой в текущем выпадающем списке уже существует!");
        }

        if(count($validation_errors) > 0) return back()->withInput()->withErrors($validation_errors);

        $page->title = $request->title;
        $page->priority = $request->priority;
        $page->url = $request->url;
        $page->image = $request->image_from_archive ? $request->image_from_archive : $page->image; 
        $page->main_text = $request->main_text;
        $page->additional_text_title = $request->additional_text_title;
        $page->additional_text_body = $request->additional_text_body;
        $page->save();

        //resize image and store in archive
        if($request->file("image")) {
            $image = $request->file("image");
            $filename = Helper::rename_file_if_exists("img/archive/", $image);
            $page->image = $filename;
            $page->save();
            Helper::store_image_into_archive($image, $filename);
        }

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        // need to get in array because of foreach multiple delete
        $dropdown_id = Page::find($request->id)->dropdown_id;
        $ids = [$request->id];
        $this->permanent_delete($ids);

        return redirect()->route("dashboard.pages.index", $dropdown_id);
    }

    public function remove_multiple(Request $request)
    {
        $this->permanent_delete($request->ids);

        return redirect()->back();
    }

    private function permanent_delete($ids)
    {
        foreach ($ids as $id) {
            $page = Page::find($id);
            $page->images()->delete();
            $page->delete();
        }
    }
}
