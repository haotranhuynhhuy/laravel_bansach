<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#03a6f3">
    <link rel="stylesheet" href="/sources/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="/sources/css/styles.css"> 
    @yield('css')
    <base href="{{asset('')}}">
    {{-- Facebook plugin --}}
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0"></script>
</head>

<body>
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"><a href="#" class="web-url">www.bookstore.com</a></div>
                    <div class="col-md-6">
                        <h5>Vận chuyển miễn phí với đơn hàng từ 250.000 đồng trở lên</h5></div>
                    <div class="col-md-3">
                        <span class="ph-number">Số điện thoại : 099-888-777</span>
                    </div>
                </div>
            </div>
        </div>
        @include('pages.menu')
    </header>
        @yield('breadcrumb')
        @yield('main-content')
        @include('footer')
    <script src="/sources/js/jquery.min.js"></script>
    <script src="/sources/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/sources/js/owl.carousel.min.js"></script>
    <script src="/sources/js/custom.js"></script>
    <script src="/owlcarousel/owl.carousel.min.js"></script>
    @yield('scripts')
</body>

</html>