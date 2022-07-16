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
<body>

        <x-guest-layout>
            <x-auth-card>
                <x-slot name="logo">
                    <a href="/">
                        <a class="navbar-brand " href="/">
                            <img src="
                                @if (!empty($homeSettings))
                                    {{asset("upload/{$homeSettings[0]->logo}")}}
                                @else
                                    {{asset('web/img/logo.png')}}
                                @endif 
                                "  class="img-fluid" alt="logo">
                        </a>
                    </a>
                </x-slot>
        
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
        
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
        
                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="__('Email')" />
        
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
        
                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />
        
                        <x-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                    </div>
        
                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        {{-- @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif --}}
        
                        <x-button class="ml-3">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
            </x-auth-card>
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

