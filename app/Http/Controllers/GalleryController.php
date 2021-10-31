<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

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

}
