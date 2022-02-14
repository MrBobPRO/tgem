<?php

namespace App\Http\Controllers;

use App\Models\Dropdown;
use Image;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Generate parameters for order request
        $order_by = $request->order_by;
        if (!$order_by) $order_by = "priority";

        $order_type = $request->order_type;
        if (!$order_type) $order_type = "asc";

        $active_page = $request->page;
        if (!$active_page) $active_page = 1;

        $dropdowns = Dropdown::orderBy($order_by, $order_type)
            ->withCount("pages")
            ->paginate(30, ["*"], "page", $active_page)
            ->appends($request->except("page"));

        //used in search & counting
        $all_items = Dropdown::orderBy("ruTitle", "asc")->get();
        $items_count = count($all_items);

        return view("dashboard.dropdowns.index", compact("dropdowns", "all_items", "items_count", "order_by", "order_type", "active_page"));
    }
}
