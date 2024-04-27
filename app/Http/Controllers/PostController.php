<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\CommentRequest;

class PostController extends Controller
{
    //
    public function showPost($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        $recentPosts = Post::orderBy('id', 'desc')->take(5)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(7)->get();
        $tags = Tag::all();
        return view('post', compact('post', 'categories', 'tags', 'recentPosts'));
    }

    public function addComment(Request $request)
    {
        $request->validate([
            'textComment' => 'required|min:10|max:200'
        ]);

        $post = Post::findOrFail($request->id);
        $res = $post->comments()->create([
            'textComment' => $request->textComment,
            'user_id' => auth()->id(),
            'post_id' => $request->id,
        ]);

        if (!$res) {
            return redirect('post/' . $post->slug . "#" . $post->id)->with('error', 'there is a problem please try again');
                 }
            return redirect('post/' . $post->slug . "#" . $post->id)->with('success', 'the comment added successfully');
            

    }
}
