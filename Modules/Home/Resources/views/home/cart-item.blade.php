@extends('home::layouts.master')
@section('head-tag')

    <title>سبد خرید</title>
    <link rel="canonical" href="{{ route('home.faq') }}">

@endsection
@section('content')

    <div class="max-w-[1440px] mx-auto px-3">
        <div class="bg-white shadow-xl my-5 lg:my-10 rounded-xl md:rounded-2xl p-3 md:p-5">
            <div class="relative overflow-x-auto rounded-2xl border">
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
                        <th scope="col" class="px-6 py-3">
                            دستورات
                        </th>
                    </tr>
                    </thead>
                    <tbody class="grid grid-cols-1 sm:grid-cols-2 md:contents gap-5">
                    @php
                        $totalProductPrice = 0;
                        $totalDiscount = 0;
                    @endphp
                    @foreach($cartItems as $cartItem)
                        @php
                            $totalProductPrice += $cartItem->cartItemFinalPrice();

                        @endphp
                    <tr class="bg-white border-b hover:bg-gray-50 grid grid-cols-1 justify-items-center md:table-row">
                        <td class="p-4">
                            <img src="{{ asset($cartItem->product->image) }}" class="w-48 md:w-32 max-w-full max-h-full rounded-lg" alt="">
                        </td>
                        <td class="md:pr-6 py-4 text-sm opacity-90 text-gray-900">
                            {{ $cartItem->product->name }}
                        </td>
                        <td class="px-6 py-4">
                          {{ $cartItem->number }}
                        </td>
                        <td class="px-6 py-4 text-sm opacity-90 text-gray-900">
                            {{ priceFormat($cartItem->cartItemFinalPrice()) }} تومان
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('user.profile.remove-cart' , $cartItem) }}" class=" text-red-600">حذف</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="border shadow-xl rounded-2xl mx-auto max-w-xl mt-7 flex flex-col gap-y-5 py-5 px-5 md:px-20">
                <div class="flex justify-between">
                    <div class="text-red-600">
                        مجموع نهایی:
                    </div>
                    <div class="flex gap-x-1">
                        <div>
                            {{ priceFormat($totalProductPrice) }}
                        </div>
                        <div>
                            تومان
                        </div>
                    </div>
                </div>
            </div>
            <a href="./checkout.html" class="flex justify-center items-center opacity-90 my-5">
                <button class="px-7 py-2 text-center text-white bg-red-500 align-middle border-0 rounded-lg shadow-md text-sm">تایید و پرداخت</button>
            </a>
        </div>
    </div>


@endsection

