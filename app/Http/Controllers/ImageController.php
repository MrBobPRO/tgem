<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function store(Request $request)
    {
        // Validate uique fields
        $validation_errors = [];
        if(!$request->file('image') && !$request->image_from_archive)
            array_push($validation_errors, "Изображение не выбрано. Выберите изображение из архива или добавьте новый!");

        if (count($validation_errors) > 0) return back()->withInput()->withErrors($validation_errors);

        $image = new Image();
        $image->title = $request->title;
        //gallery_id || page_id || project_id || news_id
        $image[$request->relation_column_name] = $request->relation_column_id;
        $image->filename = $request->image_from_archive ? $request->image_from_archive : "error"; 
        $image->save();

        //resize image and store in archive
        if($request->file("image")) {
            $uploaded = $request->file("image");
            $filename = Helper::rename_file_if_exists("img/archive/", $uploaded);
            $image->filename = $filename;
            $image->save();
            Helper::store_image_into_archive($uploaded, $filename);
        }

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $image = Image::find($request->id);
        $image->title = $request->title;
        $image->save();

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        Image::find($request->id)->delete();

        return redirect()->back();
    }
}
