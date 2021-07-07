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
        All Users
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{'/dashboard'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th> Id </th>
                  <th> User Name</th>
                  <th> User Email</th>
                  <th>Role</th>
                  <th>City Admin</th>
                  <th>Members</th>
                 <!--  <th>Ref URL</th> -->
                   <th>Actions</th>
                </tr>
                </thead>
                <tbody>
            @if(auth()->user()->hasRole('super admin'))
            @foreach($us as $data)
                <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->name}}
                  </td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->getRoleNames()->first()}}</td>
                  <td>{{optional($data->cityAdmin)->name}}</td>
                  <td>{{$data->members->count()}}</td>
                 <!--  <td>@if($data->qrcode)
                    {{route('add.usercontact',$data->qrcode->qr_code_string)}}
                    @endif
                    </td> -->
                  <td>
                    
                     <!--  <a  class="btn btn-success" href="{{route('generate.qr_code.user',$data->id)}}">Generate Link & QRCode</a>
                    @if($data->qrcode)
                         <a  class="btn btn-success" href="{{route('qr_code.view',$data->qrcode->qr_code_string)}}">View QRCode</a>
                    @endif -->
                    <a class="btn btn-primary" href="{{route('edit.user',$data->id)}}">Edit</a>
              <a class="btn btn-danger" href="{{route('destroy.user',$data->id)}}">Delete</a>
            </td>
                </tr>
                @endforeach
                @else
                @include('admin.user.index',['members'=>$us])
              
                @endif
                </tbody>
                <tfoot>
                <tr>
                  <th> Id </th>
                  <th> User Name</th>
                  <th> User Email</th>
                  <th>Role</th>
                  <th>City Admin</th>
                  <th>Members</th>
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
@include('sweetalert::alert')
@endpush