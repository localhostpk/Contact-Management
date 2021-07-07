<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\UserMember;
use App\Models\QrCode;
use RealRashid\SweetAlert\Facades\Alert;

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
        if(auth()->user()->hasRole('super admin')){
            $us=User::all();
        }
      
        else{
           $us=auth()->user()->members()->with('members')->get();
        }
        
        return view('admin.user.all_user',compact('us'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       if(auth()->user()->hasRole('super admin')){
            $users=User::wherehas('roles',function($q){
            $q->where('name','city admin');
        })->get();
        }
        else{
           $users=auth()->user()->members()->wherehas('roles',function($q){
            $q->where('name','city admin');
            })->get();
        }
        
        
        $r=Role::all();
        return view('admin.user.add_user',compact('r','users'));
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
        'password' => 'required',
         ]);
      
        $us=new User();
        $us->name=$request->name;
        $us->email=$request->email;
        $us->password=Hash::make($request->password);
        $us->save();
        $us->roles()->attach($request->role_id);
        if(!auth()->user()->hasRole('super admin') && empty($request->user_id)){
        UserMember::create(['city_admin_id'=>auth()->user()->id,'user_id'=>$us->id]);
        
        }
        else{
        UserMember::create(['city_admin_id'=>$request->user_id,'user_id'=>$us->id]);
        }
        Alert::success('Successfully', 'User Added');
        return redirect()->route('all.user');
        
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
        $users=User::wherehas('roles',function($q){
            $q->where('name','city admin');
        })->get();
        $r=Role::all();
        $user=User::find($id);
        return view('admin.user.edit_user',compact('user','r','users'));
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
        
        $user=User::find($id);
         $user->name=$request->name;
        $user->email=$request->email;
        if($request->password){
           $user->password=Hash::make($request->password);   
        }
      
        $user->save();
        Alert::success('Successfully', 'User Update');
        return redirect()->route('all.user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        Alert::warning('Delete User', 'User deleted');
        return redirect()->route('all.user');
    }
    public function generate($id)
    {
        $user=User::find($id);
        if($user->qrcode){
            $user->qrcode->delete();
        }
        $user->qrcode()->create();
        Alert::info('Successfully', 'Generate QrCode');
        return back();
    }
    public function user_tree_view()
    {
      if(auth()->user()->hasRole('super admin')){
        
        $users=User::wherehas('roles',function($q){
            $q->where('name','city admin');
        })->get();

        }
      
        else{
           $users=auth()->user()->members()->with('members')->get();
        }
        
        return view('admin.user.tree_view',compact('users'));
    }

    public function edit_qr_link(Request $request,$id)
    {
        $qrcode=QrCode::findorfail($id);
        $qrcode->created_at=now();
        $qrcode->timelimit=$request->timelimit;
        $qrcode->save();
        Alert::success('Successfully', 'Update QrCode Link');
        return back();
    }
     public function view_edit_qr_link(Request $request,$id)
    {
     return view('admin.qr.edit_link_qrcode',compact('id'));
    }
}
