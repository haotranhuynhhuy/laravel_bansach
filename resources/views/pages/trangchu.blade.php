@extends('master')
@section('css')
<link rel="stylesheet" href="/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="/owlcarousel/owl.theme.default.min.css">
@endsection
@section('breadcrumb')
<div class="breadcrumb">
    <div class="container">
        <a class="breadcrumb-item" href="/">Trang chủ</a>
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
        <div class="row m-3 text-center">
        @foreach($loaisach as $ls)
        <div class="col-lg-3 col-md-6">
            <a class="btn btn-warning" href="loaisach/{{$ls->id}}">{{$ls->name}}</a>
        </div> 
        @endforeach   
        </div>  
        
        <div class="recomended-sec mt-5">
            <div class="row">  
                <div class="col-lg-12 text-center">
                    <h2>Sản phẩm mới</h2>
                </div>      
                <div class="owl-carousel owl-theme">
                    @foreach($sachmoi as $sach)
                    <div class="item">
                        <img src="/upload/sach/{{$sach->image}}" alt="img">
                        <h5>{{$sach->name}}</h5>
                        <h6><span style="font-size: 20px;" class="price">{{number_format($sach->unit_price).'đ'}}</span></h6>
                        <span class="sale">Mới</span>
                        <div class="hover">
                            <a href="chitietsanpham/{{$sach->id}}">
                                <span><i  class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
        <div class="recent-book-sec">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Tất cả</h2>
                </div>
                @foreach($allsach as $all)
                <div class="col-md-3">
                    <div class="item">
                        <img src="/upload/sach/{{$all->image}}" alt="img">
                        <h5 ><a class="text-dark" href="chitietsanpham/{{$all->id}}">{{$all->name}}</a></h5>
                        <h6><span style="font-size: 20px;" class="price">{{number_format($all->unit_price).'đ'}}</span> / <a href="themgiohang/{{$all->id}}"><i style="font-size: 20px;" class="fa fa-shopping-cart" aria-hidden="true"></i></a></h6>
                    </div>
                </div>
                @endforeach
            </div>
            <div style="margin-left: 450px;">
                {{$allsach->links()}}
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
          loop:true,
          margin:10,
          dots: true,
          autoplay: true,
          autoplayTimeout: 25000,
          responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
    }
});
    });
    $(document).ready(function() {
       $('#global-modal').modal('show');
       setTimeout(function(){
           $('#global-modal').modal('hide');
       },1700);
    });

</script>
@endsection