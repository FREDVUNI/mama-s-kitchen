<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items =  \App\Item::all();
        return view('admin.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =\App\Category::all();
        return view('admin.item.create',compact("categories"));
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
            "name" =>"required|unique:items",
            "category_id" =>"required",
            "description" =>"required",
            "price" =>"required",
            "image" =>"required|image|mimes:jpg,png,gif,jpeg|max:2048",
            "slug"=>""
        ]);

            $image = $request->file('image');
            $file = md5(microtime()).".".$image->getClientOriginalExtension();
            $image->move(public_path("/images/uploads/item"),$file);

        \App\Item::create([
            "name" => $request->name,
            "category_id" => $request->category_id,
            "description" => $request->description,
            "price" => $request->price,
            "slug" => str_slug($request->name),
            "image" => $file
        ]);
        return redirect()->route('item.index')->with('success','Success. The item has been added.');
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
        $item = \App\Item::FindOrFail($id);
        $categories =\App\Category::all();
        return view("admin.item.edit",compact("item","categories"));
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
        $data = $request->validate([
            "name" =>"required|unique:items",
            "category_id" =>"required",
            "description" =>"required",
            "price" =>"required",
            "image" =>"required|image|mimes:jpg,png,gif,jpeg|max:2048",
            "slug"=>""
        ]);

        $image = $request->file('image');
        $file = md5(microtime()).".".$image->getClientOriginalExtension();
        $image->move(public_path("/images/uploads/item"),$file);

        $path = public_path("images/uploads/item/");
        $item = \App\Item::FindOrFail($id);

        if($item->image != "" || $item->image != NULL):
            $old = $path.$item->image;
            unlink($old);
        endif;

        $item->update([
            "name"        => $request->name,
            "category_id" => $request->category_id,
            "description" => $request->description,
            "price"       => $request->price,
            "image"    => $file,
            "slug"     => str_slug($request->name)
        ]);

        return redirect()->route("item.index")->with("success","Success. The item has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = \App\Item::FindOrFail($id);
        $path = public_path("images/uploads/item/");

        if(file_exists("images/uploads/item/". $item->image)):
            $old = $path.$item->image;
            unlink($old);
        endif;

        $item->delete();
        return redirect()->route("item.index")->with("success","Success. The item has been deleted.");

    }
}
