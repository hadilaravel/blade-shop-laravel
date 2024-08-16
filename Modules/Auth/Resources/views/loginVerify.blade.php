@extends('auth::layouts.master')
@section('head-tag')
    <title>ورود با کد یکبار مصرف</title>
@endsection
@section('content')

    <form action="{{ route('auth.login.confirm.store' , $token) }}" method="post">
        @csrf
        <div class="mb-2">
            <a href="{{ route('home.index') }}">
                <img src="{{ asset($setting->logo_header) }}" alt="" class="w-36 mx-auto">
            </a>
        </div>
        <div style="width: 300px" class="opacity-80 text-lg mb-5">
            ورود با کد یکبار مصرف
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
    </form>

@endsection
