<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
       $slidercount = \App\Slider::count();
       $categorycount = \App\Category::count();
       $itemcount = \App\Item::count();
       $reservationcount =\App\Reservation::count();
       $reservations = \App\Reservation::where("status",FALSE)->get();
       return view('admin/dashboard',compact('slidercount','categorycount','itemcount','reservationcount','reservations')); 
    }
}
