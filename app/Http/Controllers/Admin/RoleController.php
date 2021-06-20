<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
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

}
