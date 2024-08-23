@extends('home::layouts.master')
@section('head-tag')

    <title>آدرس های من</title>
    <link rel="canonical" href="{{ route('user.profile.my-address') }}">

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
                <div class="md:w-8/12 lg:w-9/12 flex flex-col gap-y-5">
                    <a href="{{ route('user.profile.my-address.create') }}" class="px-7 py-2 text-center text-white bg-blue-500 align-middle border-0 rounded-lg shadow-md text-sm">ساخت آدرس</a>
                    @foreach(auth()->user()->addresses as $address)
                    <div class="border rounded-3xl shadow-lg flex flex-col p-5 gap-y-5">
                        <div >
                            <div class="text-xs opacity-80 mb-1">
                                آدرس:
                            </div>
                            <div class="text-sm opacity-90">
                                {{ \Illuminate\Support\Str::limit($address->address , 60) }}
                            </div>
                        </div>
                        <div class="md:grid grid-cols-2">
                            <div>
                                <div class="text-xs opacity-80 mb-1">
                                    شماره تلفن همراه:
                                </div>
                                <div class="text-sm opacity-90">
                                    {{ $address->mobile }}
                                </div>
                            </div>
                        </div>
                        <div class="w-1/2">
                            <div class="text-xs opacity-80 mb-1">
                                کد پستی:
                            </div>
                            <div class="text-sm opacity-90">
                                {{ $address->postal_code }}
                            </div>
                        </div>
                        <span class="opacity-90">
              <a href="{{ route('user.profile.my-address.edit' , $address->id) }}" class="px-7 py-2 text-center text-white bg-blue-500 align-middle border-0 rounded-lg shadow-md text-sm">ویرایش آدرس</a>
              <a  href="{{ route('user.profile.my-address.delete' , $address->id) }}" class="px-7 py-2 text-center text-white bg-red-500 align-middle border-0 rounded-lg shadow-md text-sm">حذف</a>
            </span>
                    </div>
                    @endforeach
                </div>


            </div>
        </div>


@endsection
@section('script')
    <script src="{{ asset('home-assets/js/navbar.js') }}"></script>
    <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
@endsection
