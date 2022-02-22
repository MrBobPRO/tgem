<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $page_title = __("Контакты");

        return view("contacts.index", compact("page_title"));
    }

    public function booking()
    {
        $page_title = __("Онлайн запись");

        return view("contacts.booking", compact("page_title"));
    }

}
