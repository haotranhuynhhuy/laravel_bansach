@extends('master')
@section('breadcrumb')
<div class="breadcrumb">
    <div class="container">
        <a class="breadcrumb-item" href="/">Trang chủ</a>
        <span class="breadcrumb-item active">Chi tiết sản phẩm</span>
    </div>
</div>
@endsection
@section('main-content')
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
<section class="product-sec">
    <div class="container">
        <h1>{{$chitiet->name}}</h1>
        <div class="row">
            <div class="col-md-6 slider-sec">
                <!-- main slider carousel -->
                <div id="myCarousel" class="carousel slide">
                    <!-- main slider carousel items -->
                    <div class="carousel-inner">
                        <div class="active item carousel-item" data-slide-number="0">
                            <img src="/upload/sach/{{$chitiet->image}}" class="img-fluid" width="2500px">
                        </div>
                    </div>
                    <!-- main slider carousel nav controls -->
                </div>
                <!--/main slider carousel-->
            </div>
            <div class="col-md-6 slider-content">
                <p><b>{{$chitiet->description}}</b></p>
              
                <ul>
                    <li>
                        <span class="name">Giá</span><span class="clm">:</span>
                        <span class="price">{{number_format($chitiet->unit_price).'đ'}}</span>
                    </li>
                    <li>
                        <span class="name">Giá khuyến mãi</span><span class="clm">:</span>
                        <span class="price final">@if($chitiet->promotion_price) {{number_format($chitiet->promotion_price).'đ'}} @else {{number_format($chitiet->unit_price).'VNĐ'}} @endif</span>
                    </li>
                    @if($chitiet->promotion_price)<li><span class="save-cost">Tiết kiệm {{number_format($tietkiem).'đ'}}</span></li> @endif
                </ul>
                <div class="btn-sec text-center">
                    <a href="themgiohang/{{$chitiet->id}}" class="btn btn-warning">Thêm giỏ hàng</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="related-books">
    <div class="container">
        <h2>Sản phẩm liên quan</h2>
        <div class="recomended-sec">
            <div class="row">
               @foreach($splq as $lq)
               <div class="col-lg-3 col-md-6">
                <div class="item">
                    <img src="/upload/sach/{{$lq->image}}" alt="img">
                    <h3>{{$lq->name}}</h3>
                    <h6><span style="font-size: 20px;" class="price">{{number_format($lq->unit_price)}} đ</span>
                    @if($lq->spmoi == 1) <span class="sale"> Mới </span> @endif
                    <div class="hover">
                        <a href="chitietsanpham/{{$lq->id}}"><span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
                    </div>
                </div>
            </div>
               @endforeach
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