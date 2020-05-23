<div class="main-menu">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.html"><img src="/sources/images/logo.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="navbar-item">
                        <a style="color:black;" href="/" class="nav-link"><b>Trang chủ</b></a>
                    </li>
                    <li class="navbar-item">
                        @if(Auth::check())
                        <div class="dropdown">
                            <a type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown">
                              {{Auth::user()->name}}
                            </a>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="thongtin/{{Auth::user()->id}}">Thông tin</a>
                              <a class="dropdown-item" href="doimatkhau">Đổi mật khẩu</a>
                              <a class="dropdown-item" href="dangxuat">Đăng xuất <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                            </div>
                          </div>
                        @else
                        <a style="color:black;" href="dangnhap" class="nav-link"><b>Đăng nhập</b></a>
                        @endif
                    </li>
                </ul>
                <div class="cart my-2 my-lg-0">
                   <a style="color:black; text-decoration:none; font-size:25px;" href="giohang"><span>
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                @if(Session::has('cart'))<span class="quntity">{{Session('cart')->totalQty}}</span> @endif</a>
                </div>
                <form class="form-inline my-2 my-lg-0" method="get" action="timkiem">
                    <input class="form-control mr-sm-2" name="key" type="search" placeholder="Tìm kiếm..." aria-label="Search">
                    <button type="submit" class="btn btn-secondary"><span class="fa fa-search"></span></button>
                </form>
            </div>
        </nav>
    </div>
</div>