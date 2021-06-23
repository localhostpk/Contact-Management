
@extends('admin.layouts.head_foot')
@section('body')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Contact
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{'/dashboard'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Contact</li>
      </ol>
    </section>
    <div class="box-body table-responsive no-padding">
 <table class="table table-responsive">
     <thead>
       <tr class="table-info" style="text-decoration-style: bold">
         <th> Id </th>
         <th> User Id</th>
         <th> Name</th>
         <th> Email</th>
         <th> Phone No</th>
         <th> Country</th>
         <th> City</th>
        <th> Address</th>
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
         </tr>
        @endforeach
                    
      </tbody>

   </table>
</div>
</div>
@endsection