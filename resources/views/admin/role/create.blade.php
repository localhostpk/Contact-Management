@extends('admin.layouts.head_foot')
@section('body')
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


	<div class="box-footer">
	    <form action="{{route('create.role')}}" method="post">
	    	<div class="row">
	    		@csrf
	    		<div class="col-md-4"></div>
		    	<div class="col-md-4">
			        <div class="input-group">
			        	<label>Role Name</label>
			            <input type="text" name="role_name" placeholder="Type Message ..." class="form-control">
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
