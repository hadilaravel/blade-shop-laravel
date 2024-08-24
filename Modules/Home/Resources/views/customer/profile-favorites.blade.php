@extends('home::layouts.master')
@section('head-tag')

    <title>علاقه مندی های من</title>
    <link rel="canonical" href="{{ route('user.profile.my-favorites') }}">

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
                                <th scope="col" class="px-6 py-3">
                                    قیمت
                                </th>
                                <!-- <th scope="col" class="pr-10 py-3">
                                  افزودن به سبدخرید
                                </th> -->
                                <th scope="col" class="px-4 py-3">
                                    دستورات
                                </th>
                            </tr>
                            </thead>
                            <tbody class="grid grid-cols-1 sm:grid-cols-2 md:contents gap-5">
                            @forelse (auth()->user()->products as $product)
                            <tr class="bg-white border-b hover:bg-gray-50 grid grid-cols-1 justify-items-center md:table-row">
                                <td class="p-4">
                                    <img src="{{ asset($product->image) }}" class="w-48 md:w-32 max-w-full max-h-full rounded-lg" alt="{{ $product->name }}">
                                </td>
                                <td class="md:pr-6 py-4 text-sm opacity-90 text-gray-900">
                                   {{ \Illuminate\Support\Str::limit($product->name , 30) }}
                                </td>
                                <td class="px-6 py-4 text-sm opacity-90 text-gray-900">
                                    @php
                                        $amazingSale = $product->activeAmazingSales();
                                       $totalDiscount = 0;
                                    @endphp
                                    @if(!empty($amazingSale))
                                        @php
                                            $totalDiscount = $product->price * ($amazingSale->percentage / 100);
                                        @endphp
                                    {{  priceFormat($product->price - $totalDiscount) }} تومان
                                    @else
                                        {{ priceFormat($product->price) }} تومان
                                    @endif
                                </td>
                                <td class="px-2 py-4">
                                    <a href="{{ route('user.profile.my-favorites.delete' , $product->id) }}" class="text-red-600">حذف</a>
                                    <a href="{{ route('home.product.detail' , $product->slug) }}" class="text-white bg-green-500 hover:bg-green-600 transition px-2 py-1 shadow-lg rounded-md mr-3">مشاهده</a>
                                </td>
                            </tr>
                            @empty
                                <p>محصولی یافت نشد</p>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>


@endsection
