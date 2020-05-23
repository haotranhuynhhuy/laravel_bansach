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
 
<div class="container">
    <div class="row">
        <div class="col-md-12 m-5">
            <h3 class="text-center">Đăng nhập vào trang quản trị</h3>
            <div class="row text-center">
                <div class="col-md-12">
                    <button type="button" class="btn btn-secondary btn-lg" data-toggle="modal" data-target="#modelId">
                        Đăng nhập
                      </button>
                </div>
            </div>
            @if(session('thongbao'))
            <div class="alert alert-default-danger m-5 text-center">
               {{session('thongbao')}}
            </div>
            @endif
            @if($errors->count()>0)
            <div class="alert alert-default-danger m-5 text-center">
                @foreach($errors->all() as $err)
                {{$err}} <br>
                @endforeach
             </div>
            @endif
            <!-- Modal -->
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Đăng nhập</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <form action="login" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group text-center row">
                                  <label class="text-center col-sm-3 col-form-label" for="">Email: </label>
                                  <input type="email" class="form-control col-sm-9" name="email" aria-describedby="emailHelpId" placeholder="Nhập địa chỉ email">
                                </div>
                                <div class="form-group text-center row">
                                  <label class="text-center col-sm-3 col-form-label" for="">Mật khẩu: </label>
                                  <input type="password" class="form-control col-sm-9" name="password" placeholder="Nhập mật khẩu">
                                </div>
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary mt-auto">Đăng nhập</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>       
        </div>
    </div>
</div>

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
