<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders =  \App\Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "title" =>"required|unique:sliders",
            "subtitle" =>"required",
            "image" =>"required|image|mimes:jpg,png,gif,jpeg|max:2048",
            "slug"=>""
        ]);

            $image = $request->file('image');
            $file = md5(microtime()).".".$image->getClientOriginalExtension();
            $image->move(public_path("/images/uploads/slider"),$file);

        \App\Slider::create([
            "title" => $request->title,
            "subtitle" => $request->subtitle,
            "slug" => str_slug($request->title),
            "image" => $file
        ]);
        return redirect()->route('slider.index')->with('success','Success. The slider has been added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
        $slider = \App\Slider::FindOrFail($id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "title" =>"required",
            "subtitle" =>"required",
            "image" =>"image|mimes:jpg,png,gif,jpeg|max:2048",
            "slug"=>""
        ]);

        $image = $request->file('image');
        $file = md5(microtime()).".".$image->getClientOriginalExtension();
        $image->move(public_path("/images/uploads/slider"),$file);

        $path = public_path("images/uploads/slider/");
        $slider = \App\Slider::FindOrFail($id);

        if($slider->image != "" || $slider->image != NULL):
            $old = $path.$slider->image;
            unlink($old);
        endif;

        $slider->update([
            "title"    => $request->title,
            "subtitle" => $request->subtitle,
            "image"    => $file,
            "slug"     => str_slug($request->title)
        ]);

        return redirect()->route("slider.index")->with("success","Success. The slider has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = \App\Slider::FindOrFail($id);
        $path = public_path("images/uploads/slider/");

        if(file_exists("images/uploads/slider/". $slider->image)):
            $old = $slider->image;
            unlink($path.$old);
        endif;

        $slider->delete();

        return redirect()->back()->with("success","Success. The slider has been deleted.");
    }
}
