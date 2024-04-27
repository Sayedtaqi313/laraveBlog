<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class TagController extends Controller
{
    //
    public function show(Tag $tag) {
        $posts = $tag->posts()->paginate(5);
        $recentPosts = Post::orderBy('id','desc')->take(5)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(7)->get();
        $tags = Tag::all();
        return view('tags.tag',compact('categories','posts','recentPosts','tags'));
    }
}
