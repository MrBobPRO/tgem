<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

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

}
