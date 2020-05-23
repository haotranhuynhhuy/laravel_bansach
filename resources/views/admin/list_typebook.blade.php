@extends('admin.master')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
@section('header')
     Loại sách
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="admin/sach/list"> Loại sách</a></li>
@endsection
@section('main-content')
{{--    Bang liet ke cac san pham--}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Loại sách</h3>
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
                <th>Loại sách</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
                @foreach($loaisach as $loaisach)
                <tr>
               <td>{{$loaisach->name}}</td>
               <td>{{$loaisach->description}}</td>
               <td>
                   <a href="admin/loaisach/delete/{{$loaisach->id}}" class="btn btn-danger">Xóa</a>
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