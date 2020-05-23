@extends('master')
@section('breadcrumb')
<div class="breadcrumb">
    <div class="container">
        <a class="breadcrumb-item" href="/">Trang chủ</a>
        <span class="breadcrumb-item active">Đăng nhập</span>
    </div>
</div>
@endsection
@section('main-content')
@if(session('fail'))
            <div class="alert alert-danger m-5 text-center">
               {{session('fail')}}
            </div>
@endif
<section class="static about-sec">
    <div class="container">
        <h1>Đăng nhập</h1>
        <div class="form">       
                <form action="dangnhap" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label" for="email"> <b>Email: </b> </label>
                      <input class="col-sm-10" type="text" name="email" id="email" class="form-control" placeholder="Nhập họ tên" aria-describedby="helpId" >
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="password"> <b>Mật khẩu: </b> </label>
                        <input class="col-sm-10" type="password" name="password" id="password" class="form-control" placeholder="Nhập số điện thoại" aria-describedby="helpId" >
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary mr-3" aria-describedby="helpId">Đăng nhập</button>
                        <small id="helpId" class="text-muted">Bạn chưa có tài khoản ? <a href="dangky">Đăng ký</a></small>                                        
                    </div>
                </form>
        </div>
    </div>
</section>
@endsection