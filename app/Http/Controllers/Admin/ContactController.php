<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;
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
        $this->middleware('role_or_permission:super admin|view contact',['only'=>'index','show']);
        $this->middleware('role_or_permission:super admin|add contact',['only'=>'create','store']);
        $this->middleware('role_or_permission:super admin|update contact',['only'=>'edit','update']);
        $this->middleware('role_or_permission:super admin|delete contact',['only'=>'destroy']);
    }

    public function index()
    {
        if(auth()->user()->hasRole('super admin')){
       $cont=Contact::all();
        }
        else{
        
        $cont=auth()->user()->contacts()->get();
       }
       return view('admin.contact.all_contact',compact('cont'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->hasRole('super admin')){
            $us=User::all();
        }
      
        else{
           $us=auth()->user()->members()->get();
        }
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
        $request->validate([
        'name' => 'required',
        'email' => 'required',
        'phone_no' => 'required',
        'contry' => 'required',
        'city' => 'required',
        'address' => 'required',
         ]);
        $cont=new Contact();
        $cont->user_id=$request->user_id;
        $cont->name=$request->name;
        $cont->email=$request->email;
        $cont->phone_no=$request->phone_no;
        $cont->contry=$request->contry;
        $cont->city=$request->city;
        $cont->address=$request->address;

        $cont->save();
          Alert::success('Successfully', 'Contact Added');
        return redirect()->route('all.contact');
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
        $users=User::all();
        $contact=Contact::find($id);
        return view('admin.contact.edit_contact',compact('contact','users'));
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
        $contact=Contact::find($id);
        $contact->user_id=$request->user_id;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->phone_no=$request->phone_no;
        $contact->contry=$request->contry;
        $contact->city=$request->city;
        $contact->address=$request->address;

        $contact->save();
          Alert::success('Successfully', 'Contact Update');
        return redirect()->route('all.contact');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact=Contact::find($id);
        $contact->delete();
          Alert::warning('Deleted', 'Contact Deleted');
        return redirect()->route('all.contact');
    }
    public function contact_tree_view()
    {
      if(auth()->user()->hasRole('super admin')){
        
        $users=User::wherehas('roles',function($q){
            $q->where('name','city admin');
        })->with(['members','members.contacts'])->get();

        }
      
        else{
           $users=auth()->user()->members()->with(['members','members.contacts'])->get();
        }
       
        return view('admin.contact.tree_view',compact('users'));
    }
}
