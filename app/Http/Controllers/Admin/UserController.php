<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:super admin|view user',['only'=>'index']);
        $this->middleware('role_or_permission:super admin|add user',['only'=>'create','store']);
        $this->middleware('role_or_permission:super admin|update user',['only'=>'edit','update']);
        $this->middleware('role_or_permission:super admin|delete user',['only'=>'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $us=User::all();
        return view('admin.user.all_user',compact('us'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $r=Role::all();
        return view('admin.user.add_user',compact('r'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $u=new User();
        $u->name=$request->name;
        $u->email=$request->email;
        $u->password=Hash::make($request->password);
        $u->save();
        $u->roles()->attach($request->role_id);
        //return $request;
        return view('admin.user.all_user');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$u->roles()->sync($request->role_id);
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
