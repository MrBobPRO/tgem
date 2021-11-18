<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function company()
    {
        $news = News::where("inner", true)->paginate(9);
        $page_title = "Новости компании";

        return view("news.index", compact("news", "page_title"));
    }

    public function industry()
    {
        $news = News::where("inner", false)->paginate(9);
        $page_title = "Отраслевые новости";

        return view("news.index", compact("news", "page_title"));
    }

    public function single($url)
    {
        $news = News::where("url", $url)->first();

        return view("news.single", compact("news"));
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

        $news = News::withCount("images")
            ->orderBy($order_by, $order_type)
            ->paginate(30, ["*"], "page", $active_page)
            ->appends($request->except("page"));

        //used in search & counting
        $all_items = News::orderBy("title", "asc")->get();
        $items_count = count($all_items);

        return view("dashboard.news.index", compact("news", "all_items", "items_count", "order_by", "order_type", "active_page"));
    }

    public function dashboard_create()
    {
        return view("dashboard.news.create");
    }

    public function store(Request $request)
    {
        // Validate uique fields
        $validation_errors = [];
        if(!$request->file('image') && !$request->image_from_archive)
            array_push($validation_errors, "Изображение не выбрано. Выберите изображение из архива или добавьте новый!");

        if (count($validation_errors) > 0) return back()->withInput()->withErrors($validation_errors);

        $validation_rules = [
            "title" => "unique:news"
        ];

        $validation_messages = [
            "title.unique" => "Новость с таким заголовком уже существует !",
        ];

        Validator::make($request->all(), $validation_rules, $validation_messages)->validate();

        $new = new News();
        $new->title = $request->title;
        $new->body = $request->body;
        $new->inner = $request->inner;
        $new->url = Helper::transliterate_into_latin($request->title);
        $new->image = $request->image_from_archive ? $request->image_from_archive : "error"; 
        $new->save();

        //resize image and store in archive
        if($request->file("image")) {
            $image = $request->file("image");
            $filename = Helper::rename_file_if_exists("img/archive/", $image);
            $new->image = $filename;
            $new->save();
            Helper::store_image_into_archive($image, $filename);
        }

        return redirect()->route("dashboard.news.index");
    }

    public function dashboard_single($id)
    {
        $new = News::find($id);

        return view("dashboard.news.single", compact("new"));
    }

    public function update(Request $request)
    {
        $new = News::find($request->id);
        // Validate uique filends
        $validation_errors = [];
        if($request->title != $new->title) {
            $duplicate = News::where("title", $request->title)->first();
            if ($duplicate) array_push($validation_errors, "Новость с таким заголовком уже существует!");
        }

        if(count($validation_errors) > 0) return back()->withInput()->withErrors($validation_errors);

        $new->title = $request->title;
        $new->body = $request->body;
        $new->inner = $request->inner;
        $new->url = Helper::transliterate_into_latin($request->title);
        $new->image = $request->image_from_archive ? $request->image_from_archive : $new->image; 
        $new->save();

        //resize image and store in archive
        if($request->file("image")) {
            $image = $request->file("image");
            $filename = Helper::rename_file_if_exists("img/archive/", $image);
            $new->image = $filename;
            $new->save();
            Helper::store_image_into_archive($image, $filename);
        }

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        // need to get in array because of foreach multiple delete
        $ids = [$request->id];
        $this->permanent_delete($ids);

        return redirect()->route("dashboard.news.index");
    }

    public function remove_multiple(Request $request)
    {
        $this->permanent_delete($request->ids);

        return redirect()->back();
    }

    private function permanent_delete($ids)
    {
        foreach ($ids as $id) {
            $new = News::find($id);
            $new->images()->delete();
            $new->delete();
        }
    }

}
