<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function switch(Request $request)
    {
        session(['appLocale' => $request->locale]);

        return redirect()->back();
    }


    

}
