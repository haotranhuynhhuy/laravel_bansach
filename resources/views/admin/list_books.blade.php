@extends('admin.master')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
@section('header')
    Danh sách các loại sách
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="admin/sach/list">Danh sách các loại sách</a></li>
@endsection
@section('main-content')
{{--    Bang liet ke cac san pham--}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tất cả các loại sách</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if(session('thongbao'))
                <div class="alert alert-default-success">
                    {{session('thongbao')}}
                </div>
        @endif
        @if(session('error'))
                <div class="alert alert-default-success">
                    {{session('error')}}
                </div>
        @endif
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Tên sách</th>
                <th>Loại sách</th>
                <th>Đơn giá</th>
                <th>Đơn giá khuyến mãi</th>
                <th>Sản phẩm mới</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
                @foreach($listsach as $sach)
                <tr>
               <td>{{$sach->name}} <img width="150px" src="upload/sach/{{$sach->image}}" alt=""></td>
               <td>{{$sach->loaisach->name}}</td>
               <td>{{$sach->unit_price}}</td>
               <td>{{$sach->promotion_price}}</td>
               <td>@if($sach->spmoi == '1') {{'Có'}} @else {{'Không'}} @endif</td>
               <td>
                   <a href="admin/sach/edit/{{$sach->id}}" class="btn btn-primary">Sửa</a>
                   <a href="admin/sach/delete/{{$sach->id}}" class="btn btn-danger">Xóa</a>
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