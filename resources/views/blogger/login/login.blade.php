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

<x-guest-layout class="bg-danger">
    <x-jet-authentication-card>
        <x-slot name="logo">
        <div class="card-header text-primary">
            <a href="/" class="h1"><b>Mashrabya</b></a>
            <b>Bologger</b>
        </div>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                {{-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif --}}

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>




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

