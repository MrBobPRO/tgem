<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\Option;

class OptionController extends Controller
{
    public function dashboard_index(Request $request)
    {
        $all_items = Option::orderBy('key')
            ->select('id', 'key as ruTitle')
            ->get();

        $items_count = Option::all()->count();

        $options = Option::orderBy('key', 'asc')->paginate(40);

        return view("dashboard.options.index", compact("options", "all_items", "items_count"));
    }

    public function dashboard_single($id)
    {
        $option = Option::find($id);

        return view('dashboard.options.single', compact('option'));
    }

    public function update(Request $request)
    {   
        $option = Option::find($request->id);

        $multiLanguageFields = ['Value'];
        Helper::fillMultiLanguageFields($request, $option, $multiLanguageFields);

        $option->save();

        return redirect()->back();
    }
}
