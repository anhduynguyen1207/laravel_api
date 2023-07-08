<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Session;
class CategoryPostController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = CategoryPost::all();
        return view('layouts.category.index')->with(compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new CategoryPost();
        $category->title = $request->get('title');      
        $category->save();
        return redirect()->route('category.index')->with('success','Add successfully!!');
       
    }

    /**
     * Display the specified resource.
     */
    public function show($categoryPost)
    {
        $editCategory = CategoryPost::find($categoryPost);;
        return view('layouts.category.show')->with(compact('editCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $categoryPost)
    {
        
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $categoryPost)
    {
        $data = $request->all();
        $category = CategoryPost::find($categoryPost);        
        $category->title = $data['title'];      
        $category->save();        
        return  redirect()->route('category.index')->with('success','Update successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($categoryPost)
    {
        $category = CategoryPost::find($categoryPost);
        $category->delete();
        return redirect()->back();
    }
}
