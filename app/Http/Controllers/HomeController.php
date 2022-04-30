<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = \App\Slider::all();
        $categories = \App\Category::all();
        $items = \App\Item::all();
        return view('welcome',compact("sliders","categories","items"));
    }
}
