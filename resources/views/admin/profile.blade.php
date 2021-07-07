@extends('admin.layouts.head_foot')
@section('body')
<div class="content-wrapper">
<section class="content">
  <section class="content-header">
      <h1>
        Admin Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{'/dashboard'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admin Profile</li>
      </ol>
    </section>
   <div class="box box-primary">
            <div class="box-body box-profile">
      <img class="profile-user-img img-responsive img-circle" src="{{'storage/upload/'.auth()->user()->profile_pic}}" alt="User profile picture">
              <h3 class="profile-username text-center">Admin Name:  {{Auth::user()->name}}</h3>
              <p class="text-muted text-center">Role: {{Auth::user()->getRoleNames()->first()}}</p>
              @if($errors->any())
          {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
          @endif
    <form role="form" action="{{route('profile.create')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="box-body">
                <div class="row">
                <div class="col-md-6 col-md-offset-3">
            
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter Name" 
                    name="name" value="{{Auth::user()->name}}"  autofocus>
                </div>
                 @if($errors->has('name'))
        <div class="text-danger">{{ $errors->first('name') }}</div>
      @endif
                <div class="form-group">
                  <label for="name">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter Email" 
                    name="email" value="{{Auth::user()->email}}"  autofocus>
                </div>
                 @if($errors->has('email'))
        <div class="text-danger">{{ $errors->first('email') }}</div>
      @endif
                <div class="form-group">
                  <label for="name">Profile Pic</label>
                  <input type="file" class="form-control" id="email" 
                    name="image"   autofocus>
                </div>   
                 @if($errors->has('image'))
        <div class="text-danger">{{ $errors->first('image') }}</div>
      @endif             
                 </div>
              <!-- /.box-body -->
          </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                   <div class="box-footer ">

                       <button type="submit" class="btn btn-primary " style="margin-left: -10px;">
                        <i class="fa fa-plus"></i> Update</button>
                     </div>
                </div>
                
              </div>
            </div>
            </form>
            </div>
            <!-- /.box-body -->
     </div>
 </section>
</div>
@include('sweetalert::alert')
@endsection