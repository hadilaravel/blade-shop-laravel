@extends('home::layouts.master')
@section('head-tag')

    <title>پروفایل کاربری</title>
    <link rel="canonical" href="{{ route('user.profile') }}">

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

        <div class="bg-white shadow-xl my-5 lg:my-10 rounded-xl md:rounded-2xl p-3 md:p-5">
            <div class="flex flex-col md:flex-row gap-5">
                @include('home::customer.layouts.side-prof')
                <div class="md:w-8/12 lg:w-9/12">
                    <div class="border rounded-3xl shadow-lg flex flex-col p-5 gap-y-5">
                        <div class="border-b pb-3">اطلاعات شخصی</div>
                        <div class="flex border-b pb-2">
                            <div class="w-1/2">
                                <div class="text-xs opacity-80 mb-1">
                                    نام و نام خانوادگی:
                                </div>
                                <div class="text-sm opacity-90">
                                    {{ auth()->user()->name }}
                                </div>
                            </div>
                            <div class="w-1/2">
                                <div class="text-xs opacity-80 mb-1">
                                    ایمیل:
                                </div>
                                <div class="text-sm opacity-90">
                                    {{ auth()->user()->email ?? '-' }}
                                </div>
                            </div>
                        </div>
                        <div class="flex border-b pb-2">
                            <div class="w-1/2">
                                <div class="text-xs opacity-80 mb-1">
                                    شماره تلفن همراه:
                                </div>
                                <div class="text-sm opacity-90">
                                    {{ auth()->user()->mobile ?? '-' }}
                                </div>
                            </div>
                            <div class="w-1/2">
                                <div class="text-xs opacity-80 mb-1">
                                    تاریخ عضویت:
                                </div>
                                <div class="text-sm opacity-90">
                                    {{ convertEnglishToPersian(jdate(auth()->user()->created_at)->format('Y-m-d')) }}
                                </div>
                            </div>
                        </div>
                        <div class="flex border-b pb-2">
                            <div class="w-1/2">
                                <div class="text-xs opacity-80 mb-1">
                                    کدملی:
                                </div>
                                <div class="text-sm opacity-90">
                                    {{ auth()->user()->national_code ?? '-' }}
                                </div>
                            </div>
                        </div>
                        <span class="opacity-90">
            </span>
                    </div>
                </div>
            </div>
        </div>


@endsection
@section('script')
    <script src="{{ asset('home-assets/js/navbar.js') }}"></script>
    <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
@endsection
