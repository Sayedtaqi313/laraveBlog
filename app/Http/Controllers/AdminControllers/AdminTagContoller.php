<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class AdminTagContoller extends Controller
{
    public function index() {
        $tags = Tag::paginate(10);
        return view('Admin.tags.index',compact('tags'));
    }

    public function show(Tag $tag) {
        
        return view('Admin.tags.show',compact('tag'));
    }

    public function destroy(Tag $tag) {
        $tag->posts()->detach();
        $tag->delete();
        return redirect()->route('admin.tags')->with('success','the tag have been deleted');
    }
}
