<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
 
    public function index()
    {
        $categories = Category::paginate(10);
        return view('Admin.categories.index',compact('categories'));
    }


    public function create()
    {
        return view('Admin.categories.create');
    }


    public function store(CategoryRequest $request)
    {
        $category = Category::create([
            "name" => $request->name,
            "slug" => Str::slug($request->name),
            "user_id" => auth()->user()->id
        ]);
        if($category) {
            return redirect()->route('admin.categories.create')->with('success','the category created successfully');
        }else {
            return redirect()->route('admin.categories.create')->with('error','there is a problem try again');
        }
    }

 
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('Admin.categories.show',compact('category'));
    }


    public function edit( $id)
    {   

        $category = Category::findOrFail($id);
        if($category) {
            return view('Admin.categories.edit',compact('category'));
        }else {
            return abort(404);
        }
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = Category::findorFail($id);
        if($category) {
            $category->update([
                "name" => $request->name,
                "slug" => Str::slug($request->name),
                "user_id" => auth()->user()->id
            ]);
            return redirect()->route('admin.categories.edit',$category->id)->with('success','the category updated successfully');
        }else {
            return abort(404);
        }
    }

 
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category_id = Category::where('name' , '=' , 'Uncategorized')->first()->id;
        $category->posts()->update(['category_id' => $category_id]);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success','the category deleted successfully');
    }
}
