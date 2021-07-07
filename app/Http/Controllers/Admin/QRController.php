<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\QrCode;
use RealRashid\SweetAlert\Facades\Alert;
class QRController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:super admin|view qr',['only'=>'index']);
        $this->middleware('role_or_permission:super admin|create qr',['only'=>'create','store']);
        $this->middleware('role_or_permission:super admin|update qr',['only'=>'edit','update']);
        $this->middleware('role_or_permission:super admin|delete qr',['only'=>'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $qr=QrCode::all();
       $user=User::find($request->user_id);
       return view('admin.qr.all_qr_codes',compact('qr','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Responses
     */
    public function create()
    {
      
          if(auth()->user()->hasRole('super admin')){
       $users=User::all();
        }
        else{
        
        $users=auth()->user()->members()->get();
       }
    
        return view('admin.qr.genrate_qr_codes',compact('users'));
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
        'timelimit' => 'required',
        'user_id' => 'required',
         ]);
        $user=User::find($request->user_id);
         if($user->qrcode){
            $user->qrcode->delete();
        }
        $user->qrcode()->create(['timelimit'=>$request->timelimit]);
            Alert::success('Successfully', 'QrCode Genrate');
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
