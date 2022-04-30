<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "rname" =>"required",
            "remail" =>"required|email",
            "date_time" =>"required",
            "rmessage" =>"required",
            "phone" =>"required",
        ]); 
        $reservation = new \App\Reservation();
        $reservation->name = $request->rname;
        $reservation->phone = $request->phone;
        $reservation->email = $request->remail;
        $reservation->message = $request->rmessage;
        $reservation->date_time = $request->date_time;
        $reservation->status = False;
        $reservation->save();

        Toastr::success("Reservation has been sent. We will confirm it shortly.",'Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
