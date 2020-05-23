@extends('admin.master')
@section('header')
    {{$suasach->name}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="admin/sach/edit/{{$suasach->id}}">Chỉnh sửa</a></li>
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
                <form role="form" method="post" enctype="multipart/form-data" action="admin/sach/edit/{{$suasach->id}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="product-name">Tên sách</label>
                            <input type="text" class="form-control" id="product-name" name="tensach" placeholder="Nhập tên sách" value="{{$suasach->name}}">
                        </div>
                        <div class="form-group">
                            <label>Loại sách</label>
                            <select class="form-control" id="product-type" name="loai">
                                @foreach($loaisach as $loai)                         
                                    <option value="{{$loai->id}}" @if($loai->id == $suasach->id_type) {{'selected'}} @endif>{{$loai->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" id="product-desc" name="mota" rows="3" placeholder="Nhập mô tả">
                                {{$suasach->description}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Đơn giá</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">VNĐ</span>
                                </div>
                                <input type="number" class="form-control" id="unit-price" name="gia" value="{{$suasach->unit_price}}">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>khuyến mãi</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">VNĐ</span>
                                </div>
                                <input type="number" class="form-control" id="promotion-price" name="km" value="{{$suasach->promotion_price}}">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product-unit">Đơn vị</label>
                            <input type="text" class="form-control" id="product-unit" name="donvi" placeholder="Đơn vị tính" value="{{$suasach->unit}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh</label>
                            <div class="input-group">
                                <img id="blah" src="upload/sach/{{$suasach->image}}" alt="your image"/ width="500px">
                            </div><br>
                            <div class="input-group">
                                <input type="file" name="hinh" required="true" onchange="readURL(this);">
                            </div>
                        </div>
                        <label for="">Sản phẩm mới :</label>
                        <div class="form-check form-check-inline p-2">
                            <input type="checkbox" class="form-check-input" id="new-product" name="spmoi" value="1" @if($suasach->spmoi == '1') {{'checked'}} @endif> Có  
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="new-product" name="spmoi" value="0" @if($suasach->spmoi == '0') {{'checked'}} @endif> Không  
                        </div>
                        
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Sửa</button>
                        <button type="reset" class="btn btn-primary">Làm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(300)
                        .height(300);
                };
                reader.readAsDataURL(input.files[0]);
                $('#blah').show();
            }
        }
    </script>
@endsection
