<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Role;

class AdminRoleController extends Controller
{
    public function index() {
        $roles = Role::paginate(5);
        return view('Admin.roles.index',compact('roles'));
    }

    public function create() {
        $permissions = Permission::all();
        return view('Admin.roles.create',compact('permissions'));
    }

    public function store(RoleRequest $request) {
        $permissions = $request->input('permissions');
        $role = Role::create([
            "name" => $request->name
        ]);

        $role->permissions()->sync($permissions);
        return redirect()->route('admin.role.create')->with("success","the role added successfully");
    }

    public function edit(Role $role) {
        $permissions = Permission::all();
        return view('Admin.roles.edit',compact('permissions','role'));
    }

    public function update(Request $request, Role $role) {
      $validated =  $request->validate([
            "name" => "required"
        ]);

        $permissions = $request->input('permissions');
        $role->update($validated);

        $role->permissions()->sync($permissions);
        return redirect()->route('admin.role.edit',$role)->with("success","the role updated successfully");
    }

    public function delete(Role $role) {
        $role->delete();
        return redirect()->route('admin.roles')->with("success","the role deleted successfully");
    }
}
