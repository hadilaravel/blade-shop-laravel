@extends('auth::layouts.master')
@section('head-tag')
    <title>ورود با کد یکبار مصرف</title>
@endsection
@section('content')

    <form action="{{ route('auth.login.information-login.store') }}" method="post">
        @csrf
        <div class="mb-2">
            <a href="{{ route('home.index') }}">
                <img src="{{ asset($setting->logo_header) }}" alt="" class="w-36 mx-auto">
            </a>
        </div>
        <div  style="width: 300px" class="opacity-80 text-lg mb-5">
            ورود با کد یکبار مصرف
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
        <div class="text-center mt-5 mb-3">
            <button class="bg-red-500 hover:bg-red-600 transition text-white opacity-80 rounded-2xl w-full py-2" type="submit">
                ورود
            </button>
        </div>
        <div class="text-xs opacity-80">
            <a href="{{ route('auth.login.view') }}" class="text-red-500">بازگشت</a>
        </div>
    </form>

@endsection
