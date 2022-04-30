<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =\App\Category::all();
        return view("admin.category.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.category.create");
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
            "name" =>"required|max:20|unique:categories",
            "slug"     =>"",
        ]);
        \App\Category::create([
            "name" => $request->name,
            "slug" => str_slug($request->name),
        ]);
        return redirect()->route("category.index")->with('success','Success. The category has been added.');
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
        $category = \App\Category::FindOrFail($id);
        return view("admin.category.edit",compact("category"));
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
            "name" =>"required|max:20|unique:categories",
            "slug"     =>"",
        ]);
        $category = \App\Category::FindOrFail($id);
        $category->update([
            "name" => $request->name,
            "slug" => str_slug($request->name),
        ]);
        return redirect()->route("category.index")->with('success','Success. The category has been updated.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = \App\Category::FindOrFail($id);
        $category->delete();
        return redirect()->route("category.index")->with('success','Success. The category has been deleted.');

    }
}
