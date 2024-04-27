<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AdminPostsController extends Controller
{
    public function index() {
        $posts = Post::paginate(10);
        return view('Admin.posts.index',compact('posts'));
    }

    public function create() {
        $categories = Category::pluck('id','name');
        return view('Admin.posts.create',compact('categories'));
    }

    public function store(PostRequest $postRequest) {
        $post = Post::create([
            "title" => $postRequest->title,
            "slug" => Str::slug($postRequest->title),
            "excerpt" => $postRequest->excerpt,
            "body" => $postRequest->body,
            "user_id" => auth()->user()->id,
            "category_id" => $postRequest->category_id
        ]);
        if($post && $postRequest->has('thumbnail')) {
            $thumbnail = $postRequest->file('thumbnail');
            $filename = $thumbnail->getClientOriginalName();
            $fileEx = $thumbnail->getClientOriginalExtension();
            $path = $thumbnail->store('images/posts','public');
            $post->image()->create([
                "name" => $filename,
                "extension" => $fileEx,
                "path" => $path
            ]);

            return redirect()->route('admin.post.create')->with('success','the post added successfully');
        }else {
            return redirect()->route('admin.post.create')->with('error','there is a error occured !');
        }
    }

    public function edit(Post $post) {
        $categories = Category::pluck('id','name');
        return view('Admin.posts.edit',compact('post','categories'));
    }

    public function update(PostUpdateRequest $request,Post $post) {
        $post->update([
            "title" => $request->title,
            "slug" => Str::slug($request->title),
            "excerpt" => $request->excerpt,
            "body" => $request->body,
            "category_id" => $request->category_id,
        ]);
        
            if($request->has('thumbnail')){
                $oldImage = $post->image->path;
                unlink('storage/'.$oldImage);
                $thumbnail = $request->file('thumbnail');
                $filename = $thumbnail->getClientOriginalName();
                $fileEx = $thumbnail->getClientOriginalExtension();
                $path = $thumbnail->store('images/posts','public');
                $post->image()->update([
                    "name" => $filename,
                    "extension" => $fileEx,
                    "path" => $path
                ]);

                return redirect()->route('admin.post.edit',$post)->with('success','the post updated successfully');
            }
            return redirect()->route('admin.post.edit',$post)->with('success','the post updated successfully');

    }

    public function delete(Post $post) {
        if($post){
            $post->delete();
            return redirect()->route('admin.posts')->with('success','the post deleted successfully');
        }else {
            abort(404);
        }
    }
}
