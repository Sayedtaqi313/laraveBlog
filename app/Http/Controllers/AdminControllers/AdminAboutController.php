<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AdminAboutController extends Controller
{
    public function index() {
        $about = About::first();
        return view('Admin.about.index',compact('about'));
    }

    public function update(AboutRequest $request,About $about) {
        $imageOne = $request->file('imageOne');
        $imageTwo = $request->file('imageTwo');
        $pathOne = $imageOne->store('images/about/','public');
        $pathTwo = $imageTwo->store('images/about/','public');
        $about->update([
            "who_are_we" => $request->who_are_we,
            "our_mission" => $request->our_mission,
            "our_vision" => $request->our_vision,
            "our_service" => $request->our_service,
            "about_our_site" => $request->about_our_site,
            "imageOne" => $pathOne,
            "imageTwo" => $pathTwo
        ]);
        return redirect()->route('admin.about')->with('success','the operation was successfull');
    }
}
