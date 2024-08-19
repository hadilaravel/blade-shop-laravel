<div class="flex justify-between px-5 py-5 rounded-xl md:px-10 items-center mt-10 mb-2 bg-white">
    <div class="border-b-2 border-red-500 pb-1">آخرین پیشنهاد</div>
    <a href="{{ route('home.products' , ['sort' => 1]) }}"><div class="transition px-4 py-2 rounded-xl flex justify-center items-center text-red-500 hover:text-red-600">دیدن همه<img class="w-4" src="{{ asset('home-assets/image/arrow-left.png') }}" alt=""></div></a>
</div>
<div class="lg:flex items-start gap-5">
    <div class="lg:w-1/3 mb-5 gap-5 lg:mb-0 grid justify-items-center grid-cols-1 sm:grid-cols-2 lg:block">
        @php
        $i = 0;
        @endphp
        @foreach($bannerLastOffers as $bannerLastOffer)
            @php
             $i += 1;
            @endphp
            <img class="rounded-xl {{ $i == 1 ? 'mx-auto' : 'lg:hidden' }}" src="{{ $bannerLastOffer->image }}" alt="">
        @endforeach
    </div>
    <div class="lg:w-2/3">
        <div class="swiper timerProduct border rounded-xl">
            <div class="swiper-wrapper bg-white">
                @foreach($latestProducts as $latestProduct)
                <a href="{{ route('home.product.detail' , $latestProduct->slug) }}" class="swiper-slide md:flex bg-white" style="display: flex;">
                    <div class="md:w-1/3">
                        <img class="max-w-80 w-auto mx-auto rounded-xl" src="{{ asset($latestProduct->image) }}" alt="{{ $latestProduct->name }}">
                    </div>
                    <div class="md:w-2/3 flex flex-col justify-center py-5">
                        <div class="mx-auto">
                            <div class="text-zinc-800 text-lg">
                               {{ $latestProduct->name }}
                            </div>
                        </div>
                        <div class="mt-7 mx-auto">
                            @php
                               $amazingSale = $latestProduct->activeAmazingSales();
                              $totalDiscount = 0;
                            @endphp
                            @if(!empty($amazingSale))
                                @php
                                    $totalDiscount = $latestProduct->price * ($amazingSale->percentage / 100);
                                @endphp
                                <div class="text-zinc-800 text-xl font-semibold">
                                    {{ priceFormat($latestProduct->price - $totalDiscount) }} تومان
                                </div>
                                <div class="text-zinc-400 text-sm mt-1 line-through">
                                     {{ priceFormat($latestProduct->price)  }} تومان
                                </div>
                            @else
                                <div class="text-zinc-800 text-xl font-semibold">
                                    {{ priceFormat($latestProduct->price)  }} تومان
                                </div>
                            @endif
                        </div>
                        <div class="flex w-96 mt-5 mx-auto">
                            @foreach($latestProduct->metas->chunk(3) as $metaProducts)
                            <div class="w-1/2">
                                @foreach($metaProducts as $metaProduct)
                                <div class="flex gap-x-1 text-zinc-600 text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#16a70c" viewBox="0 0 256 256"><path d="M225.86,102.82c-3.77-3.94-7.67-8-9.14-11.57-1.36-3.27-1.44-8.69-1.52-13.94-.15-9.76-.31-20.82-8-28.51s-18.75-7.85-28.51-8c-5.25-.08-10.67-.16-13.94-1.52-3.56-1.47-7.63-5.37-11.57-9.14C146.28,23.51,138.44,16,128,16s-18.27,7.51-25.18,14.14c-3.94,3.77-8,7.67-11.57,9.14C88,40.64,82.56,40.72,77.31,40.8c-9.76.15-20.82.31-28.51,8S41,67.55,40.8,77.31c-.08,5.25-.16,10.67-1.52,13.94-1.47,3.56-5.37,7.63-9.14,11.57C23.51,109.72,16,117.56,16,128s7.51,18.27,14.14,25.18c3.77,3.94,7.67,8,9.14,11.57,1.36,3.27,1.44,8.69,1.52,13.94.15,9.76.31,20.82,8,28.51s18.75,7.85,28.51,8c5.25.08,10.67.16,13.94,1.52,3.56,1.47,7.63,5.37,11.57,9.14C109.72,232.49,117.56,240,128,240s18.27-7.51,25.18-14.14c3.94-3.77,8-7.67,11.57-9.14,3.27-1.36,8.69-1.44,13.94-1.52,9.76-.15,20.82-.31,28.51-8s7.85-18.75,8-28.51c.08-5.25.16-10.67,1.52-13.94,1.47-3.56,5.37-7.63,9.14-11.57C232.49,146.28,240,138.44,240,128S232.49,109.73,225.86,102.82Zm-11.55,39.29c-4.79,5-9.75,10.17-12.38,16.52-2.52,6.1-2.63,13.07-2.73,19.82-.1,7-.21,14.33-3.32,17.43s-10.39,3.22-17.43,3.32c-6.75.1-13.72.21-19.82,2.73-6.35,2.63-11.52,7.59-16.52,12.38S132,224,128,224s-9.15-4.92-14.11-9.69-10.17-9.75-16.52-12.38c-6.1-2.52-13.07-2.63-19.82-2.73-7-.1-14.33-.21-17.43-3.32s-3.22-10.39-3.32-17.43c-.1-6.75-.21-13.72-2.73-19.82-2.63-6.35-7.59-11.52-12.38-16.52S32,132,32,128s4.92-9.15,9.69-14.11,9.75-10.17,12.38-16.52c2.52-6.1,2.63-13.07,2.73-19.82.1-7,.21-14.33,3.32-17.43S70.51,56.9,77.55,56.8c6.75-.1,13.72-.21,19.82-2.73,6.35-2.63,11.52-7.59,16.52-12.38S124,32,128,32s9.15,4.92,14.11,9.69,10.17,9.75,16.52,12.38c6.1,2.52,13.07,2.63,19.82,2.73,7,.1,14.33.21,17.43,3.32s3.22,10.39,3.32,17.43c.1,6.75.21,13.72,2.73,19.82,2.63,6.35,7.59,11.52,12.38,16.52S224,124,224,128,219.08,137.15,214.31,142.11ZM173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34Z"></path></svg>
                                    {{ $metaProduct->meta_key }} : {{ $metaProduct->meta_value }}
                                </div>
                                @endforeach
                            </div>
                            @endforeach

                        </div>
                    </div>
                </a>
                @endforeach

            </div>
        </div>
    </div>
</div>
