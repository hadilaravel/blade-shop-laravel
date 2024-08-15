@extends('auth::layouts.master')
@section('head-tag')
    <title>پر کردن اطلاعات</title>
@endsection
@section('content')

    <form action="{{ route('auth.register.information.store') }}" method="post">
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
            نام و نام خانوادگی:
        </div>
        <div class="mb-2">
            <input name="name" value="{{ old('name') }}" class="w-full drop-shadow-lg outline-none rounded-2xl py-2 text-center" type="text">
        </div>
        @error('name')
        <div class="text-xs text-red-500 ">
            {{ $message }}
        </div>
        @enderror
        <div class="text-xs opacity-70 mb-2">
           نام کاربری :
        </div>
        <div class="mb-2">
            <input name="username" value="{{ old('username') }}" class="w-full drop-shadow-lg outline-none rounded-2xl py-2 text-center" type="text">
        </div>
        @error('username')
        <div class="text-xs text-red-500 ">
            {{ $message }}
        </div>
        @enderror
        <div class="text-xs opacity-70 mb-2">
            رمز عبور :
        </div>
        <div class="mb-2">
            <input name="password" class="w-full drop-shadow-lg outline-none rounded-2xl py-2 text-center" type="password">
        </div>
        @error('password')
        <div class="text-xs text-red-500 ">
            {{ $message }}
        </div>
        @enderror
        <div class="text-xs opacity-70 mb-2">
            تاییدیه رمز عبور :
        </div>
        <div class="mb-2">
            <input name="password_confirmation" class="w-full drop-shadow-lg outline-none rounded-2xl py-2 text-center" type="password">
        </div>
        @error('password_confirmation')
        <div class="text-xs text-red-500 ">
            {{ $message }}
        </div>
        @enderror
        <div class="text-center mt-5 mb-3">
            <button class="bg-red-500 hover:bg-red-600 transition text-white opacity-80 rounded-2xl w-full py-2" type="submit">
                ورود
            </button>
        </div>
    </form>

@endsection
