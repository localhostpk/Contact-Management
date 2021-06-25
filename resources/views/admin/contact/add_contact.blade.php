@extends('admin.layouts.head_foot')
@push('css')
 <link rel="stylesheet" href="{{asset('web/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('web/bower_components/select2/dist/css/select2.min.css')}}">
 @endpush
@section('body')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add User
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{'/dashboard'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Add User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Add User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           <div class="box box-primary">
            @if($errors->any())
          {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
          @endif
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"action="{{route('add.contact')}}" method="post">
              @csrf
              <div class="box-body">
                 <div class="form-group">
                <label>Select User</label>
                <select class="form-control select2" style="width: 100%;"name="user_id">
                   @foreach($us as $user)
                  <option  value="{{$user->id}}" @if(old("user_id")==$user->id)
                    selected="selected"
                    @endif
                    >
                    {{$user->name}}
                  </option>
                 @endforeach
                </select>
              </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Name:</label>
                  <input type="test" name="name" value="{{old('name')}}"  class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                </div>
                @if($errors->has('name'))
                <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address:</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                @if($errors->has('email'))
                <div class="text-danger">{{ $errors->first('email') }}</div>
                @endif
               <div class="form-group">
                  <label for="exampleInputEmail1">Phone No:</label>
                  <input type="test" name="phone_no" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone Number">
                </div>
                @if($errors->has('phone_no'))
                <div class="text-danger">{{ $errors->first('phone_no') }}</div>
                @endif
                <div class="form-group">
                  <label for="exampleInputEmail1">Country:</label>
                  <input type="test" name="contry" class="form-control" id="exampleInputEmail1" placeholder="Enter Contry">
                </div>
                @if($errors->has('contry'))
                <div class="text-danger">{{ $errors->first('contry') }}</div>
                @endif
                <div class="form-group">
                  <label for="exampleInputEmail1">City:</label>
                  <input type="test" name="city" class="form-control" id="exampleInputEmail1" placeholder="Enter City Name">
                </div>
                @if($errors->has('city'))
                <div class="text-danger">{{ $errors->first('city') }}</div>
                @endif
                <div class="form-group">
                  <label for="exampleInputEmail1">Address:</label>
                  <input type="test" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter Address">
                </div>
                @if($errors->has('address'))
                <div class="text-danger">{{ $errors->first('address') }}</div>
                @endif
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
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
<!-- Select2 -->
<script src="{{asset('web/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
@endpush
