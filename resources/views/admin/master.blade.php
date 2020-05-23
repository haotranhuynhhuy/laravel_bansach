<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=" /plugins/fontawesome-free/css/all.min.css ">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href=" /plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css ">
    <!-- iCheck -->
    <link rel="stylesheet" href=" /plugins/icheck-bootstrap/icheck-bootstrap.min.css ">
    <!-- JQVMap -->
    <link rel="stylesheet" href=" /plugins/jqvmap/jqvmap.min.css ">
    <!-- Theme style -->
    <link rel="stylesheet" href=" /dist/css/adminlte.min.css ">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href=" /plugins/overlayScrollbars/css/OverlayScrollbars.min.css ">
    <!-- Daterange picker -->
    <link rel="stylesheet" href=" /plugins/daterangepicker/daterangepicker.css ">
    <!-- summernote -->
    <link rel="stylesheet" href=" /plugins/summernote/summernote-bs4.css ">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <base href="{{asset('')}}">
    @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Trang chủ</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <!-- Notifications Dropdown Menu -->
           <div class="dropdown open">
               <button class="btn btn-outline-dark btn-sm dropdown-toggle text-left" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                          <i class="fa fa-user" aria-hidden="true"></i> @if(Auth::check()) {{Auth::user()->name}} @endif
                       </button>
               <div class="dropdown-menu" aria-labelledby="triggerId">
                   <a class="dropdown-item" href="admin/setting/@if(Auth::check()) {{Auth::user()->id}} @endif">Thông tin</a>
                   <a class="dropdown-item" href="admin/change/@if(Auth::check()) {{Auth::user()->id}} @endif">Đổi mật khẩu</a>
                   <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="logout">Đăng xuất <i class="fa fa-sign-out-alt" aria-hidden="true"></i></a>
               </div>
           </div>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="admin/dashboard" class="brand-link text-center">
            <i class="fas fa-home"></i>
            <span class="brand-text font-weight-light">Quản lý sách</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-copy"></i>
                            <p>
                                Sách
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin/sach/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Thêm</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/sach/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link">
                            <i class="nav-icon far fa-copy"></i>
                            <p>
                                Loại sách
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin/loaisach/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Thêm</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/loaisach/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-copy"></i>
                            <p>
                                Đơn hàng
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin/bill/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@yield('header')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            @yield('breadcrumb')
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @yield('main-content')
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.4
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src=" /plugins/jquery/jquery.min.js "></script>
<!-- jQuery UI 1.11.4 -->
<script src=" /plugins/jquery-ui/jquery-ui.min.js "></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src=" /plugins/bootstrap/js/bootstrap.bundle.min.js "></script>
<!-- ChartJS -->
<script src=" /plugins/chart.js/Chart.min.js "></script>
<!-- Sparkline -->
<script src=" /plugins/sparklines/sparkline.js "></script>
<!-- JQVMap -->
<script src=" /plugins/jqvmap/jquery.vmap.min.js "></script>
<script src=" /plugins/jqvmap/maps/jquery.vmap.usa.js "></script>
<!-- jQuery Knob Chart -->
<script src=" /plugins/jquery-knob/jquery.knob.min.js "></script>
<!-- daterangepicker -->
<script src=" /plugins/moment/moment.min.js "></script>
<script src=" /plugins/daterangepicker/daterangepicker.js "></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src=" /plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js "></script>
<!-- Summernote -->
<script src=" /plugins/summernote/summernote-bs4.min.js "></script>
<!-- overlayScrollbars -->
<script src=" /plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js "></script>
<!-- AdminLTE App -->
<script src=" /dist/js/adminlte.js "></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src=" dist/js/pages/dashboard.js "></script>
<!-- AdminLTE for demo purposes -->
<script src=" /dist/js/demo.js "></script>
@yield('script')
</body>
</html>
