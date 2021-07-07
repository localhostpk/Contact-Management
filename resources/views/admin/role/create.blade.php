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
        Create Role
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{'/dashboard'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Role</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Create Role</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           <div class="box box-primary">
            @if($errors->any())
          {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
          @endif
     
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"action="{{route('create.role')}}" method="post">
            	@csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Role Name</label>
                  <input type="text" class="form-control"name="name" id="exampleInputEmail1" placeholder="Enter Role Name">
                </div>
                 @if($errors->has('name'))
                <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
              </div>
         <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
    <!-- /.content -->
          </div>
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
