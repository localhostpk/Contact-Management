<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:super admin|view role',['only'=>'allrole']);
        $this->middleware('role_or_permission:super admin|create role',['only'=>'createrole','storerole']);
        $this->middleware('role_or_permission:super admin|assign role',['only'=>'assignroleform','assignrole']);
        $this->middleware('role_or_permission:super admin|update role',['only'=>'edit','update']);
        $this->middleware('role_or_permission:super admin|delete role',['only'=>'destroy']);
    }

    public function createrole()
    {
        return view('admin.role.create');
    }
    public function storerole(Request $request)
    {
        $role = Role::create(['name' => $request->role_name]);
        return back();
    }
    public function assignroleform()
    {
       $roles=Role::all(); 
        $users=User::all();
        return view('admin.role.assign_role',compact('users','roles'));
    }
    public function assignrole(Request $request)
    {
        $user=User::find($request->user_id);
        $role=Role::find($request->role_id);
        $user->assignRole($role);
        return back();
    }
    public function allrole()
    {
        $role=Role::all();
        return view('admin.role.all_role',compact('role'));
    }
    

}
