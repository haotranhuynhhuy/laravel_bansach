@extends('master')
@section('breadcrumb')
<div class="breadcrumb">
    <div class="container">
        <a class="breadcrumb-item" href="/">Trang chủ</a>
        <span class="breadcrumb-item active">Sản phẩm theo loại</span>
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
                <h4>Thêm giỏ hàng thành công</h4>
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
        <div class="recent-book-sec">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>{{$loaisach->name}}</h2>
                </div>
                @foreach($sachtheoloai as $loai_sach)
                <div class="col-md-3">
                    <div class="item">
                        <img src="/upload/sach/{{$loai_sach->image}}" alt="img">
                        <h5><a class="text-dark" href="chitietsanpham/{{$loai_sach->id}}">{{$loai_sach->name}}</a></h5>
                        <h6><span style="font-size: 20px; class="price">{{number_format($loai_sach->unit_price).'đ'}}</span> / <a href="themgiohang/{{$loai_sach->id}}"><i style="font-size: 20px;" class="fa fa-shopping-cart" aria-hidden="true"></i></a></h6>
                    </div>
                </div>
                @endforeach
            </div>
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
