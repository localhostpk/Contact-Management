<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:super admin|contact view',['only'=>'index','show']);
        $this->middleware('role_or_permission:super admin|contact add',['only'=>'create','store']);
        $this->middleware('role_or_permission:super admin|contact update',['only'=>'edit','update']);
        $this->middleware('role_or_permission:super admin|contact delete',['only'=>'destroy']);
    }

    public function index()
    {
       $cont=Contact::all();
       return view('admin.contact.all_contact',compact('cont'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $us=User::all();
        return view('admin.contact.add_contact',compact('us'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cont=new Contact();
        $cont->user_id=$request->user_id;
        $cont->name=$request->name;
        $cont->email=$request->email;
        $cont->phone_no=$request->phone_no;
        $cont->contry=$request->contry;
        $cont->city=$request->city;
        $cont->address=$request->address;

        $cont->save();
        return back();
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
}
