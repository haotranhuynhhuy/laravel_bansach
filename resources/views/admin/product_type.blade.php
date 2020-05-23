@extends('admin.master')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
@section('header')
    Product types
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">Product types</li>
@endsection
@section('main-content')
{{--    Bang liet ke cac san pham--}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title">All types</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
       @if(Session::has('thongbao')) <div class="alert alert-success">{{Session::get('thongbao')}}</div>@endif
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($type as $type)
                <tr>
                    <td>{{$type->name}}</td>
                    <td>{{$type->description}}</td>
                    <td>
                        <a href="/edit-type/{{$type->id}}" class="btn btn-primary">Edit</a>
                        <a href="/delete-type/{{$type->id}}" class="btn btn-danger">Remove</a>
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