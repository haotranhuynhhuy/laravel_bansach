@extends('master')
@section('breadcrumb')
<div class="breadcrumb">
    <div class="container">
        <a class="breadcrumb-item" href="/">Trang chủ</a>
        <span class="breadcrumb-item active">Thông tin cá nhân</span>
    </div>
</div>
@endsection
@section('main-content')
<section class="product-sec">
    <div class="container">
        @if(Auth::check())
        <table class="table table-bordered">
            <thead>
            <tr>
                <th colspan="2" class="text-center">THÔNG TIN CÁ NHÂN</th>
            </tr>
            </thead>
            <tbody>  
               <tr>
                   <th>Tên</td>
                   <td>{{$user->name}}</td>
               </tr>
               <tr>
                   <th>Email</td>
                   <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <th>Địa chỉ</td>
                    <td>{{$user->address}}</td>
                 </tr>
                 <tr>
                    <th>Số điện thoại</td>
                    <td>{{$user->phone}}</td>
                 </tr>
            </tbody>
        </table>
        @endif
    </div>
</section>
@endsection
