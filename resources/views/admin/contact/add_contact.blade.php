@extends('admin.layouts.head_foot')
@section('body')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Contact
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{'/dashboard'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Contact</li>
      </ol>
    </section>

  <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('add.contact')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
              <div class="box-body">
                 <div class="form-group">
                <label>Select User</label>
                  <select class="form-control" name="user_id">
                  @foreach($us as $user)
                  <option value="{{$user->id}}">
                    {{$user->name}}
                  </option>
                   @endforeach
                  </select>
              </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Name:</label>
                  <input type="test" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address:</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Phone No:</label>
                  <input type="test" name="phone_no" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone Number">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Country:</label>
                  <input type="test" name="contry" class="form-control" id="exampleInputEmail1" placeholder="Enter Contry">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">City:</label>
                  <input type="test" name="city" class="form-control" id="exampleInputEmail1" placeholder="Enter City Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Address:</label>
                  <input type="test" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter Address">
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