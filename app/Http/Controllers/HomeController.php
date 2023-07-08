<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\CategoryPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function home()
    {
        $category = CategoryPost::all();
        $all_post = Post::all();        
        return view('pages.main')->with(compact('category','all_post'));
      
    }
    public function index()
    {
        return view('dashboard');
    }
    public function vuejs(){
        return view('vue.index');
    }
    public function test(){
        return view('vue.test');
    }
}
