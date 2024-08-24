@extends('home::layouts.master')
@section('head-tag')

    <title>اطلاعات من</title>
    <link rel="canonical" href="{{ route('user.profile.personal-info') }}">

    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('home-assets/css/output.css') }}" />
    <link rel="stylesheet" href="{{ asset('home-assets/css/font.css') }}">

@endsection
@section('content')

        <form action="{{ route('user.profile.personal-info.store') }}" method="post" enctype="multipart/form-data" class="bg-white shadow-xl my-5 lg:my-10 rounded-xl md:rounded-2xl p-3 md:p-5">
            @csrf
            <div class="flex flex-col md:flex-row gap-5">
                @include('home::customer.layouts.side-prof')
                <div class="md:w-8/12 lg:w-9/12 flex flex-col gap-y-5">
                        <div class="sm:grid grid-cols-2 gap-x-5">
                            <div class="mb-4">
                                <label for="name" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700">نام و نام خانوادگی</label>
                                <input name="name" value="{{ auth()->user()->name }}" type="text" class="text-sm block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300"/>
                                @error('name')
                                <div class="text-xs text-red-500 ">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="username" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700">نام کاربری</label>
                                <input type="text" name="username" value="{{ auth()->user()->username }}" class="text-sm block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300"/>
                                @error('username')
                                <div class="text-xs text-red-500 ">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="username" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700"> کد ملی</label>
                                <input type="number" name="national_code" value="{{ auth()->user()->national_code }}" class="text-sm block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300"/>
                                @error('national_code')
                                <div class="text-xs text-red-500 ">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            @if(empty(auth()->user()->mobile) || empty(auth()->user()->mobile_verified_at) )
                            <div class="mb-4">
                                <label for="username" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700">شماره همراه</label>
                                <input type="number" name="mobile" value="{{ auth()->user()->mobile }}" class="text-sm block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300"/>
                                @error('mobile')
                                <div class="text-xs text-red-500 ">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            @endif
                        @if(empty(auth()->user()->email) || empty(auth()->user()->email_verified_at) )
                            <div class="mb-4">
                                <label for="username" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700">ایمیل</label>
                                <input type="email" name="email" value="{{ auth()->user()->email }}" class="text-sm block w-full appearance-none rounded-lg border border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300"/>
                                @error('email')
                                <div class="text-xs text-red-500 ">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            @endif
                            <div class="mb-4">
                                <label for="username" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700">رمز عبور جدید</label>
                                <input name="password" type="password" class="text-sm block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300"/>
                                @error('password')
                                <div class="text-xs text-red-500 ">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="username" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700">تکرار رمز عبور جدید</label>
                                <input type="password" name="password_confirmation" class="text-sm block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300"/>
                            </div>
                            <div class="flex items-center pt-7 h-16">
                <span class="w-auto ml-2 font-semibold text-xs text-slate-700">
                  تغییر عکس پروفایل
                </span>
                                <label for="dropzone-file" class="w-8/12 sm:w-1/3 flex flex-col items-center justify-center border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                    <div class="flex flex-col items-center justify-center p-1">
                                        <svg class="w-6 h-6 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                    </div>
                                    <input id="dropzone-file" name="profile" type="file" class="hidden" />
                                </label>
                                @if(!empty(auth()->user()->profile))
                                <img src="{{ asset(auth()->user()->profile) }}" width="100px" height="100px">
                                @endif
                                @error('profile')
                                <div class="text-xs text-red-500 ">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <span class="opacity-90">
              <button class="px-7 py-2 text-center text-white bg-blue-500 align-middle border-0 rounded-lg shadow-md text-sm">ثبت</button>
            </span>
                    </div>
                </div>
            </div>
        </div>
        </form>


@endsection
