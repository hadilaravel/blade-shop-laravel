<div class="bg-white rounded-2xl pt-10 shadow-xl my-10">
    <!-- TOP SLIDER -->
    <div class="flex justify-between px-5 md:px-10 items-center">
        <div class="border-b-2 border-red-500 pb-1">محصولات</div>
        <a href=""><div class="transition px-4 py-2 rounded-xl flex justify-center items-center text-red-500 hover:text-red-600">دیدن همه<img class="w-4" src="{{ asset('home-assets/image/arrow-left.png') }}" alt=""></div></a>
    </div>
    <!-- SLIDER -->
    <div class="containerPSlider swiper">
        <div class="slide-container1 px-2">
            <div class="card-wrapper swiper-wrapper py-4">
                @foreach($products as $product)
                <a href="{{ route('home.product.detail' , $product->slug) }}" class="card swiper-slide my-2 p-2 md:p-3 ">
                    <div class="image-box mb-6 ">
                        <div>
                            <img class="hover:scale-105 transition rounded-3xl w-full mx-auto" src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
                        </div>
                    </div>
                    <div class="space-y-3 text-center">
                  <span class="text-sm opacity-80 mb-2 h-8 md:h-10">
                    <div>
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
                @endforeach
            </div>
        </div>
    </div>
</div>
