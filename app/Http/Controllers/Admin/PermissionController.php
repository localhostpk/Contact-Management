<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function createpermission()
    {
        return view('admin.permission.create_permission');
    }
    public function storepermission(Request $request)
    {
        //$per=Permission::all();
        //return $per;
       $permission = Permission::create(['name' => $request->permission_name]);
       return back();
    }
    public function assignpermissionform()
    {
        $roles=Role::all();
        $permission=Permission::all();
        return view('admin.permission.assign_permission',compact('roles','permission'));
    }
    public function assignpermission(Request $request)
    {
        $roles=Role::find($request->role_id);
        $permission=Permission::find($request->permission_id);
       //$roles->Permission()->sync($request->permission_id);
        return back();
    }
    public function allpermission()
    {
        $permission=Permission::all();
        return view('admin.permission.all_permission',compact('permission'));
    }
}
