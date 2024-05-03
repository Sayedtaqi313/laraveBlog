<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCreateUserRequest;
use App\Http\Requests\AdminUpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
class AdminUserController extends Controller
{
    public function index()  {
        $users = User::paginate(10);
        return view('Admin.users.index',compact('users'));
    }

    public function create() {
        $roles = Role::pluck('id','name');
        return view('Admin.users.create',compact('roles'));
    }

    public function store(AdminCreateUserRequest $request) {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role_id" => $request->role_id
        ]);

        if($request->has('userImage')){
            $userImage = $request->file('userImage');
            $fileName = $userImage->getClientOriginalName();
            $fileEx = $userImage->getClientOriginalExtension();
            $filePath = $userImage->store('images/users','public');

            $user->image()->create([
                "name" => $fileName,
                "extension" => $fileEx,
                "path" => $filePath
            ]);
            return redirect()->route('admin.user.create')->with('success','the user added successfully');
        }
    }

    public function edit(User $user) {
        $roles = Role::pluck('id','name');
        return view('Admin.users.edit',compact('roles','user'));
    }

    public function update(AdminUpdateUserRequest $request,User $user) {
        if(trim($request->input('password')) == ""){
            $user->update([
                "name" => $request->name,
                "email" => $request->email,
                "role_id" => $user->role_id
            ]);
        }else {
            $validate = $request->validated();
            $validate['password'] = Hash::make($validate['password']);
            $user->update($validate);
        }

        if($request->has('userImage')){
            $oldImage = $user->image->path;
            unlink('storage/'.$oldImage);
            $userImage = $request->file('userImage');
            $filename = $userImage->getClientOriginalName();
            $fileEx = $userImage->getClientOriginalExtension();
            $path = $userImage->store('images/users/','public');
            $user->image()->update([
                "name" => $filename,
                "extension" => $fileEx,
                "path" => $path
            ]);
        }
        return redirect()->route('admin.user.edit',$user)->with('success','the user updated successfully');

    }

    public function show(User $user) {
        return view('Admin.users.show',compact('user'));
    }
    public function delete(User $user) {
        $user->delete();
        return redirect()->route('admin.users',$user)->with('success','the user deleted successfully');
    }
}
