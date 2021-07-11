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
        Edit SMTP Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{'/dashboard'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit SMTP Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit SMTP Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           <div class="box box-primary">
            @if($errors->any())
          {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
          @endif
     
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"action="{{route('edit.smtp.details',$smtp->id)}}" method="post" enctype="multipart/form-data">
            	@csrf
              <div class="box-body">
                <div class="form-group">
                <label>Select Status</label>
                <select class="form-control select2" style="width: 100%;"name="status">
                  <option value="active" @if($smtp->status=="active")
                     selected="selected"
                    @endif> 
                    active
                  </option>
                   <option  value="dis-active" @if($smtp->status=="dis-active")
                     selected="selected"
                    @endif>
                    dis-active
                  </option>
                </select>
              </div>
              @if($errors->has('status'))
                <div class="text-danger">{{ $errors->first('status') }}</div>
                @endif
              	 <div class="form-group">
                  <label for="exampleInputEmail1">Transport</label>
                  <input type="text" class="form-control"name="transport" value="{{$smtp->transport}}" id="exampleInputEmail1" placeholder="Enter transport">
                </div>
                 @if($errors->has('transport'))
                <div class="text-danger">{{ $errors->first('transport') }}</div>
                @endif
                 <div class="form-group">
                  <label for="exampleInputEmail1">host</label>
                  <input type="text" class="form-control"name="host" value="{{$smtp->host}}" id="exampleInputEmail1" placeholder="Enter host">
                </div>
                 @if($errors->has('host'))
                <div class="text-danger">{{ $errors->first('host') }}</div>
                @endif
                 <div class="form-group">
                  <label for="exampleInputEmail1">port</label>
                  <input type="text" class="form-control"name="port"  value="{{$smtp->port}}"id="exampleInputEmail1" placeholder="Enter port">
                </div>
                 @if($errors->has('port'))
                <div class="text-danger">{{ $errors->first('port') }}</div>
                @endif
                 <div class="form-group">
                  <label for="exampleInputEmail1">Encryption</label>
                  <input type="text" class="form-control"name="encryption" value="{{$smtp->encryption}}" id="exampleInputEmail1" placeholder="Enter encryption type">
                </div>
                 @if($errors->has('encryption'))
                <div class="text-danger">{{ $errors->first('encryption') }}</div>
                @endif
                 <div class="form-group">
                  <label for="exampleInputEmail1">User Name</label>
                  <input type="text" class="form-control"name="username" value="{{$smtp->username}}" id="exampleInputEmail1" placeholder="Enter User Name">
                </div>
                 @if($errors->has('username'))
                <div class="text-danger">{{ $errors->first('username') }}</div>
                @endif
                 <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="text" class="form-control"name="password" value="{{$smtp->password}}" id="exampleInputEmail1" placeholder="Enter password">
                </div>
                 @if($errors->has('password'))
                <div class="text-danger">{{ $errors->first('password') }}</div>
                @endif
                <div class="form-group">
                  <label for="exampleInputEmail1">Timeout</label>
                  <input type="text" class="form-control"name="timeout" value="{{$smtp->timeout}}" id="exampleInputEmail1" placeholder="Enter timeout">
                </div>
                    <div class="form-group">
                  <label for="exampleInputEmail1">Auth mode</label>
                  <input type="text" class="form-control"name="auth_mode"  value="{{$smtp->auth_mode}}"id="exampleInputEmail1" placeholder="Enter auth_mode">
                </div>
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
