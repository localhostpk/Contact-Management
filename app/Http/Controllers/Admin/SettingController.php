<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting;
use App\Models\Smtp;
use Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:super admin|view project details',['only'=>'all_project_details']);
        $this->middleware('role_or_permission:super admin|add project details',['only'=>'project_details','add_project_details']);
        $this->middleware('role_or_permission:super admin|update project details',['only'=>'edit_project_details','update_project_details']);
        $this->middleware('role_or_permission:super admin|delete project details',['only'=>'project_details_destroy']);

        $this->middleware('role_or_permission:super admin|view smtp',['only'=>'all_smtp_details']);
        $this->middleware('role_or_permission:super admin|add smtp ',['only'=>'project_smtp','add_project_details']);
        $this->middleware('role_or_permission:super admin|update smtp ',['only'=>'edit_smtp_details','update_project_details']);
        $this->middleware('role_or_permission:super admin|delete smtp ',['only'=>'project_smtp_destroy']);
        $this->middleware('role_or_permission:super admin|website maintenance ',['only'=>'maintenance','storemaintenance']);
    }
    public function project_details()
    {
        return view('admin.setting.pro_setting');
    }
    public function add_project_details(Request $request)
    {
         $request->validate([
        'pro_name' => 'required',
        'copyright_text' => 'required',
        'logo' => 'required',
        'status' => 'required',
         ]);

        $project=new setting();
        $project->status=$request->status;
        $project->pro_name=$request->pro_name;
        $project->copyright_text=$request->copyright_text;

        $imagename=$request->logo->getClientOriginalName();
        $request->logo->storeAs('public/upload/',$imagename);
        $project->logo=$imagename;
        $project->save();

          Alert::success('Successfully', 'Project Destails Added');
       return back();
    }
    public function all_project_details(Request $request)
    {
        $pro=setting::all();
        return view('admin.setting.all_project_details',compact('pro'));
    }

    public function edit_project_details($id)
    {
         $project=setting::find($id);
        return view('admin.setting.edit_project_details',compact('project'));
    }

    public function update_project_details(Request $request,$id)
    {
        $project=setting::find($id);
        $project->status=$request->status;
        $project->pro_name=$request->pro_name;
        $project->copyright_text=$request->copyright_text;
          if($request->hasFile('logo'))
        {
       
              Storage::delete('public/upload/'.$project->logo);
      
        $imagename=$request->logo->getClientOriginalName();
        $request->logo->storeAs('public/upload/',$imagename);
        $project->logo=$imagename;
        }

          $project->save();
        Alert::success('Successfully', 'Project Details Update');
        return redirect()->route('all.project.details');
    }

    public function project_details_destroy($id)
    {
        $pro=setting::find($id);
        $pro->delete();
        Alert::warning('Delete Project Destails', 'Details deleted');
        return redirect()->route('all.project.details');
    }


    public function smtp_details()
    {
        return view('admin.setting.add_smtp_details');
    }

    public function store_smtp_details(Request $request)
    {
         $request->validate([
        'status' => 'required',
        'transport' => 'required',
        'host' => 'required',
        'port' => 'required',
        'encryption' => 'required',
        'username' => 'required',
        'password' => 'required',
         ]);
         $smtp=new Smtp();
         $smtp->status=$request->status;
         $smtp->transport=$request->transport;
         $smtp->host=$request->host;
         $smtp->port=$request->port;
         $smtp->encryption=$request->encryption;
         $smtp->username=$request->username;
         $smtp->password=$request->password;
         $smtp->timeout=$request->timeout;
         $smtp->auth_mode=$request->auth_mode;
         $smtp->save();
          Alert::success('Successfully', 'SMTP Destails Added');
       return back();
    }

    public function all_smtp_details(Request $request)
    {
        $smtp=Smtp::all();
        return view('admin.setting.all_smtp_details',compact('smtp'));
    }
    public function edit_smtp_details($id)
    {
        $smtp=Smtp::find($id);
        return view('admin.setting.edit_smtp_details',compact('smtp'));
        
    }
    public function update_smtp_details(Request $request ,$id)
    {
        $smtp=Smtp::find($id);
        $smtp->status=$request->status;
         $smtp->transport=$request->transport;
         $smtp->host=$request->host;
         $smtp->port=$request->port;
         $smtp->encryption=$request->encryption;
         $smtp->username=$request->username;
         $smtp->password=$request->password;
         $smtp->timeout=$request->timeout;
         $smtp->auth_mode=$request->auth_mode;
         $smtp->save();
        Alert::success('Successfully', 'SMTP Details Update');
        return redirect()->route('all.smtp.details');
    }
    public function project_smtp_destroy()
    {
        $smtp=setting::find($id);
        $smtp->delete();
        Alert::warning('Delete SMTP Destails', 'SMTP deleted');
        return redirect()->route('all.smtp.details');
    }
    public function maintenance()
    {
        return view('admin.setting.maintenance');
    }
     public function storemaintenance(Request $request)
    {
        
        if($request->status=="down"){
            $command = 'down --secret='.$request->password;
        }else{
            $command = 'up';
        }
    
                Artisan::call($command);
        return back();
    }
}

