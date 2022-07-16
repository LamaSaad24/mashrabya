<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <link rel="shortcut icon" href="
    @if (!empty($homeSettings))
        {{asset("upload/{$homeSettings[0]->icon}")}}
    @else
        {{asset('web/img/favicon.ico')}}
    @endif
    "
    type="image/x-icon">
    <!-- import font awesome -->
    <link rel="stylesheet" href="{{asset('web/css/all.min.css')}}">
    <!-- import bootstrap css -->
    <link rel="stylesheet" href="{{asset('web/css/bootstrap.min.css')}}">
    <!-- import main style -->
    <link rel="stylesheet" href="{{asset('web/css/style.css')}}">
    <!-- import main style responsive -->
    <link rel="stylesheet" href="{{asset('web/css/style_responsive.css')}}">
    @yield('styles')
    <title>مشربية | @yield('title')</title>
</head>
<body>

    <!-- start back to top -->
    <div class="go-to-top">
        <a href="#">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- end back to top -->

    <!-- start navbar -->
    <nav class="navbar  navbar-expand-lg navbar-dark " >
        <div id="header-2" class="container   py-2">
            <a class="navbar-brand" href="/">
                <img src="
                    @if (!empty($homeSettings))
                        {{asset("upload/{$homeSettings[0]->logo}")}}
                    @else
                        {{asset('web/img/logo.png')}}
                    @endif 
                    "  class="img-fluid" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse position-relative ps-4" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">تصنيفات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/last-blog">أحدث المواضيع</a>
                    </li>
                </ul>
                <form  action="{{url("search")}}"  method="POST" class="search-box">
                    @csrf
                    <input type="text" class="text   search-input" name="keyword" placeholder="ابحث هنا..." />
                </form>
                <div class="search-button">
                    <a href="#" class="search-toggle" data-selector="#header-2"></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navbar -->



    @yield('main')



    <!-- start footer  -->
    <footer class="py-3">
        <div class="container text-center">
            <div class="row justify-content-center align-items-center">
                <p class="col-6 m-0"> جميع الحقوق محفوظة &copy; مشربية 2022</p>
                <div class="footer-icons col-6">
                    @foreach ($settings as $sett )
                        <a href="{{url("{$sett->value}")}}"><i class="{{$sett->icon}}"></i></a>
                    @endforeach
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer  -->

    



    <!-- import popper  -->
    <script src="{{asset('web/js/popper.min.js')}}"></script>
    <!-- import jquery -->
    <script src="{{asset('web/js/jquery-3.6.0.min.js')}}"></script>
    <!-- import bootstrap js  -->
    <script src="{{asset('web/js/bootstrap.bundle.min.js')}}"></script>
    <!-- import main js  -->
    <script src="{{asset('web/js/main.js')}}"></script>
    @yield('scripts')
</body>
</html>