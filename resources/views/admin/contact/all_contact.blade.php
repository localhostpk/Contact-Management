@extends('admin.layouts.head_foot')
@push('css')
 <link rel="stylesheet" href="{{asset('web/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
 @endpush
@section('body')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        All Contact
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{'/dashboard'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> All Contact</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> All Contact</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
          <th> Id </th>
         <th> User Id</th>
         <th> Name</th>
         <th> Email</th>
         <th> Phone No</th>
         <th> Country</th>
         <th> City</th>
        <th> Address</th>
        <th>Actions</th>
                </tr>
                </thead>
                <tbody>
            
          @foreach($cont as $data)
         <tr> 
           <td class="table-success">{{$data->id}}</td>
            <td class="table-success">{{$data->user_id}}</td>
           <td>{{$data->name}}</td>
           <td>{{$data->email}}</td>
            <td>{{$data->phone_no}}</td>
            <td>{{$data->contry}}</td>
            <td>{{$data->city}}</td>
            <td>{{$data->address}}</td>
            <td><button class="btn btn-primary">Update</button>
              <br><button class="btn btn-danger">Update</button>
            </td>
         </tr>
        @endforeach
                    
                </tbody>
                <tfoot>
                <tr>
          <th> Id </th>
         <th> User Id</th>
         <th> Name</th>
         <th> Email</th>
         <th> Phone No</th>
         <th> Country</th>
         <th> City</th>
        <th> Address</th>
        <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
  @push('js')
  <script src="{{asset('web/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('web/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#example1').DataTable();
   
  })
</script>
@endpush