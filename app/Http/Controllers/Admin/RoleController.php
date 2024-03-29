<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;



class RoleController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:super admin|view role',['only'=>'allrole']);
        $this->middleware('role_or_permission:super admin|create role',['only'=>'createrole','storerole']);
        $this->middleware('role_or_permission:super admin|assign role',['only'=>'assignroleform','assignrole']);
        $this->middleware('role_or_permission:super admin|update role',['only'=>'editrole','updaterole']);
        $this->middleware('role_or_permission:super admin|delete role',['only'=>'deleterole']);
    }

    public function createrole()
    {
        $permission=Permission::all();
        // Alert::alert('Well-Come', 'Role Added Form', 'info');
        //Alert::toast('Toast Message', 'Toast Type');
        return view('admin.role.create',compact('permission'));
    
    }
    public function storerole(Request $request)
    {
    
         $request->validate([
         'name' => 'required|unique:roles',
         ]);
        $role = Role::create(['name' => $request->name]);
        $role->permissions()->sync($request->permission_id);
         Alert::success('Successfully', 'Role Added');
       // Alert::toast('Successfully', 'Role Added');

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
        Alert::success('Successfully', 'Role Assign');
        return back();
    }
    public function allrole()
    {
    
        $roles=Role::all();
        return view('admin.role.all_role',compact('roles'));
    }
    
    public function editrole($id)
    {
      $role=Role::find($id);
      return view('admin.role.edit_role',compact('role'));
    }

    public function showRole($id)
    {
      $role=Role::find($id);
      $permissions = Permission::all();
      $roleHasPermissions = DB::table('role_has_permissions')
                            ->select(['*'])->where('role_id',$id)->get();
        Alert::success('Successfully', 'Assign Permission to Role');
      return view('admin.role.role_to_permission',compact('role', 'permissions', 'roleHasPermissions'));
    }

    public function updaterole( Request $request, $id)
    {
        $role=Role::find($id);
        $role->name=$request->name;
        $role->save();
        Alert::info('Successfully', 'Role updated');
        return redirect()->route('all.role');
    }

    public function deleterole($id)
    {
        $role=Role::find($id);
        $role->delete();
        Alert::warning('Delete Role', 'Role deleted');
        return redirect()->route('all.role');
    }
}
