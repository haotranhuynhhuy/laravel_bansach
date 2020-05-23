@extends('admin.master')
@section('header')
   Khách hàng : {{$bills->bill->name}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="admin/bill/edit/{{$bills->id}}">Chỉnh sửa</a></li>
@endsection
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Chỉnh sửa</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @if(session('thongbao'))
                <div class="alert alert-default-success">
                    {{session('thongbao')}}
                </div>
                @endif
                <form role="form" method="post" enctype="multipart/form-data" action="admin/bill/edit/{{$bills->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Khách hàng</label>
                            <input type="text" class="form-control"  name="tenkhachhang" value="{{$bills->bill->name}}" readonly>
                        </div>
                        <div class="form-group">
                            <label >Ngày đặt</label>
                            <input type="text" class="form-control"  name="ngaydat" value="{{$bills->date_order}}" readonly>
                        </div>
                        <div class="form-group">
                            <label >Tổng cộng</label>
                            <input type="text" class="form-control" name="tongcong" value="{{$bills->total}}" readonly>
                        </div>
                        <div class="form-group">
                            <label >Thanh toán</label>
                            <input type="text" class="form-control"  name="thanhtoan" value="{{$bills->payment}}" readonly>
                        </div>
                        <div class="form-group">
                            <label >Ghi chú</label>
                            <input type="text" class="form-control" name="ghichu" value="{{$bills->note}}" readonly>
                        </div>
                        <label for="">Tình trạng :</label>
                        <div class="form-check form-check-inline p-2">
                            <input type="checkbox" class="form-check-input" id="new-product" name="tinhtrang" value="1" @if($bills->tinhtrang == '1') {{'checked'}} @endif> Đang giao  
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="new-product" name="tinhtrang" value="0" @if($bills->tinhtrang == '0') {{'checked'}} @endif> Hủy
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="new-product" name="tinhtrang" value="2" @if($bills->tinhtrang == '2') {{'checked'}} @endif> Đang chờ lấy hàng 
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="new-product" name="tinhtrang" value="3" @if($bills->tinhtrang == '3') {{'checked'}} @endif> Đã giao
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
