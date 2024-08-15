@extends('auth::layouts.master')
@section('head-tag')
    <title>ورود</title>
@endsection
@section('content')

    <form action="{{ route('auth.login.store') }}" method="post">
        @csrf
        <div class="mb-2">
            <a href="{{ route('home.index') }}">
                <img src="{{ asset($setting->logo_header) }}" alt="" class="w-36 mx-auto">
            </a>
        </div>
        <div class="opacity-80 text-lg mb-5">
            ورود
        </div>
        <div class="text-xs opacity-70 mb-2">
            شماره همراه یا ایمیل خود را وارد کنید:
        </div>
        <div class="mb-2">
            <input name="id" class="w-full drop-shadow-lg outline-none rounded-2xl py-2 text-center" type="text">
        </div>
        @error('id')
        <div class="text-xs text-red-500 ">
            {{ $message }}
        </div>
        @enderror
        <div class="text-xs opacity-70 mb-2">
            رمز عبور
        </div>
        <div class="mb-2">
            <input name="password" class="w-full drop-shadow-lg outline-none rounded-2xl py-2 text-center" type="password">
        </div>
        @error('password')
        <div class="text-xs text-red-500 ">
            {{ $message }}
        </div>
        @enderror
        <div class="text-center mt-5 mb-3">
            <button class="bg-red-500 hover:bg-red-600 transition text-white opacity-80 rounded-2xl w-full py-2" type="submit">
                ورود
            </button>
        </div>
        <div class="text-xs opacity-80">
            اگر که قبلا ثبت نام نکرده اید اید میتوانید به کلیلک به روی
            <a href="{{ route('auth.register.view') }}" class="text-red-500">ثبت نام</a>
            به صفحه ثبت نام وارد شوید
        </div>
        <div class="text-xs opacity-80">
            <a href="{{ route('auth.login.information-login') }}" class="text-red-500">ورود با کد یکبار مصرف</a>
        </div>
    </form>

@endsection
