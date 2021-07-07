<!DOCTYPE html>
<html>
  <head>
    <title>Madani Contact Form</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      min-height: 100%;
      padding: 0;
      margin: 0;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      }
      h1 {
      margin: 0 0 20px;
      font-weight: 400;
      color: #1c87c9;
      text-align: center;
      }
      .main-block {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: white;
      }
      form {
      padding: 25px;
      margin: 25px;
      border: solid black;
      background: white; 
      }
      .fas {
      margin: 25px 10px 0;
      font-size: 72px;
      color: #fff;
      }
      .fa-envelope {
      transform: rotate(-20deg);
      }
      .fa-at , .fa-mail-bulk{
      transform: rotate(10deg);
      }
      input, textarea {
      width: calc(100% - 18px);
      padding: 8px;
      margin-bottom: 20px;
      border: 1px solid #1c87c9;
      outline: none;
      }
      input::placeholder {
      color: #666;
      }
      button {
      width: 100%;
      padding: 10px;
      border: none;
      background: #1c87c9; 
      font-size: 16px;
      font-weight: 400;
      color: #fff;
      }
      button:hover {
      background: #2371a0;
      }    
      @media (min-width: 568px) {
      .main-block {
      flex-direction: row;
      }
      
      .fa-envelope {
      margin-top: 0;
      margin-left: 20%;
      }
      .fa-at {
      margin-top: -10%;
      margin-left: 65%;
      }
      .fa-mail-bulk {
      margin-top: 2%;
      margin-left: 28%;
      }
      }
    </style>
  </head>
  <body>
    <div class="main-block">
      <form class="form-control" action="{{route('add.usercontact',$qrcode->qr_code_string)}}" method="post" enctype="multipart-data">
        @csrf
        <h1>Madani Contact Form</h1>
        <div class="info">
          <label>Name:</label>
          <input class="fname" type="text" name="name" placeholder="Please Enter Name:">
          <label>Email Address:</label>
          <input type="email"  name="email" placeholder="Please Enter Email:">
          <label>Phone No:</label>
          <input type="text" name="phone_no" placeholder="Please Enter Phone number:">
          <label>Country:</label>
          <input type="text"  name="contry" placeholder="Please Enter Country:">
          <label>City:</label>
          <input type="text"  name="city" placeholder="Please Enter City:">
          <label>Address:</label>
          <input type="text"  name="address" placeholder="Please Enter Address:">
        </div>
        <button type="submit">Submit</button>
      </form>
    </div>
    @include('sweetalert::alert')
  </body>
</html>