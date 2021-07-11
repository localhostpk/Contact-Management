<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('web/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('web/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('web/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('web/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('web/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('web/dist/css/skins/_all-skins.min.css')}}">
 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        @stack('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="{{'/dashboard'}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messasges</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account:  style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{'storage/upload/'.auth()->user()->profile_pic}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{'storage/upload/'.auth()->user()->profile_pic}}" class="img-circle" alt="User Image">

                <p>
                <small>Name:   {{Auth::user()->name}}</small>
                  <small>Role:  {{Auth::user()->getRoleNames()->first()}}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{'profile'}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                 <div class="pull-left">
                 <a href="" class="btn btn-default btn-flat">Pass update</a>
               </div>
                <div class="pull-left">
                  <a href="{{'logout'}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>

    </nav>
  </header>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{'storage/upload/'.auth()->user()->profile_pic}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> Admin Name:  {{Auth::user()->name}}</p>
          <small>{{Auth::user()->getRoleNames()->first()}}</small>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       
        <li class="header">MAIN NAVIGATION</li>

@can('view role')
        <li class="treeview {{request()->Is('asign-role*')  || request()->Is('create-role*') ||request()->Is('all-role*') ? 'active menu-open':''}}">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Roles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             @can('create role')
            <li class=" {{request()->Is('create-role*') ? 'active':''}}"><a href="{{route('create.role')}}"><i class="fa fa-circle-o"></i> Create Role</a></li>
             @endcan
             @can('assign role')
            <li class="{{request()->Is('asign-role*') ? 'active':''}}"><a href="{{route('assign.role')}}"><i class="fa fa-circle-o"></i> Assign Role</a></li>
             @endcan
             @can('view role')
            <li class="{{request()->Is('all-role*') ? 'active':''}}"><a href="{{route('all.role')}}"><i class="fa fa-circle-o"></i> All Roles</a></li>
             @endcan
          </ul>
          
        </li>
 @endcan
@can('view permission')
        <li class="treeview {{request()->Is('create-permission*')  || request()->Is('assign-permission*') ||request()->Is('all-permission*') ? 'active menu-open':''}}">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Permission</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          @can('create permission')
            <li class="{{request()->Is('create-permission*') ? 'active':''}}"><a href="{{route('create.permission')}}"><i class="fa fa-circle-o"></i> Create Permission</a></li>
           @endcan
           <!--  @can('assign permission')
            <li class="{{request()->Is('assign-permission*') ? 'active':''}}"><a href="{{route('assign.permission')}}"><i class="fa fa-circle-o"></i> Assign Permission</a></li>
            @endcan  -->
            @can('view permission')
            <li class="{{request()->Is('all-permission*') ? 'active':''}}"><a href="{{route('all.permission')}}"><i class="fa fa-circle-o"></i> All Permission</a></li>
           @endcan
          </ul>
        </li>
@endcan
@can('view user')
          <li class="treeview {{request()->Is('add-user*')  || request()->Is('all-user*') ? 'active menu-open':''}}">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           @can('add user')
            <li class="{{request()->Is('add-user*') ? 'active':''}}"><a href="{{route('add.user')}}"><i class="fa fa-circle-o"></i>Add User</a></li>
            @endcan
            @can('view user')
            <li class="{{request()->Is('all-user*') ? 'active':''}}"><a href="{{route('all.user')}}"><i class="fa fa-circle-o"></i> All Users</a></li>
           @endcan
           <li><a href="{{route('user.tree.view')}}"><i class="fa fa-circle-o"></i>User Tree View</a></li>
          </ul>
        </li>
@endcan
@can('view contact')
        <li class="treeview {{request()->Is('add-contact*')  || request()->Is('all-contact*') ? 'active menu-open':''}}">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Contact</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('view contact')
            <li class="active"><a href="{{route('add.contact')}}"><i class="fa fa-circle-o"></i>Add Contact</a></li>
            @endcan
            @can('view contact')
            <li><a href="{{route('all.contact')}}"><i class="fa fa-circle-o"></i> All Contact</a></li>
            @endcan
           
            <li><a href="{{route('contact.tree.view')}}"><i class="fa fa-circle-o"></i>Contact Tree View</a></li>
            
            
          </ul>
        </li>
@endcan
@can('view qr')
   <li class="treeview {{request()->Is('generate.qr_code*')  || request()->Is('all.qr_codes*') ? 'active menu-open':''}}">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>QR Codes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('create qr')
            <li class="active"><a href="{{route('generate.qr_code')}}"><i class="fa fa-circle-o"></i>Genrate QR Codes</a></li>
            @endcan
            @can('view qr')
            <li><a href="{{route('all.qr_codes')}}"><i class="fa fa-circle-o"></i>All QR Codes</a></li>
           @endcan
            
          </ul>
        </li>
@endcan
   <li class="treeview {{request()->Is('generate.qr_code*')  || request()->Is('all.qr_codes*') ? 'active menu-open':''}}">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dasboard Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="{{route('add.project.details')}}"><i class="fa fa-circle-o"></i>Project Details</a></li>
           <li><a href="{{route('all.project.details')}}"><i class="fa fa-circle-o"></i>All Project Details</a></li>
           <li><a href="{{route('add.smtp.details')}}"><i class="fa fa-circle-o"></i>SMTP Details</a></li>
           <li><a href="{{route('all.smtp.details')}}"><i class="fa fa-circle-o"></i>All SMTP Details</a></li>
            <li class="active"><a href="{{route('maintenance')}}"><i class="fa fa-circle-o"></i>Maintenance mode</a></li>
            <li><a href="//"><i class="fa fa-circle-o"></i>SMS APi</a></li>
            <li><a href="//"><i class="fa fa-circle-o"></i>Feature Enable & Des</a></li>
             <li><a href="//"><i class="fa fa-circle-o"></i>System backup</a></li>
              <li><a href="//"><i class="fa fa-circle-o"></i>Restore</a></li>

            
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  @yield('body')

    <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="{{'/dashboard'}}">Madani.links</a>.</strong> All rights
    reserved.
  </footer>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('web/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('web/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->

<script src="{{asset('web/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('web/dist/js/adminlte.min.js')}}"></script>
<!-- Sparkline -->

<script src="{{asset('web/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap  -->
<script src="{{asset('web/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('web/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('web/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('web/bower_components/chart.js/Chart.js')}}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->


@stack('js')

</body>
</html>


