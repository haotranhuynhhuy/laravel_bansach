@extends('admin.master')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
@section('header')
    Danh sách khách hàng
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="admin/customer/list">Danh sách khách hàng</a></li>
@endsection
@section('main-content')
{{--    Bang liet ke cac san pham--}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tất cả khách hàng</h3>
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
                <th>Tên khách hàng</th>
                <th>Giới tính</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
                @foreach($customer as $customer)
                <tr>
               <td>{{$customer->name}}</td>
               <td>{{$customer->gender}}</td>
               <td>{{$customer->email}}</td>
               <td>{{$customer->address}}</td>
               <td>{{$customer->phone_number}}</td>
               <td>
                   <a href="admin/customer/delete/{{$customer->id}}" class="btn btn-danger">Xóa</a>
               </td>
                @endforeach
              </tr>
            </tbody>
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