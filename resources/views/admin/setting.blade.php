@extends('admin.master')
@section('header')
   Thông tin người quản trị
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="admin/setting/{{$user->id}}">Thông tin</a></li>
@endsection
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header bg-info">
                    <h3 class="card-title">Thông tin</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="card-body">
                        <div class="container">   
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="2" class="text-center">THÔNG TIN NGƯỜI QUẢN TRỊ</th>
                                </tr>
                                </thead>
                                <tbody>  
                                   <tr>
                                       <th>Tên</td>
                                       <td>{{$user->name}}</td>
                                   </tr>
                                   <tr>
                                       <th>Email</td>
                                       <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Địa chỉ</td>
                                        <td>{{$user->address}}</td>
                                     </tr>
                                     <tr>
                                        <th>Số điện thoại</td>
                                        <td>{{$user->phone}}</td>
                                     </tr>
                                </tbody>
                            </table>
                        </div>
                    <div class="card-footer text-center">
                        <button onclick="goBack()" class="btn btn-secondary">Quay lại</button>
                    </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
  <script>
      function goBack()
      {
          window.history.back();
      }
  </script>
@endsection

