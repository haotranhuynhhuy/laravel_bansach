@extends('admin.master')
@section('header')
   Chi tiết đơn hàng
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="admin/bill/detail/{{$customerInfo->id_bill}}">Chi tiết</a></li>
@endsection
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header bg-info">
                    <h3 class="card-title">Chi tiết đơn hàng</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="card-body">
                        <div class="container">   
                            @if(session('thongbao'))
                                <div class="alert alert-default-success">
                                   {{session('thongbao')}}
                                </div>
                            @endif
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="2" class="text-center">THÔNG TIN KHÁCH HÀNG</th>
                                </tr>
                                </thead>
                                <tbody>  
                                   <tr>
                                       <th>Tên người đặt hàng</td>
                                       <td>{{$customerInfo->name}}</td>
                                   </tr>
                                   <tr>
                                       <th>Ngày đặt hàng</td>
                                       <td>{{$customerInfo->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <th>Địa chỉ</td>
                                        <td>{{$customerInfo->address}}</td>
                                     </tr>
                                     <tr>
                                        <th>Số điện thoại</td>
                                        <td>{{$customerInfo->phone_number}}</td>
                                     </tr>
                                     <tr>
                                        <th>Email</td>
                                        <td>{{$customerInfo->email}}</td>
                                     </tr>
                                     <tr>
                                        <th>Phương thức thanh toán</td>
                                        <td>{{$customerInfo->payment}}</td>
                                     </tr>
                                     <tr>
                                        <th>Ghi chú</td>
                                        <td>{{$customerInfo->bill_note}}</td>
                                     </tr>
                                </tbody>
                            </table>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <th>STT</th>
                                <th>Tên sách</th>
                                <th>Số lượng</th>
                                <th>Giá tiền</th>
                            </thead>
                            <tbody>
                                @foreach($billInfo as $key=>$bill)
                                <tr>
                                   <td>{{$key+1}}</td>
                                   <td>{{$bill->tensach}}</td>
                                   <td>{{$bill->quantity}}</td>
                                   <td> @if($bill->km == 0) {{number_format($bill->gia)}} @else {{number_format($bill->km)}} @endif đ</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3"><b>Tổng tiền</b></td>
                                    <td colspan="1" class="text-red"><b>{{number_format($customerInfo->bill_total)}} VNĐ</b></td>
                                </tr>
                            </tbody>
                        </table>
                    <div class="col-md-12 mt-3 mb-3">
                        <form action="admin/bill/list/{{$customerInfo->id_bill}}" method="post">
                             <input type="hidden" name="_token" value="{{csrf_token()}}">
                             <div class="col-md-12">
                                 <div class="form-inline">
                                     <label class="mr-3">Trạng thái giao hàng: </label>
                                     <select name="status" class="form-control" style="width:200px;">
                                        <option @if($customerInfo->bill_status == '1') {{'selected'}} @endif value="1">Chưa giao</option>
                                        <option @if($customerInfo->bill_status == '2') {{'selected'}} @endif value="2">Đang giao</option>
                                        <option @if($customerInfo->bill_status == '3') {{'selected'}} @endif value="3">Đã giao</option>
                                    </select>  
                                    <button type="submit" class="btn btn-primary ml-3">Xử lý</button>       
                                 </div>
                             </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="admin/bill/list" class="btn btn-secondary">Quay lại</a>
                    </div>
            </div>
        </div>
    </div>
@endsection

