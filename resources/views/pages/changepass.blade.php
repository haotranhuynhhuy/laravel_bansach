@extends('master')
@section('breadcrumb')
<div class="breadcrumb">
    <div class="container">
        <a class="breadcrumb-item" href="/">Trang chủ</a>
        <span class="breadcrumb-item active">Đổi mật khẩu</span>
    </div>
</div>
@endsection
@section('main-content')
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
<section class="static about-sec">
    <div class="container">
        <h1>Đổi mật khẩu</h1>
        @if($errors->count()>0)
            <div class="alert alert-default-danger m-5 text-center">
                @foreach($errors->all() as $err)
                {{$err}} <br>
                @endforeach
             </div>
        @endif
        <div class="form">       
                <form action="doimatkhau/{{Auth::user()->id}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="password"> <b>Mật khẩu mới: </b> </label>
                        <input class="col-sm-10" type="password" name="newPass" id="password" class="form-control" placeholder="Nhập mật khẩu" aria-describedby="helpId" >
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="passwordAgain"> <b>Nhập lại mật khẩu: </b> </label>
                        <input class="col-sm-10" type="password" name="newPassAgain" id="passwordAgain" class="form-control" placeholder="Nhập lại mật khẩu" aria-describedby="helpId" >
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary mr-3" aria-describedby="helpId">Cập nhật</button>                                                             
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