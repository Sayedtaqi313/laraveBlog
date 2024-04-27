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
        //
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
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
