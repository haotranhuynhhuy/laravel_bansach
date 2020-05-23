@extends('master')
@section('breadcrumb')
<div class="breadcrumb">
    <div class="container">
        <a class="breadcrumb-item" href="/">Trang chủ</a>
        <span class="breadcrumb-item active">Đăng ký</span>
    </div>
</div>
@endsection
@section('main-content')
<section class="static about-sec">
    <div class="container">
        <h1>Đăng ký tài khoản</h1>
        @if($errors->count()>0)
            <div class="alert alert-default-danger m-5 text-center">
                @foreach($errors->all() as $err)
                {{$err}} <br>
                @endforeach
             </div>
        @endif
        {{-- auto popup  --}}
@if(session('thongbao'))
<div class="modal fade" id="global-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
      <!--Modal Content-->
      <div class="modal-content">
        <div class="modal-body" style="padding: 0; height:100px;">
          <div class="row text-center">
              <div class="col-lg-12">
                <h4>{{session('thongbao')}}</h4>
              </div>
          </div>
          <div class="row mt-3 text-center">
              <div class="col-lg-12">                
                      <i style="font-size:40px;" class="fa fa-check-circle text-success" aria-hidden="true"></i>              
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
{{-- end auto popup --}}
        <div class="form">
            <form action="dangky" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label" for="name"> <b>Họ tên: </b> </label>
                  <input class="col-sm-10" type="text" name="name" id="name" class="form-control" placeholder="Nhập họ tên" aria-describedby="helpId" >
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="phone"> <b>Số điện thoại: </b> </label>
                    <input class="col-sm-10" type="text" name="phone" id="phone" class="form-control" placeholder="Nhập số điện thoại" aria-describedby="helpId" >
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="address"> <b>Địa chỉ: </b> </label>
                    <input class="col-sm-10" type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ" aria-describedby="helpId" >
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="email"> <b>Email: </b> </label>
                    <input class="col-sm-10" type="text" name="email" id="email" class="form-control" placeholder="Nhập email (Sử dụng email này để đăng nhập)" aria-describedby="helpId" >
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="password"> <b>Mật khẩu: </b> </label>
                    <input class="col-sm-10" type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu" aria-describedby="helpId" >
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="passwordAgain"> <b>Nhập lại mật khẩu: </b> </label>
                    <input class="col-sm-10" type="password" name="passwordAgain" id="passwordAgain" class="form-control" placeholder="Nhập lại mật khẩu" aria-describedby="helpId" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary mr-3" aria-describedby="helpId">Đăng ký</button>
                    <small id="helpId" class="text-muted">Bạn đã có tài khoản ? <a href="dangnhap">Đăng nhập</a></small>                                        
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
       $('#global-modal').modal('show');
       setTimeout(function(){
           $('#global-modal').modal('hide');
       },1700);
    });
</script>
@endsection