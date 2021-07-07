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
        All Qr Codes
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{'/dashboard'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Qr Codes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Qr Codes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th> Id </th>
                  <th>Genrate QR</th>
                  <th>User name</th>
                  <th>URL</th>
                  <th>Time limit</th>
                   <th>Actions</th>
                </tr>
                </thead>
                <tbody>
            @foreach($qr as $data)
                <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->qr_code_string}}</td>
                  <td>{{optional($data->user)->name}}</td>
                  <td>
           {{-- $data->created_at->diffInHours(now()) --}}
                     
        @if( $data->created_at->diffInHours(now()) < $data->timelimit)

        <a href="{{route('add.usercontact',$data->qr_code_string)}}">{{route('add.usercontact',$data->qr_code_string)}}
        @else
          <a  class="btn btn-info" href="{{route('edit.qr_code.user',$data->id)}}">Genrate QRCode</a>

        @endif
            
                    </td>
                  <td>{{$data->timelimit}}-Hr</td>
                  <td><a  class="btn btn-success" href="{{route('qr_code.view',$data->qr_code_string)}}">View QRCode</a>
         
                
                   </td>
                </tr>
              @endforeach
                </tbody>
                <tfoot>
                <tr>
                   <th> Id </th>
                  <th>Genrate QR</th>
                  <th>User name</th>
                  <th>URL</th>
                  <th>Time limit</th>
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