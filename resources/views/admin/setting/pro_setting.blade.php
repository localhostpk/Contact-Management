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
        Project Setting
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{'/dashboard'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Project Setting</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Project Setting</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           <div class="box box-primary">
            @if($errors->any())
          {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
          @endif
     
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"action="{{route('add.project.details')}}" method="post" enctype="multipart/form-data">
            	@csrf
              <div class="box-body">
                <div class="form-group">
                <label>Select Status</label>
                <select class="form-control select2" style="width: 100%;"name="status">
                    
                  <option value="active">
                    active
                  </option>
                   <option  value="dis-active">
                    dis-active
                  </option>
            
                </select>
              </div>
              @if($errors->has('status'))
                <div class="text-danger">{{ $errors->first('status') }}</div>
                @endif
              	 <div class="form-group">
                  <label for="exampleInputEmail1">Project Name</label>
                  <input type="text" class="form-control"name="pro_name" id="exampleInputEmail1" placeholder="Enter Project Name">
                </div>
                 @if($errors->has('pro_name'))
                <div class="text-danger">{{ $errors->first('pro_name') }}</div>
                @endif
                <div class="form-group">
                  <label for="exampleInputEmail1">Copy Right text</label>
                  <input type="text" class="form-control"name="copyright_text" id="exampleInputEmail1" placeholder="Enter Copy Right test">
                </div>
                 @if($errors->has('copyright_text'))
                <div class="text-danger">{{ $errors->first('copyright_text') }}</div>
                @endif
                <div class="form-group">
                  <label for="name">Profile Pic</label>
                  <input type="file" class="form-control" id="email" 
                    name="logo"   autofocus>
                </div>   
                 @if($errors->has('logo'))
                 <div class="text-danger">{{ $errors->first('logo') }}</div>
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
