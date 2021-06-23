@extends('admin.layouts.head_foot')
@section('body')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Permission Assign
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{'/dashboard'}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Assign Permission</li>
      </ol>
    </section>


	<div class="box-footer">
	    <form action="{{route('assign.permission')}}" method="post">
	    	@csrf
	    	<div class="row">
	    		<div class="col-md-4"></div>
		    	<div class="col-md-4">
			        <div class="input-group">
			        	<label>Select Permission</label>
			        	<select class="form-control" name="permission_id">
			        		@foreach($permission as $per)
			        		<option value="{{$per->id}}">
			        			{{$per->name}}
			        		</option>
			        		@endforeach
			        	</select>
			            
			        </div>
			    </div>
			    <div class="col-md-4"></div>
			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
			        <div class="input-group">
			        	<label>Select Role</label>
			            <select class="form-control" name="role_id">
			            @foreach($roles as $role)
			            <option value="{{$role->id}}">
			            	{{$role->name}}
			            </option>
			            @endforeach
			            </select>
			        </div>
			    </div>

			    <div class="col-md-4"></div>
		    </div> 
		    <br>
		    <div class="row">
				<div class="col-md-4"></div>
			    <div class=" col-md-4">
			        <div class="input-group">
			            <input type="submit" value="Submit" class="form-control">
			        </div>
			    </div>

			    <div class="col-md-4"></div>
		    </div> 
	    </form>
	</div>
</div>
@endsection
