<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = \App\Reservation::all();
        return view("admin/reservation/index",compact("reservations"));
    }
    public function status($status)
    {
        $reserve = \App\Reservation::FindOrFail($status);
        $reserve->status = True;
        $reserve->save();

        return redirect("admin/reservations")->with("success","Reservation status has been confirmed.");
    }
    public function destroy(\App\Reservation $status)
    {
        $status->delete();
        return redirect("admin/reservations")->with("success","Reservation status has been deleted.");

    }
    
}
