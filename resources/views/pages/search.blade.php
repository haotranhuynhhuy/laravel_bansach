@extends('master')
@section('main-content')
<section class="static about-sec">
    <div class="container">
        <div class="recomended-sec mt-5">
            <div class="row">  
                <div class="col-lg-12 text-center">
                    <h2>Tìm kiếm</h2>
                </div>      
        </div>
        <div class="recent-book-sec">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Tìm thấy {{count($sach)}} quyển</p>
                </div>
                @foreach($sach as $all)
                <div class="col-md-3">
                    <div class="item">
                        <img src="/upload/sach/{{$all->image}}" alt="img">
                        <h5 ><a class="text-dark" href="chitietsanpham/{{$all->id}}">{{$all->name}}</a></h5>
                        <h6><span style="font-size: 20px;" class="price">{{number_format($all->unit_price).'đ'}}</span> / <a href="themgiohang/{{$all->id}}"><i style="font-size: 20px;" class="fa fa-shopping-cart" aria-hidden="true"></i></a></h6>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection