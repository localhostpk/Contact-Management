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
        All Project Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{'/dashboard'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Project Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Project Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th> Id </th>
                  <th>Project Logo</th>
                  <th> Status</th>
                  <th> Project Name</th>
                  <th>Copy Right text</th>
                   <th>Actions</th>
                </tr>
                </thead>
                <tbody>
            @if(auth()->user()->hasRole('super admin'))
            @foreach($pro as $data)
                <tr>
                  <td>{{$data->id}}</td>
                  <td><img src="{{'storage/upload/'.$data->logo}}"/ class="profile-user-img img-responsive" style="width: 50px; height:50px"></td>
                  <td>{{$data->status}}</td>
                  <td>{{$data->pro_name}}</td>
                  <td>{{$data->copyright_text}}</td>
                  <td>
                    <a class="btn btn-primary" href="{{route('edit.project.details',$data->id)}}">Edit</a>
              <a class="btn btn-danger" href="{{route('delete.project.details',$data->id)}}">Delete</a>
            </td>
                </tr>
                @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>
                 <th> Id </th>
                  <th>Project Logo</th>
                  <th> Status</th>
                  <th> Project Name</th>
                  <th>Copy Right text</th>
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