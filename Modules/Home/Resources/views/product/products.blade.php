@extends('home::layouts.master')
@section('head-tag')

    <title>محصولات</title>

@endsection
@section('content')

    <div class="max-w-[1440px] mx-auto px-3">
        <div class="bg-white shadow-xl my-5 lg:my-10 rounded-xl md:rounded-2xl p-3 md:p-5">
            <div class="bg-white mx-5 rounded-2xl mb-4 grid">
                <div class="py-3">
                    <h3 class="text-xl font-semibold text-gray-800">جستجو محصولات</h3>
                </div>
            </div>
            <div class="md:flex">
                @include('home::product.side-bar')
                <div class="md:w-8/12 lg:w-9/12">
                    <div class="bg-white mx-1 rounded-2xl grid place-items-center">
                        <div class="w-full">
                            <div class="py-3 border-b">
                                <div class="opacity-90 text-sm mb-2">
                                    مرتب سازی:
                                </div>
                                <div class="flex flex-wrap gap-5 justify-start items-center">
                                    <div class="opacity-70 text-xs hover:text-red-500 transition cursor-pointer {{ request()->sort == 5 ? 'text-red-600' : '' }}">
                                        <a href="{{ route('home.products', [ 'category' => request()->category ? request()->category->id : null , 'search' => request()->search, 'sort' => '5', 'min_price' => request()->min_price, 'max_price' => request()->max_price , 'brands' => request()->brands ]) }}">
                                        پرفروش ترین
                                        </a>
                                    </div>
                                    <div class="opacity-70 text-xs hover:text-red-500 transition cursor-pointer {{ request()->sort == 3 ? 'text-red-600' : '' }}">
                                        <a href="{{ route('home.products', [ 'category' => request()->category ? request()->category->id : null , 'search' => request()->search, 'sort' => '3', 'min_price' => request()->min_price, 'max_price' => request()->max_price , 'brands' => request()->brands ]) }}">
                                        ارزان ترین
                                        </a>
                                    </div>
                                    <div class="opacity-70 text-xs hover:text-red-500 transition cursor-pointer {{ request()->sort == 2 ? 'text-red-600' : '' }}">
                                        <a href="{{ route('home.products', [ 'category' => request()->category ? request()->category->id : null , 'search' => request()->search, 'sort' => '2', 'min_price' => request()->min_price, 'max_price' => request()->max_price , 'brands' => request()->brands ]) }}">
                                        گران ترین
                                        </a>
                                    </div>
                                    <div class="opacity-70 text-xs hover:text-red-500 transition cursor-pointer {{ request()->sort == 4 ? 'text-red-600' : '' }}">
                                        <a href="{{ route('home.products', [ 'category' => request()->category ? request()->category->id : null , 'search' => request()->search, 'sort' => '4', 'min_price' => request()->min_price, 'max_price' => request()->max_price , 'brands' => request()->brands ]) }}">
                                        پربازدیدترین
                                        </a>
                                    </div>
                                    <div class="opacity-70 text-xs hover:text-red-500 transition cursor-pointer {{ request()->sort == 1 ? 'text-red-600' : '' }}">
                                        <a href="{{ route('home.products', [ 'category' => request()->category ? request()->category->id : null , 'search' => request()->search, 'sort' => '1', 'min_price' => request()->min_price, 'max_price' => request()->max_price , 'brands' => request()->brands ]) }}">
                                            جدیدترین
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-5 px-1 rounded-2xl py-5">
                            @forelse($products as $product)
                            <a href="{{ route('home.product.detail' , $product->slug) }}" class="my-2 py-2 md:p-3 border rounded-xl flex items-center sm:inline hover:shadow-lg transition">
                                <div class="image-box sm:mb-6">
                                    <div>
                                        <img class="hover:scale-105 transition rounded-md sm:rounded-3xl w-24 sm:w-full mx-auto" src="{{ asset($product->image) }}" alt="" />
                                    </div>
                                </div>
                                <div class="flex flex-col w-full">
                                        <span class="text-xs sm:text-sm opacity-90 mb-5">
                                           <div class="leading-7 h-auto">
                                               {{ $product->name }}
                                          </div>
                                          </span>
                                    @php
                                        $amazingSale = $product->activeAmazingSales();
                                       $totalDiscount = 0;
                                    @endphp
                                    @if(!empty($amazingSale))
                                        @php
                                            $totalDiscount = $product->price * ($amazingSale->percentage / 100);
                                        @endphp
                                        <div class="flex justify-center text-xs opacity-75">
                                            <div class="line-through">{{ priceFormat($product->price) }}</div>
                                            <div class="line-through">تومان</div>
                                        </div>
                                        <div class="flex justify-center mt-1 mb-2 text-sm">
                                            <div>{{ priceFormat($product->price - $totalDiscount) }}</div>
                                            <div>تومان</div>
                                        </div>
                                    @else
                                        <div class="flex justify-center mt-1 mb-2 text-sm">
                                            <div>{{ priceFormat($product->price) }}</div>
                                            <div>تومان</div>
                                        </div>
                                    @endif
                                </div>
                            </a>
                            @empty
                                <p>جست و جویی یافت نشد ! ! !</p>
                            @endforelse
                                {{ $products->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
    <script src="{{ asset('home-assets/js/rangeinput.js') }}"></script>
@endsection
