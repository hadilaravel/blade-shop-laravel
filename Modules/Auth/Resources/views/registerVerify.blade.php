@extends('auth::layouts.master')
@section('head-tag')
    <title>احراز هویت</title>
@endsection
@section('content')

    <form action="{{ route('auth.register.confirm.store' , $token) }}" method="post">
        @csrf
        <div class="mb-2">
            <a href="{{ route('home.index') }}">
                <img src="{{ asset($setting->logo_header) }}" alt="" class="w-36 mx-auto">
            </a>
        </div>
        <div style="width: 300px" class="opacity-80 text-lg mb-5">
            ورود
        </div>
        <div class="text-xs opacity-70 mb-2">
            کد ارسال شده به  {{ $loginId }} را وارد کنید:
        </div>
        <div class="mb-2">
            <input name="otp_code"  class="w-full drop-shadow-lg outline-none rounded-2xl py-2 text-center" type="text">
        </div>
        @error('otp_code')
        <div class="text-xs text-red-500 ">
            {{ $message }}
        </div>
        @enderror
        <div class="text-xs text-red-500" id="verify-code">
        </div>
        <div class="text-center mt-5 mb-3">
            <button class="bg-red-500 hover:bg-red-600 transition text-white opacity-80 rounded-2xl w-full py-2" type="submit">
                ورود
            </button>
        </div>
        <div class="flex justify-start items-center mt-5">
            <a class="border-b-2 text-sm border-red-500 hover:text-red-600 transition" href="{{ route('auth.register.send.code' , $token) }}">
               ارسال دوباره کد یک بار مصرف
            </a>
        </div>
        @if(session('success'))
            <div style="margin-top: 10px;color:#3fc72c" class="text-xs">
                {{ session('success') }}
            </div>
            @enderror
    </form>

@endsection
