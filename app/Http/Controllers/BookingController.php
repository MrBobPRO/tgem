<?php

namespace App\Http\Controllers;

use App\Mail\Booking as MailBooking;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function email(Request $request)
    {
        Mail::to('boburjon_n@mail.ru')->send(new MailBooking($request));

        return redirect()->back();
    }

}
