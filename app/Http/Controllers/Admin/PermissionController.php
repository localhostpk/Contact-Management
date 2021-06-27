<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:super admin|view permission',['only'=>'allpermission']);
        $this->middleware('role_or_permission:super admin|create permission',['only'=>'createpermission','storepermission']);
        $this->middleware('role_or_permission:super admin|assign permission',['only'=>'assignpermissionform','assignpermission']);
        $this->middleware('role_or_permission:super admin|update permission',['only'=>'editpermission','updatepermission']);
        $this->middleware('role_or_permission:super admin|delete permission',['only'=>'deletepermission']);
    }

    public function createpermission()
    {
        return view('admin.permission.create_permission');
    }
    public function storepermission(Request $request)
    {
        //$per=Permission::all();
        //return $per;
        $request->validate([
        'name' => 'required',
         ]);
       $permission = Permission::create(['name' => $request->name]);
       return back();
    }
    public function assignpermissionform()
    {
        //return $user=User::find(5);
        $roles=Role::all();
        $permission=Permission::all();
        return view('admin.permission.assign_permission',compact('roles','permission'));
    }
    public function assignpermission(Request $request)
    {
        $roles=Role::find($request->role_id);
        $roles->syncPermissions($request->permission_id);
        return back();
    }
    public function allpermission()
    {
        $permissions=Permission::all();
        return view('admin.permission.all_permission',compact('permissions'));
    }
    public function editpermission($id)
    {
        //return $id;
        $permission=Permission::find($id);
        return view('admin.permission.edit_permission',compact('permission'));
    }

     public function updatepermission(Request $request, $id)
    {
        $permission=Permission::find($id);
        $permission->name=$request->name;
        $permission->save();
        return redirect()->route('all.permission');
    }

     public function deletepermission($id)
    {
        $permission=Permission::find($id);
        $permission->delete();
        return redirect()->route('all.permission');
    }
}
