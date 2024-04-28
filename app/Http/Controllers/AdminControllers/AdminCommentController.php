<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index() {
        $comments = Comment::orderBy('id','desc')->paginate(10);
        return view('Admin.comments.index',compact('comments'));
    }

    public function create() {
        $posts = Post::pluck('id','title');
        return view('Admin.comments.create',compact('posts'));
    }
    
    public function store(CommentRequest $request) {
        $comment = Comment::create([
            "textComment" => $request->textComment,
            "post_id" => $request->post_id,
            "user_id" => auth()->user()->id
        ]);
        
        if($comment) {
            return redirect()->route('admin.comment.create')->with('success','the comment added successfully');
        }else {
            return redirect()->route('admin.comment.create')->with('error','there is a problem try again');
        }
    }
    public function edit(Comment $comment) {
        $posts = Post::pluck('id','title');
        return view('Admin.comments.edit',compact('comment','posts'));
    }

    public function update(CommentRequest $request,Comment $comment){
        $comment->update([
            "textComment" => $request->textComment,
            "post_id" => $request->post_id,
            "user_id" => auth()->user()->id
        ]);

        if($comment) {
           return redirect()->route('admin.comment.edit',$comment)->with('success','the comment updated successfully');
        }
    }

    public function delete(Comment $comment) {
        $comment->delete();
        return redirect()->route('admin.comments')->with('success','the comment deleted successfully');
    }
}
