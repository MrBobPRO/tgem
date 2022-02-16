<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(9);
        $page_title = "Галерея";

        return view("galleries.index", compact("galleries", "page_title"));
    }

    public function single($url)
    {
        $gallery = Gallery::where("url", $url)->first();

        return view("galleries.single", compact("gallery"));
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

        $galleries = Gallery::withCount("images")
            ->orderBy($order_by, $order_type)
            ->paginate(30, ["*"], "page", $active_page)
            ->appends($request->except("page"));

        //used in search & counting
        $all_items = Gallery::orderBy("ruTitle", "asc")->get();
        $items_count = count($all_items);

        return view("dashboard.galleries.index", compact("galleries", "all_items", "items_count", "order_by", "order_type", "active_page"));
    }

    public function dashboard_create()
    {
        return view("dashboard.galleries.create");
    }

    public function store(Request $request)
    {
        // Validate uique fields
        $validation_errors = [];
        if(!$request->file('thumbnail') && !$request->thumbnail_from_archive)
            array_push($validation_errors, "Изображение не выбрано. Выберите изображение из архива или добавьте новый!");

        if (count($validation_errors) > 0) return back()->withInput()->withErrors($validation_errors);

        $validation_rules = [
            "ruTitle" => "unique:galleries"
        ];

        $validation_messages = [
            "ruTitle.unique" => "Галерея с таким заголовком уже существует !",
        ];

        Validator::make($request->all(), $validation_rules, $validation_messages)->validate();

        $gallery = new Gallery();
        $multiLanguageFields = ['Title'];
        Helper::fillMultiLanguageFields($request, $gallery, $multiLanguageFields);
        $gallery->url = Helper::transliterate_into_latin($request->ruTitle);
        $gallery->thumbnail = $request->thumbnail_from_archive ? $request->thumbnail_from_archive : "error"; 
        $gallery->save();

        //resize image and store in archive
        if($request->file("thumbnail")) {
            $image = $request->file("thumbnail");
            $filename = Helper::rename_file_if_exists("img/archive/", $image);
            $gallery->thumbnail = $filename;
            $gallery->save();
            Helper::store_image_into_archive($image, $filename);
        }

        return redirect()->route("dashboard.galleries.single", $gallery->id);
    }

    public function dashboard_single($id)
    {
        $gallery = Gallery::find($id);

        return view("dashboard.galleries.single", compact("gallery"));
    }

    public function update(Request $request)
    {
        $gallery = Gallery::find($request->id);
        // Validate uique filends
        $validation_errors = [];
        if($request->ruTitle != $gallery->ruTitle) {
            $duplicate = Gallery::where("ruTitle", $request->ruTitle)->first();
            if ($duplicate) array_push($validation_errors, "Галерея с таким заголовком уже существует!");
        }

        if(count($validation_errors) > 0) return back()->withInput()->withErrors($validation_errors);

        $multiLanguageFields = ['Title'];
        Helper::fillMultiLanguageFields($request, $gallery, $multiLanguageFields);
        $gallery->url = Helper::transliterate_into_latin($request->ruTitle);
        $gallery->thumbnail = $request->thumbnail_from_archive ? $request->thumbnail_from_archive : $gallery->thumbnail; 
        $gallery->save();

        //resize image and store in archive
        if($request->file("thumbnail")) {
            $image = $request->file("thumbnail");
            $filename = Helper::rename_file_if_exists("img/archive/", $image);
            $gallery->thumbnail = $filename;
            $gallery->save();
            Helper::store_image_into_archive($image, $filename);
        }

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        // need to get in array because of foreach multiple delete
        $ids = [$request->id];
        $this->permanent_delete($ids);

        return redirect()->route("dashboard.galleries.index");
    }

    public function remove_multiple(Request $request)
    {
        $this->permanent_delete($request->ids);

        return redirect()->back();
    }

    private function permanent_delete($ids)
    {
        foreach ($ids as $id) {
            $gallery = Gallery::find($id);
            $gallery->images()->delete();
            $gallery->delete();
        }
    }

}
