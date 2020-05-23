@extends('admin.master')
@section('header')
Đổi mật khẩu
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active"><a href="admin/changne">Đổi mật khẩu</a></li>
@endsection
@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Đổi mật khẩu</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form role="form" method="post" enctype="multipart/form-data" action="admin/change/@if(Auth::check()) {{Auth::user()->id}} @endif">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="card-body">
                    <div class="form-group">
                        <label>Mật khẩu mới</label>
                        <input type="password" class="form-control" name="newPass">
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu mới</label>
                        <input type="password" class="form-control" name="newPassAgain">
                    </div>
                    @if(session('thongbao'))
                    <div class="alert alert-default-success">
                        {{session('thongbao')}}
                    </div>
                    @endif
                    @if($errors->count()>0)
                    <div class="alert alert-default-danger m-5">
                        @foreach($errors->all() as $err)
                        <li>{{$err}}</li>
                        @endforeach
                    </div>
                    @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <button type="reset" class="btn btn-primary">Làm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(300)
                        .height(300);
                };
                reader.readAsDataURL(input.files[0]);
                $('#blah').show();
            }
        }
</script>
@endsection