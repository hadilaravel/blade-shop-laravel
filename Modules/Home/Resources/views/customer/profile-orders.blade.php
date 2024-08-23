@extends('home::layouts.master')
@section('head-tag')

    <title>سفارشات خرید من‌</title>
    <link rel="canonical" href="{{ route('user.profile.orders') }}">

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
                    <div class="relative overflow-x-auto shadow-md rounded-xl">
                        <table class="w-full text-sm text-right text-gray-600">
                            <thead class="text-xs text-gray-700 bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    شماره سفارش
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    تاریخ ثبت سفارش
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    وضعیت پرداخت
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    نوع پرداخت
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    وضعیت سفارش
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    مجموع
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    جزئیات
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse ($orders as $order)
                            <tr class="hover:bg-gray-100 transition text-xs border-b">
                                <th scope="row" class="px-6 py-4 font-medium">
                                    {{ $order->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ convertEnglishToPersian(jdate($order->created_at)->format('Y-m-d')) }}
                                </td>
                                @if($order->payment_status == 0)
                                <td class="lg:px-6 py-4 text-red-500">
                                    {{ $order->paymentStatusValue }}
                                </td>
                                @elseif($order->payment_status == 1)
                                    <td class="lg:px-6 py-4 text-green-500">
                                        {{ $order->paymentStatusValue }}
                                    </td>
                                @elseif($order->payment_status == 2)
                                    <td class="lg:px-6 py-4 text-yellow-500">
                                        {{ $order->paymentStatusValue }}
                                    </td>
                                @else
                                    <td class="lg:px-6 py-4 text-gray-500">
                                        {{ $order->paymentStatusValue }}
                                    </td>
                                @endif
                                @if($order->payment_status == 0)
                                    <td class="lg:px-6 py-4 text-gray-500">
                                         در محل به صورت نقدی
                                    </td>
                                @elseif($order->payment_status == 1)
                                    <td class="lg:px-6 py-4 text-gray-500">
                                        با درگاه پرداخت زرین پال
                                    </td>
                                @endif
                                @if($order->order_status == 1)
                                    <td class="lg:px-6 py-4 text-yellow-500">
                                        {{ $order->orderStatusValue }}
                                    </td>
                                @elseif($order->order_status == 2)
                                    <td class="lg:px-6 py-4 text-red-500">
                                        {{ $order->orderStatusValue }}
                                    </td>
                                @elseif($order->order_status == 3)
                                    <td class="lg:px-6 py-4 text-green-500">
                                        {{ $order->orderStatusValue }}
                                    </td>
                                @elseif($order->order_status == 4)
                                    <td class="lg:px-6 py-4 text-red-500">
                                        {{ $order->orderStatusValue }}
                                    </td>
                                @elseif($order->order_status == 5)
                                    <td class="lg:px-6 py-4 text-yellow-500">
                                        {{ $order->orderStatusValue }}
                                    </td>
                                @else
                                    <td class="lg:px-6 py-4 text-gray-500">
                                        {{ $order->orderStatusValue }}
                                    </td>
                                @endif
                                <td class="px-6 py-4">
                                    تومان {{ priceFormat($order->order_final_amount) }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('user.profile.order-detail' , $order) }}" class="text-red-500 border-b border-red-400">مشاهده</a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('user.profile.payment') }}" class="text-green-500 border-b border-green-400">پرداخت</a>
                                </td>
                            </tr>
                            @empty
                                <p>سفارشی یافت نشد</p>
                            @endforelse
                            </tbody>
                        </table>
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
