@extends('admin.layouts.head_foot')
@section('body')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add User
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{'/dashboard'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add User</li>
      </ol>
    </section>

  <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('add.user')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Select Role</label>
                 <select class="form-control" name="role_id">
                  @foreach($r as $role)
                  <option value="{{$role->id}}">
                    {{$role->name}}
                  </option>
                  @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="test" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
    </div>
    @endsection