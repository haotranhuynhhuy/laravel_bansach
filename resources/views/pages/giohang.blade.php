@extends('master')
@section('breadcrumb')
<div class="breadcrumb">
    <div class="container">
        <a class="breadcrumb-item" href="/">Trang chủ</a>
        <span class="breadcrumb-item active">Giỏ hàng</span>
    </div>
</div>
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <table class="table border">
                <thead>
                    <tr>
                        <th>Tên sách</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @if(Session::has('cart'))
                    @foreach($sach as $sach)
                    <tr>
                        <td scope="row"> <img width="100px" src="upload/sach/{{$sach['item']['image']}}" alt="">{{$sach['item']['name']}}</td>
                        <td>@if($sach['item']['promotion_price']) {{number_format($sach['item']['promotion_price']).'đ'}} @else {{number_format($sach['item']['unit_price']).'đ'}} @endif</td>
                        <td>{{$sach['qty']}}</td>
                        <td>   
                            <a class="btn btn-primary" href="themgiohang/{{$sach['item']['id']}}"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
                            <a class="btn btn-danger" href="xoagiohang/{{$sach['item']['id']}}"><i class="fa fa-trash" aria-hidden="true"></i></a>   
                        </td>
                    </tr>
                    @endforeach
                    @endif
                    <tr>
                        <td class="text-right" colspan="2"><b>Tổng tiền: </b></td>
                        <td colspan="3"><b class="text-danger"> @if(Session::has('cart')) {{number_format(Session('cart')->totalPrice).'đ'}} @else {{'0 đ'}} @endif</b></td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <!-- Button trigger modal -->
                            <div class="text-center">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#modelId">
                                    Tiến hành thanh toán
                                </button>
                            </div>

                            <!-- Modal -->
                            
                            <div class="modal fade" id="modelId" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Đặt hàng</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="dat-hang" method="post">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-4 col-form-label">Họ tên: </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ và tên" @if(Auth::check()) value = "{{Auth::user()->name}}" @endif>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone"
                                                    class="col-sm-4 col-form-label">Số điện thoại: </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" @if(Auth::check()) value = "{{Auth::user()->phone}}" @endif>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address"
                                                    class="col-sm-4 col-form-label">Địa chỉ: </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ" @if(Auth::check()) value = "{{Auth::user()->address}}" @endif>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email"
                                                    class="col-sm-4 col-form-label">Email: </label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" @if(Auth::check()) value = "{{Auth::user()->email}}" @endif>
                                                </div>
                                            </div>
                                            <fieldset class="form-group">
                                                <div class="row">
                                                    <legend class="col-form-label col-sm-4 pt-0">Giới tính: </legend>
                                                    <div class="col-sm-8">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="gt" id="gridRadios1" value="Nam"
                                                                checked>
                                                            <label class="form-check-label" for="gridRadios1">
                                                                Nam
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="gt" id="gridRadios2" value="Nữ">
                                                            <label class="form-check-label" for="gridRadios2">
                                                                Nữ
                                                            </label>
                                                        </div>
                                                        <div class="form-check disabled">
                                                            <input class="form-check-input" type="radio"
                                                                name="gt" id="gridRadios3" value="Khác"
                                                                >
                                                            <label class="form-check-label" for="gridRadios3">
                                                                Khác
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <div class="row">
                                                    <legend class="col-form-label col-sm-4 pt-0">Hình thức thanh toán: </legend>
                                                    <div class="col-sm-8">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="payment" id="cod" value="COD"
                                                                checked>
                                                            <label class="form-check-label" for="cod">
                                                                COD
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="payment" id="credit" value="Credit">
                                                            <label class="form-check-label" for="credit">
                                                                Chuyển khoản (AgriBank - 123456789)
                                                            </label>
                                                        </div>
                                            </fieldset>
                                            
                                            <div class="form-group">
                                              <label for="note">Ghi chú</label>
                                              <textarea class="form-control" name="notes" id="note" rows="3"></textarea>
                                            </div>
                                            <input type="hidden" name="status" value="0">
                                            <div class="form-group text-center">
                                              <button type="submit" class="btn btn-success">Đặt hàng</button>
                                            </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Hủy</button>
                                        </div>
                                    </div>
                                </div>
                            </div>                
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
