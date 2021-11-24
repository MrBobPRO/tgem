<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function dashboard_index(Request $request)
    {
        // Generate parameters for order request
        $order_by = $request->order_by;
        if (!$order_by) $order_by = "priority";

        $order_type = $request->order_type;
        if (!$order_type) $order_type = "asc";

        $active_page = $request->page;
        if (!$active_page) $active_page = 1;

        $slides = Slider::orderBy($order_by, $order_type)
            ->paginate(30, ["*"], "page", $active_page)
            ->appends($request->except("page"));

        //used in search & counting
        $all_items = Slider::orderBy("title", "asc")->get();
        $items_count = count($all_items);

        return view("dashboard.slider.index", compact("slides", "all_items", "items_count", "order_by", "order_type", "active_page"));
    }

    public function dashboard_create()
    {
        return view("dashboard.slider.create");
    }

    public function store(Request $request)
    {
        // Validate uique fields
        $validation_errors = [];
        if(!$request->file('image') && !$request->image_from_archive)
            array_push($validation_errors, "Изображение не выбрано. Выберите изображение из архива или добавьте новый!");

        if (count($validation_errors) > 0) return back()->withInput()->withErrors($validation_errors);


        $slide = new Slider();
        $slide->title = $request->title;
        $slide->crumb = $request->crumb;
        $slide->description = $request->description;
        $slide->link = $request->link;
        $slide->video = $request->video;
        $slide->priority = $request->priority;
        $slide->image = $request->image_from_archive ? $request->image_from_archive : "error"; 
        $slide->save();

        //resize image and store in archive
        if($request->file("image")) {
            $image = $request->file("image");
            $filename = Helper::rename_file_if_exists("img/archive/", $image);
            $slide->image = $filename;
            $slide->save();
            Helper::store_image_into_archive($image, $filename);
        }

        return redirect()->route("dashboard.slider.index");
    }

    public function dashboard_single($id)
    {
        $slide = Slider::find($id);

        return view("dashboard.slider.single", compact("slide"));
    }

    public function update(Request $request)
    {
        $slide = Slider::find($request->id);
        $slide->title = $request->title;
        $slide->crumb = $request->crumb;
        $slide->description = $request->description;
        $slide->link = $request->link;
        $slide->video = $request->video;
        $slide->priority = $request->priority;
        $slide->image = $request->image_from_archive ? $request->image_from_archive : $slide->image; 
        $slide->save();

        //resize image and store in archive
        if($request->file("image")) {
            $image = $request->file("image");
            $filename = Helper::rename_file_if_exists("img/archive/", $image);
            $slide->image = $filename;
            $slide->save();
            Helper::store_image_into_archive($image, $filename);
        }

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        // need to get in array because of foreach multiple delete
        $ids = [$request->id];
        $this->permanent_delete($ids);

        return redirect()->route("dashboard.slider.index");
    }

    public function remove_multiple(Request $request)
    {
        $this->permanent_delete($request->ids);

        return redirect()->back();
    }

    private function permanent_delete($ids)
    {
        foreach ($ids as $id) {
            $slide = Slider::find($id);
            $slide->delete();
        }
    }
}
