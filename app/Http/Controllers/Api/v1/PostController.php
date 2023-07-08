<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Post;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Storage;
use File;
class PostController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::with('category')->orderBy('id', 'DESC')->get();
        return view('layouts.post.index')->with(compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CategoryPost::all();
        return view('layouts.post.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->short_desc = $request->short_desc;
        $post->desc = $request->post_content;
        $post->post_category_id = $request->post_category_id;        
        if($request['image']){
           $image = $request['image'];
           $ext = $image->getClientOriginalExtension();
           $name = time().'_'.$image->getClientOriginalName();
           Storage::disk('public')->put($name,File::get($image));
           $post->image = $name;
        }else $post->image = 'default.jpg';

        $post->save();        
        return redirect()->route('post.index')->with('success','Add successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show($post)
    {
        $categories = CategoryPost::all();
        $editPost = Post::find($post);
        return view('layouts.post.show')->with(compact('editPost','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $post)
    {
        $data = $request->all();
        $updatePost = Post::find($post);        
        $updatePost->title = $data['title'];
        $updatePost->short_desc = $data['short_desc']; 
        $updatePost->desc = $data['post_content']; 
        $updatePost->post_category_id = $data['post_category_id'];
        if($request['image']){ 
            if($updatePost->image !== 'default.jpg') unlink('public/uploads/'.$updatePost->image);          
            $image = $request['image'];
            $ext = $image->getClientOriginalExtension();
            $name = time().'_'.$image->getClientOriginalName();
            Storage::disk('public')->put($name,File::get($image));
            $updatePost->image = $name;
            
        }      
        $updatePost->save();        
        return  redirect()->route('post.index')->with('success','Update successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post)
    {
        $path = 'public/uploads/';
        $Delpost = Post::find($post);
        if($Delpost->image !== 'default.jpg') unlink($path.$Delpost->image);
        $Delpost->delete();
        return redirect()->back();
    }
}
