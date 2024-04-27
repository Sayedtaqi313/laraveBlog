<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::withCount('posts')->get();
        return view('categories.index',compact('categories'));
    }
    public function show(Category $category) {
        $posts = $category->posts()->paginate(5);
        $recentPosts = Post::orderBy('id','desc')->take(5)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(7)->get();
        $tags = Tag::all();
        return view('categories.category',compact('categories','posts','recentPosts','tags'));
    }
}
