<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="keywords" content="@yield('keywords')">
  <meta name="description" content="@yield('description')">
  <meta name="author" content="lama saad">
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
  <!-- import admin style -->
  <link rel="stylesheet" href="{{asset('web/css/adminlte.min.css')}}">
  @yield('styles')
  <!-- import main style -->
  <link rel="stylesheet" href="{{asset('web/css/style.css')}}">
  <!-- import main style responsive -->
  <link rel="stylesheet" href="{{asset('web/css/style_responsive.css')}}">
  <title>مشربية | @yield('title')</title>
</head>
<body  class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    
  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block">
          <a href="{{url('/dashboard')}}" class="nav-link">الصفحة الرئيسية</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/dashboard')}}" class="nav-link">الصفحة الرئيسية</a>
    </li>
    </ul>
  </nav>
  <!-- /.navbar -->

    <!-- start sidebar  -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/admin/home" class="brand-link text-end">
        <img src="
          @if (!empty($homeSettings))
              {{asset("upload/{$homeSettings[0]->logo}")}}
          @else
              {{asset('web/img/logo.png')}}
          @endif 
          "  
          alt="mashrabya Logo" class="brand-image elevation-3">
        <span class="brand-text font-weight-light">مشربية</span>
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="{{url('blogger/dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  الصفحة الرئيسية
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('/blogger/blog')}}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  المقالات
                </p>
              </a>
            </li>
            <span class="border-1 border-top"> </span>
            <li class="nav-item ">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  {{auth('blogger')->user()->name}}
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                {{-- <li class="nav-item">
                  <a href="{{ route('profile.show') }}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>profile</p>
                  </a>
                </li> --}}
                <li class="nav-item">
                  <!-- Authentication -->
                  <form method="POST" action="{{ route('blogger.logout') }}" class="nav-link" >
                      @csrf
                      <i class="far fa-circle nav-icon"></i>
                      <button type="submit" class="text-white bg-transparent border-0" >log out</button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- end sidebar navbar  -->


    

      @yield('main')

      <!-- start footer  -->
      <footer class="py-3 fixed-bottom" dir="rtl">
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

    <!-- import admin js -->
    <script src="{{asset('web/js/adminlte.min.js')}}"></script>

    @yield('scripts')
</body>
</html>