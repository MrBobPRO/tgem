<?php

namespace App\Http\Controllers;

use App\Models\Dropdown;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function default($drdwn, $pg) 
    {
        $dropdown = Dropdown::where("url", $drdwn)->first();
        $page = Page::where("url", $pg)->first();

        if(!$dropdown || !$page) return "Такой страницы не существует !";

        return view("pages.default_template", compact("page"));
    }
}
