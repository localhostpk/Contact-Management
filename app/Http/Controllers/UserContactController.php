<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\QrCode;
use RealRashid\SweetAlert\Facades\Alert;

class UserContactController extends Controller
{
    public function index()
    {
        //
    }
    public function create($token)
    {
        $qrcode=QrCode::where('qr_code_string',$token)
        ->wherehas('user')
        ->firstorfail();
        $hours=$qrcode->created_at->diffInHours(now());
        if($hours > $qrcode->timelimit){
            throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
        }
        return view('add_contact',compact('qrcode'));
    }
    public function store(Request $request,$token)
    {
        $request->validate([
        'name' => 'required',
        'email' => 'required',
        'phone_no' => 'required|unique:contacts',
        'contry' => 'required',
        'city' => 'required',
        'address' => 'required',
         ]);
        $qrcode=QrCode::where('qr_code_string',$token)
        ->wherehas('user')
        ->firstorfail();

        $cont=new Contact();
        $cont->name=$request->name;
          $cont->user_id=$qrcode->user_id;
        $cont->email=$request->email;
        $cont->phone_no=$request->phone_no;
        $cont->contry=$request->contry;
        $cont->city=$request->city;
        $cont->address=$request->address;

        $cont->save();
        Alert::success('Successfully', 'Contact Added');
        return back();

    }
    public function viewQR($token)
    {
         return \QrCode::size(300)
                     ->generate(route('add.usercontact',$token));
    }
}

