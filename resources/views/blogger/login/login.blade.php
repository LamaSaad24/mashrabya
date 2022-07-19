<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="موسوعة,عربية,شاملة,مشربية">
<meta name="description" content=" أكبر موقع عربي بالعالم">
<meta name="author" content="lama saad">
<link rel="shortcut icon" href="{{asset('web/img/favicon.ico')}}" type="image/x-icon">
<!-- import font awesome -->
<link rel="stylesheet" href="{{asset('web/css/all.min.css')}}">
<!-- import bootstrap css -->
<link rel="stylesheet" href="{{asset('web/css/bootstrap.min.css')}}">
{{-- import admin style  --}}
<link rel="stylesheet" href="{{asset('web/css/adminlte.min.css')}}">
<!-- import main style -->
<link rel="stylesheet" href="{{asset('web/css/style.css')}}">
<!-- import main style responsive -->
<link rel="stylesheet" href="{{asset('web/css/style_responsive.css')}}">
@yield('styles')
<title>مشربية | تسجيل الدخول</title>
</head>
<body class="hold-transition login-page">


    <section class="bg-white p-5 rounded">
        <div class="container">
            <h1 class="text-primary text-center">
                Mashrabya
             </h1>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="toast-container position-fixed top-0 end-0 p-3 " style="z-index:999999" >
                <div id="liveToast" class="toast alert-danger show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" onclick="$(this).closest('.toast').toast('hide')"></button>
                        <strong class="ms-auto">هنالك خطأ</strong>
                    </div>
                    @foreach ($errors->all() as $error)
                    <div class="toast-body text-right">
                        {{ $error }}
                    </div>
                    @endforeach
                </div>
                </div>
            @endif
            <form method="POST" action="{{ route('blogger.login') }}" >
                @csrf
            <div class="row mb-3">
                <label for="email" class=" col-form-label">Email :</label>
                <div class="">
                <input  id="email" class="block form-control mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus>
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class=" col-form-label">Password :</label>
                <div class="">
                <input  id="password" class="block form-control mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="current-password">
                </div>
            </div>
            <button type="submit" class="btn  btn-primary">Sign in</button>
            </form>
        </div>
    </section>



<!-- import popper  -->
<script src="{{asset('web/js/popper.min.js')}}"></script>
<!-- import jquery -->
<script src="{{asset('web/js/jquery-3.6.0.min.js')}}"></script>
<!-- import bootstrap js  -->
<script src="{{asset('web/js/bootstrap.bundle.min.js')}}"></script>
<!-- import main js  -->
<script src="{{asset('web/js/main.js')}}"></script>
</body>
</html>

