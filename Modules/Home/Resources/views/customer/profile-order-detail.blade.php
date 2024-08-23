@extends('home::layouts.master')
@section('head-tag')

    <title>جزئیات سفارش</title>

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
                    <div class="rounded-xl">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="hidden md:table-header-group text-xs text-gray-700 bg-gray-50">
                            <tr>
                                <th scope="col" class="px-16 py-3">
                                    <span class="sr-only">تصویر</span>
                                </th>
                                <th scope="col" class="md:pr-6 py-3">
                                    نام محصول
                                </th>
                                <th scope="col" class="pr-10 py-3">
                                    تعداد
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    قیمت
                                </th>
                            </tr>
                            </thead>
                            <tbody class="grid grid-cols-1 sm:grid-cols-2 md:contents gap-5">
                            @foreach($order->orderItems()->get() as $orderItem)
                            <tr class="bg-white border-b hover:bg-gray-50 grid grid-cols-1 justify-items-center md:table-row">
                                <td class="p-4">
                                    <img src="{{ asset($orderItem->singleProduct->image) }}" class="w-48 md:w-32 max-w-full max-h-full rounded-lg" alt="">
                                </td>
                                <td class="md:pr-6 py-4 text-sm opacity-90 text-gray-900">
                                    {{ $orderItem->singleProduct->name }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="quantity flex items-center">
                                        {{ $orderItem->number }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm opacity-90 text-gray-900">
                                   تومان  {{ priceFormat($orderItem->final_total_price) }}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="border shadow-xl rounded-2xl mx-auto max-w-xl mt-7 flex flex-col gap-y-5 py-5 px-5 md:px-20 text-sm">
                            <div class="flex justify-between">
                                <div>
                                    قیمت کل:
                                </div>
                                <div class="flex gap-x-1">
                                    <div>
                                         {{ priceFormat($order->order_final_amount) }}
                                    </div>
                                    <div>
                                        تومان
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between">
                                <div class="ml-2">
                                    آدرس ارسال شده:
                                </div>
                                <div>
                                    {{ $order->address->address }}
                                </div>
                            </div>
                        </div>
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
