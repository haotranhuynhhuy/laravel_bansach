@extends('admin.master')
@section('header')
    Thêm sách
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="admin/sach/add">Thêm sách</a></li>
@endsection
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @if(session('thongbao'))
                <div class="alert alert-default-success">
                    {{session('thongbao')}}
                </div>
                @endif
                <form role="form" method="post" enctype="multipart/form-data" action="admin/loaisach/add">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="product-name">Tên loại sách</label>
                            <input type="text" class="form-control" id="product-name" name="tenloaisach" placeholder="Nhập tên loại sách">
                        </div>    
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" id="product-desc" name="mota" rows="3" placeholder="Nhập mô tả">
                            </textarea>
                        </div>                          
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <button type="reset" class="btn btn-primary">Làm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

