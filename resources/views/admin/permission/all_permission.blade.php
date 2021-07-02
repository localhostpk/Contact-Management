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
       All Permission
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{'/dashboard'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Permission</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Permission</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th> Permission ID </th>
              <th> Permission Name</th>
            <!--   <th>Actions</th> -->
                </tr>
                </thead>
                <tbody>
            
            @foreach($permissions as $permission)
        <tr> 
          <td class="table-success">{{$permission->id}}</td>
          <td>{{$permission->name}}</td>
          <!-- <td><a class="btn btn-primary" href="{{route('edit.permission',$permission->id)}}">Edit</a>
              <a class="btn btn-danger" href="{{route('delete.permission',$permission->id)}}">Delete</a>
            </td> -->
        </tr>
          @endforeach
                </tbody>
                <tfoot>
                <tr>
                 <th> Permission ID </th>
              <th> Permission Name</th>
             <!--  <th>Actions</th> -->
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