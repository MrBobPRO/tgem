<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function dashboard_index(Request $request)
    {
        // Generate parameters for order request
        $order_by = $request->order_by;
        if (!$order_by) $order_by = "created_at";

        $order_type = $request->order_type;
        if (!$order_type) $order_type = "desc";

        $active_page = $request->page;
        if (!$active_page) $active_page = 1;

        $records = Booking::orderBy($order_by, $order_type)
            ->paginate(30, ["*"], "page", $active_page)
            ->appends($request->except("page"));

        //used in search & counting
        $all_items = Booking::orderBy("name", "asc")->get();
        $items_count = count($all_items);

        $new_records_count = Booking::where("new", true)->count();

        return view("dashboard.booking.index", compact("records", "new_records_count", "all_items", "items_count", "order_by", "order_type", "active_page"));
    }

    public function dashboard_single($id)
    {
        $record = Booking::find($id);
        $record->new = false;
        $record->save();

        return view("dashboard.booking.single", compact("record"));
    }

    public function store(Request $request)
    {
        $record = new Booking();
        $record->name = $request->name;
        $record->organization = $request->organization;
        $record->city = $request->city;
        $record->phone = $request->phone;
        $record->email = $request->email;
        $record->body = $request->body;
        $record->save();

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        // need to get in array because of foreach multiple delete
        $ids = [$request->id];
        $this->permanent_delete($ids);

        return redirect()->route("dashboard.booking.index");
    }

    public function remove_multiple(Request $request)
    {
        $this->permanent_delete($request->ids);

        return redirect()->back();
    }

    private function permanent_delete($ids)
    {
        foreach ($ids as $id) {
            $record = Booking::find($id);
            $record->delete();
        }
    }

}
