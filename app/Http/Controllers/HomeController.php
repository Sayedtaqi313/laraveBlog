<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Role;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Category;
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
    public function index()
    {

        $posts = Post::withCount('comments')->paginate(8);
        $recentPosts = Post::orderBy('id','desc')->take(5)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count','desc')->take(7)->get();
        $tags = Tag::all();
        return view('home',compact('posts','recentPosts','categories','tags'));
        
    }
}
