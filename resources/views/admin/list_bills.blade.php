@extends('admin.master')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
@section('header')
    Danh sách các đơn hàng
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">Đơn hàng</li>
@endsection
@section('main-content')
    {{--    Bang liet ke cac san pham--}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tất cả các đơn hàng</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if(session('thongbao'))
            <div class="alert alert-default-success">
                {{session('thongbao')}}
            </div>
           @endif
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Ngày đặt hàng</th>
                    <th>Email</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customer as $customer)
                    <tr>
                        <td>{{$customer->id}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->address}}</td>
                        <td>{{$customer->created_at}}</td>
                        <td>{{$customer->email}}</td>
                        <td>
                            @if($customer->bill_status == '1')
                               {{'Chưa giao'}}
                               @else @if($customer->bill_status == '2')
                               {{'Đang giao'}}
                               @else @if($customer->bill_status == '3')
                               {{'Đã giao'}}
                            @endif
                            @endif
                            @endif
                        </td>
                        <td>
                            <a href="admin/bill/detail/{{$customer->id}}" class="btn btn-info">Chi tiết</a>
                            <a href="admin/bill/delete/{{$customer->id}}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
@section('script')
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection