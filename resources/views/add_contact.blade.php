<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <title> Contact Add</title>
</head>
<body>
<div class="container">
  <form action="{{route('add.usercontact',$qrcode->qr_code_string)}}" method="post">
    @csrf
    <h2>Contact Us</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="first">Name</label>
          <input type="text" class="form-control" placeholder="Enter your Name" name="name" id="first">
        </div>
      </div>
      @if($errors->has('name'))
        <div class="text-danger">{{ $errors->first('name') }}</div>
      @endif
      <!--  col-md-6   -->

      <div class="col-md-6">
        <div class="form-group">
          <label for="last">Email Address</label>
          <input type="email" class="form-control"name="email" placeholder="Enter Email" id="last">
        </div>
      </div>
      <!--  col-md-6   -->
      @if($errors->has('email'))
        <div class="text-danger">{{ $errors->first('email') }}</div>
      @endif
    </div>


    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="first">Phone Number</label>
          <input type="text" class="form-control" name="phone_no" placeholder="Enter your phone number" id="first">
        </div>
      </div>
      @if($errors->has('phone_no'))
        <div class="text-danger">{{ $errors->first('phone_no') }}</div>
      @endif
      <div class="col-md-6">
        <div class="form-group">
          <label for="company">Country</label>
          <input type="text" class="form-control" name="contry" placeholder="Enter your Country" id="company">
        </div>
      </div>
      @if($errors->has('contry'))
        <div class="text-danger">{{ $errors->first('contry') }}</div>
      @endif
      <!--  col-md-6   -->
    </div>
<div class="row">

        <div class="col-md-6">
        <div class="form-group">
          <label for="phone">City</label>
          <input type="text" class="form-control" name="city" id="phone" placeholder="Enter your City">
        </div>
      </div>
      @if($errors->has('city'))
        <div class="text-danger">{{ $errors->first('city') }}</div>
      @endif
      <!--  col-md-6   -->
       <div class="col-md-6">
        <div class="form-group">
          <label for="email">Address</label>
          <input type="text" class="form-control"name="address" id="email" placeholder="Enter your Address">
        </div>
      </div>
      @if($errors->has('address'))
        <div class="text-danger">{{ $errors->first('address') }}</div>
      @endif
    </div>
    <!--  row   -->
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</body>
</html>
