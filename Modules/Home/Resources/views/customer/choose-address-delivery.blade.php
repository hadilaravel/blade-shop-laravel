@extends('home::layouts.master')
@section('head-tag')

    <title>انتخاب آدرس و نوع ارسال</title>


    <link rel="stylesheet" href="{{ asset('home-assets/css/output.css') }}" />
    <link rel="stylesheet" href="{{ asset('home-assets/css/font.css') }}">

@endsection
@section('content')

    <div class="max-w-[1440px] mx-auto px-3">
        <div class="bg-white shadow-xl my-5 lg:my-10 rounded-xl md:rounded-2xl p-3 md:p-5">
            <div>
                <div class="text-lg md:text-xl opacity-70 mb-3">
                   انتخاب آدرس
                </div>
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color: red">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 px-5 md:px-20">
                    <div class="mb-4  address-select">
                            @foreach($addresses as $address)
                                <input type="radio"  name="address_id" style="opacity: 0" form="myForm" value="{{ $address->id }}" id="a-{{ $address->id }}" />
                            <label for="a-{{ $address->id }}"  class="address-wrapper">
                                <section class="mb-2">
                                    <i style="font-size: 20px" class="fa fa-map-marker mx-1"></i>
                                    آدرس : {{ $address->address ?? '-' }}
                                </section>
                                <section class="mb-2">
                                    <i style="font-size: 20px" class="fa fa-user mx-1"></i>
                                    گیرنده : {{ $address->recipient_first_name ?? '-' }}
                                    {{ $address->recipient_last_name ?? '-' }}
                                </section>
                                <section class="mb-2">
                                    <i style="font-size: 20px" class="fa fa-mobile-phone mx-1"></i>
                                    موبایل گیرنده : {{ $address->mobile ?? '-' }}
                                </section>
                                <span  class="address-selected">کالاها به این آدرس ارسال می شوند</span>
                            </label>

                        @endforeach
                    </div>
                </div>
                <div class="text-lg md:text-xl opacity-70 mb-3">
                    انتخاب نحوه ارسال
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 px-5 md:px-20">
                    <div class="mb-4  delivery-select">
                        @foreach($deliveries as $delivery)
                            <input type="radio"  name="delivery_id" style="opacity: 0" form="myForm" value="{{ $delivery->id }}" id="d-{{ $delivery->id }}" />
                            <label for="d-{{ $delivery->id }}"  class="delivery-wrapper">
                                <section class="mb-2">
                                    <i class="fa fa-ship mx-1"></i>
                                    {{ $delivery->name }}
                                </section>
                                <section class="mb-2">
                                    <i class="fa fa-calendar mx-1"></i>
                                    تامین کالا از {{ $delivery->delivery_time }} {{ $delivery->delivery_time_unit }} کاری آینده
                                </section>
                            </label>

                        @endforeach
                    </div>
                </div>
            </div>
            <form action="{{ route('user.profile.choose-address-and-delivery.store') }}" method="post" id="myForm">
                @csrf
            </form>
            <div href="#" class="flex justify-center items-center opacity-90 my-5">
                <button   onclick="document.getElementById('myForm').submit();" type="button" class="px-7 py-2 text-center text-white bg-red-500 align-middle border-0 rounded-lg shadow-md text-sm"> ادامه فرآیند خرید</button>
            </div>
        </div>
    </div>


@endsection
@section('script')
    <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script src="{{ asset('home-assets/js/navbar.js') }}"></script>
@endsection
