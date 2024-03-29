<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
    public function dashboard()
    {
        
        if(auth()->user()->hasRole('super admin'))
        {

            $contacts=DB::table('contacts')->select('id')->count('id');
            $users=DB::table('users')->select('id')->count('id');
            $permissions=DB::table('permissions')->select('id')->count('id');
            $roles=DB::table('roles')->select('id')->count('id');
        }
        else
        { 
            $contacts=auth()->user()->contacts()->count();
            $users=auth()->user()->members()->count();
            $permissions=auth()->user()->permissions()->count();
            $roles=auth()->user()->roles()->count();
        
        }

        return view('dashboard',compact('contacts','users','permissions','roles'));
    }
}

