@extends('admin.layouts.head_foot')
@section('body')
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
    <div class="box-body table-responsive no-padding">
    <table class="table table-responsive">
         <thead>
            <tr class="table-info" style="text-decoration-style: bold">
              <th> Permission ID </th>
              <th> Permission Name</th>
            </tr>
          </thead>
     <tbody>
          @foreach($permission as $data)
        <tr> 
          <td class="table-success">{{$data->id}}</td>
          <td>{{$data->name}}</td>
        </tr>
          @endforeach
      </tbody>
  </table>
</div>
</div>
@endsection