@extends('home::layouts.master')
@section('head-tag')

    <title>{{ $product->name }}</title>
    <link rel="canonical" href="{{ route('home.product.detail' , $product->id) }}">

@endsection
@section('content')

    <div class="max-w-[1440px] mx-auto px-3">

        <div class="bg-white shadow-xl my-5 md:my-10 rounded-xl md:rounded-2xl p-3 md:p-5">
            <div class="p-3 w-11/12 mx-auto rounded-2xl">
                <div class="lg:flex">
                    <div class="w-full lg:w-1/3">

                        <div>
              <span class="flex items-center pr-20 pb-2">
                  @auth
                      @if($product->users->contains(auth()->user()->id))
                      <section class="product-add-to-favorite">
                                 <a class="aAddFavorits" href="{{ route('user.profile.add-to-favorite' , $product) }}"    data-bs-toggle="tooltip" data-bs-placement="left" title="حذف از علاقه مندی">
                                       <i style="color: red" class="fa fa-heart"></i>
                                   </a>
                        </section>
                      @else
                          <section class="product-add-to-favorite">
                                 <a class="aAddFavorits" href="{{ route('user.profile.add-to-favorite' , $product) }}"    data-bs-toggle="tooltip" data-bs-placement="left" title="اضافه کردن به علاقه مندی">
                                       <i  class="fa fa-heart-o"></i>
                                   </a>
                        </section>
                      @endif
                  @endauth

              </span>
                        </div>

                        <div>
                            <div class="max-w-[300px] mx-auto">
                                @php
                                    $key = 0;
                                    $pi = 0;
                                    $imageGalley = $product->images()->get();
                                    $images = collect();
                                    $images->push($product->image);
                                    foreach ($imageGalley as $image) {
                                        $images->push($image->image);
                                    }
                                @endphp
                                @foreach ($images as $image)
                                    @php
                                        $pi += 1;
                                    @endphp
                                <img class="mySlides rounded-xl md:rounded-3xl" src="{{ asset($image) }}" style="width:100%;display: {{ $pi == 1 ? 'block' : 'none' }}">
                                @endforeach

                            </div>
                            <div class="flex justify-around gap-x-4 mt-3">
                                @foreach ($images as $image)
                                    @php
                                    $key += 1;
                                    @endphp
                                    <div class="max-w-[80px]">
                                        <img class="rounded-xl opacity-70 hover:opacity-100 transition"
                                             src="{{ asset($image) }}" onclick="currentDiv({{ $key }})">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-2/3 mt-5 md:mt-0">
                        <div class="opacity-80 text-lg font-semibold">
                            {{ $product->name }}
                        </div>
                        <div class="md:flex sm:pr-7">
                            <div class="md:w-2/3">
                                @php
                                    $colors = $product->colors()->get();
                                @endphp
                                @if($colors->count() != 0)
                                    <div class="flex items-center">
                                        <div class="opacity-70 text-sm mb-1">
                                            رنگ بندی:
                                        </div>
                                        <div class="flex flex-wrap">
                                            <div class="flex items-center gap-x-2">
                                                <div class="flex w-max">

                                                    @foreach($colors as $key => $color)
                                                        <div class="inline-flex items-center">
                                                            <label
                                                                class="relative flex cursor-pointer items-center rounded-full p-3"
                                                                for="color_{{ $color->id }}"
                                                            >
                                                                <input
                                                                    id="color_{{ $color->id }}"
                                                                    name="color"
                                                                    data-color-name="{{ $color->name }}"
                                                                    data-color-price={{ $color->price_increase }}
                                                                        type="radio"
                                                                    style="color: {{ $color->color }};background-color: {{ $color->color }}"
                                                                    class="before:content[''] peer relative h-7 w-7 cursor-pointer appearance-none rounded-full border border-blue-200 bg-red-500 text-red-500 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-500 before:opacity-0 before:transition-opacity checked:border-red-500 checked:before:bg-red-500 hover:before:opacity-10"
                                                                />
                                                                <div
                                                                    class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4  opacity-0 transition-opacity peer-checked:opacity-100">
                                                                    <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-3.5 w-3.5"
                                                                        viewBox="0 0 16 16"
                                                                        fill="currentColor"
                                                                    >
                                                                        <circle data-name="ellipse" cx="8" cy="8"
                                                                                r="8"></circle>
                                                                    </svg>
                                                                </div>
                                                            </label>
                                                        </div>

                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <p><span>رنگ انتخاب شده : <span
                                                    id="selected_color_name"> {{ $colors->first()->name }}</span></span>
                                        </p>
                                    </div>
                                @endif

                                <div>
                                    <div class="mt-4 mb-2 opacity-80 text-sm font-semibold">
                                        ویژگی های محصول:
                                    </div>
                                    <div class="flex flex-col gap-y-2 text-xs">
                                        @foreach($product->metas as $meta)
                                            <div class=" flex items-center">
                                                <h3 class="opacity-60 ml-1">
                                                    {{ $meta->meta_key }}:
                                                </h3>
                                                <div class="opacity-80">
                                                    <div class="text-right">
                                                        {{ $meta->meta_value }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        @php
                                            $guarantees = $product->guarantees()->get();
                                        @endphp
                                        @if($guarantees->count() != 0)

                                            <p>
                                                گارانتی :
                                                <i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i>
                                                <select name="guarantee" id="guarantee" >
                                                    @foreach ($guarantees as $key => $guarantee)
                                                        <option value="{{ $guarantee->id }}"
                                                                data-guarantee-price={{ $guarantee->price_increase }}  @if($key == 0) selected @endif>{{ $guarantee->name }}</option>
                                                    @endforeach

                                                </select>
                                            </p>

                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="md:w-2/5 mt-5 md:mt-0">
                                <div class="pb-5 rounded-2xl shadow-xl border">
                                    <div class="flex justify-between px-3 py-5">
                                        <div class="text-right opacity-80 text-sm flex flex-col gap-y-6">
                                            <div>
                                                گارانتی:
                                            </div>
                                            <div>
                                                موجود در انبار:
                                            </div>
                                            <div>
                                                قیمت:
                                            </div>
                                            <div>
                                                تعداد:
                                            </div>
                                        </div>
                                        <div class="text-left opacity-70 text-sm flex flex-col gap-y-6">
                                            <div>
                                                6 ماهه تمام
                                            </div>
                                            <div>
                                                7 عدد
                                            </div>
                                            <div class="flex text-red-500">
                                                <div>
                                                    21,000,000
                                                </div>
                                                <div>
                                                    تومان
                                                </div>
                                            </div>
                                            <div
                                                class="flex text-sm sm:text-sm items-center justify-center lg:justify-start">
                                                <div class="flex items-center justify-center select-none">
                                                    <div class="quantity flex items-center">
                                                        <input
                                                            class="w-12 h-7 mx-2 text-center border focus:outline-none rounded-lg"
                                                            type="number" min="1" step="1" value="1" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="flex justify-center items-center opacity-90">
                    <button
                        class="px-7 py-2 text-center text-white bg-red-500 align-middle border-0 rounded-lg shadow-md text-sm">افزودن به سبد خرید</button>
                  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-around my-5">
                    <div class="flex flex-col items-center justify-center">
                        <div>
                            <img src="{{ asset('home-assets/image/services/cash-on-delivery.svg') }}" alt="">
                        </div>
                        <div class="opacity-70 text-xs">
                            پرداخت در محل
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <div>
                            <img src="{{ asset('home-assets/image/services/days-return.svg') }}" alt="">
                        </div>
                        <div class="opacity-70 text-xs">
                            قابل برگشت
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <div>
                            <img src="{{ asset('home-assets/image/services/express-delivery.svg') }}" alt="">
                        </div>
                        <div class="opacity-70 text-xs">
                            ارسال سریع
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <div>
                            <img src="{{ asset('home-assets/image/services/original-products.svg') }}" alt="">
                        </div>
                        <div class="opacity-70 text-xs">
                            ضمانت کالا
                        </div>
                    </div>
                </div>
                <!-- TABS -->
                <div class="mx-auto">
                    <div class="border-b border-gray-200 mb-4">
                        <ul class="flex justify-center flex-wrap -mb-px text-center" id="myTab"
                            data-tabs-toggle="#myTabContent" role="tablist">
                            <li class="mr-2" role="presentation">
                                <button
                                    class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 active"
                                    id="test-tab" data-tabs-target="#test" type="button" role="tab" aria-controls="test"
                                    aria-selected="true">درباره محصول
                                </button>
                            </li>
                            <li class="mr-2" role="presentation">
                                <button
                                    class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2"
                                    id="details-tab" data-tabs-target="#details" type="button" role="tab"
                                    aria-controls="details" aria-selected="false">مشخصات
                                </button>
                            </li>
                            <li role="presentation">
                                <button
                                    class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2"
                                    id="comments-tab" data-tabs-target="#comments" type="button" role="tab"
                                    aria-controls="comments" aria-selected="false">نظرات
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div id="myTabContent">

                        <div class="bg-gray-50 p-4 rounded-xl" id="test" role="tabpanel" aria-labelledby="test-tab">
                            <div class="flex flex-col items-start gap-y-4">
                <span class="border-b-red-500 border-b">
                معرفی کوتاه محصول
                </span>
                            </div>
                            <div class="md:flex gap-3">
                                <p class="text-gray-500 text-sm leading-7 mt-3">
                                    {!! $product->introduction !!}
                                </p>
                            </div>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-xl hidden" id="details" role="tabpanel"
                             aria-labelledby="details-tab">
              <span class="border-b-red-500 border-b">
                مشخصات فنی محصول
              </span>
                            <div class="text-gray-500 text-sm grid grid-cols-1 gap-x-3 md:grid-cols-2">
                                @foreach($product->metas as $meta)
                                <div
                                    class="flex items-center justify-between bg-gray-100 p-3 w-full my-3 mx-auto rounded-xl">
                                    <div class="text-xs opacity-80">
                                         {{ $meta->meta_key }}:
                                    </div>
                                    <div class="text-xs opacity-70">
                                           {{ $meta->meta_value }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-xl hidden" id="commentsBuy" role="tabpanel"
                             aria-labelledby="commentsBuy-tab">
              <span class="border-b-red-500 border-b">
                دیدگاه های محصول
              </span>
                            <p class="text-gray-500 text-sm">
                            <div class="flex flex-col py-4 px-4 mx-auto my-6 max-w-7xl rounded-2xl bg-white">
                                <!-- UO COMMENTS -->
                                <div>
                                    <div>دیدگاه ها</div>
                                    <div class="opacity-70 text-xs">1 دیدگاه</div>
                                </div>
                                <!-- COMMENT -->
                                <div class="bg-gray-50 rounded-xl px-3 sm:px-5 py-3 my-2">
                                    <div class="flex flex-col items-stat gap-y-2">
                                        <div class="flex items-center">
                                            <div class="text-green-400 bg-green-100 px-1 rounded-md text-sm">
                                                4.7
                                            </div>
                                            <div class="text-xs opacity-60 pr-1">
                                                ارسال شده توسط امیررضا کریمی
                                            </div>
                                            <div class="text-xs opacity-60 pr-1">
                                                1402/05/12
                                            </div>
                                        </div>
                                        <span
                                            class="text-green-400 bg-green-100 px-1 w-24 rounded-md text-sm text-center">
                        پیشنهاد شده
                      </span>
                                    </div>
                                    <div>
                                        <div class="opacity-60 text-sm py-3">
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                            لازم است.
                                        </div>
                                        <div class="flex flex-col gap-y-2">
                                            <div class="flex text-green-400 text-xs">
                                                <div>
                                                    +
                                                </div>
                                                <div>
                                                    طراحی زیبا
                                                </div>
                                            </div>
                                            <div class="flex text-green-400 text-xs">
                                                <div>
                                                    +
                                                </div>
                                                <div>
                                                    خوش دستی
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col gap-y-2 mt-2">
                                            <div class="flex text-red-400 text-xs">
                                                <div>
                                                    -
                                                </div>
                                                <div>
                                                    وزن زیاد
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex gap-x-4 justify-end">
                                        <a href="" class="flex">
                                            <span>5</span>
                                            <svg class="hover:fill-green-600" xmlns="http://www.w3.org/2000/svg"
                                                 width="20" height="20" fill="#797979" viewBox="0 0 256 256">
                                                <path
                                                    d="M232.49,81.44A22,22,0,0,0,216,74H158V56a38,38,0,0,0-38-38,6,6,0,0,0-5.37,3.32L76.29,98H32a14,14,0,0,0-14,14v88a14,14,0,0,0,14,14H204a22,22,0,0,0,21.83-19.27l12-96A22,22,0,0,0,232.49,81.44ZM30,200V112a2,2,0,0,1,2-2H74v92H32A2,2,0,0,1,30,200ZM225.92,97.24l-12,96A10,10,0,0,1,204,202H86V105.42l37.58-75.17A26,26,0,0,1,146,56V80a6,6,0,0,0,6,6h64a10,10,0,0,1,9.92,11.24Z">
                                                </path>
                                            </svg>
                                        </a>
                                        <a href="" class="flex">
                                            <span>1</span>
                                            <svg class="hover:fill-red-600" xmlns="http://www.w3.org/2000/svg"
                                                 width="20" height="20" fill="#797979" viewBox="0 0 256 256">
                                                <path
                                                    d="M237.83,157.27l-12-96A22,22,0,0,0,204,42H32A14,14,0,0,0,18,56v88a14,14,0,0,0,14,14H76.29l38.34,76.68A6,6,0,0,0,120,238a38,38,0,0,0,38-38V182h58a22,22,0,0,0,21.83-24.73ZM74,146H32a2,2,0,0,1-2-2V56a2,2,0,0,1,2-2H74Zm149.5,20.62A9.89,9.89,0,0,1,216,170H152a6,6,0,0,0-6,6v24a26,26,0,0,1-22.42,25.75L86,150.58V54H204a10,10,0,0,1,9.92,8.76l12,96A9.89,9.89,0,0,1,223.5,166.62Z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            </p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-xl hidden" id="comments" role="tabpanel"
                             aria-labelledby="comments-tab">
              <span class="border-b-red-500 border-b">
                پرسش های محصول
              </span>

                            <p class="text-gray-500 text-sm">
                            <div class="flex flex-col py-4 px-4 mx-auto my-6 max-w-7xl rounded-2xl bg-white">
                                <!-- UO COMMENTS -->
                                <div>
                                    <div>نظرات</div>
                                    <div class="pr-5 opacity-70 text-xs">{{ $product->activeComments()->count() }}نظر </div>
                                </div>
                                <!-- COMMENT -->

                                <div class="bg-gray-50 rounded-xl px-5 py-3 my-2">
                                    @forelse($product->activeComments() as $comment)
                                        <div class="flex items-center">
                                            <div>
                                                <img class="w-10" src="{{ asset($comment->user->profile) }}" alt="">
                                            </div>
                                            <div class="text-sm opacity-60 pr-1">
                                                نوشته شده توسط {{ $comment->user->name }}
                                            </div>
                                        </div>
                                        <div class="opacity-60 text-sm py-3">
                                            {{ $comment->body }}
                                        </div>
                                        <div>
                                            <button class="mr-auto px-2 sm:px-4 py-2 opacity-80 md:w-auto text-xs sm:text-sm xl:text-base flex justify-center items-center">
                                                پاسخ
                                            </button>
                                        </div>
                                        @if(!empty($comment->answers))
                                            @foreach($comment->answers as $answer)
                                            <!-- RESPONSE -->
                                                <div class="bg-gray-100 rounded-xl pl-2 pr-5 sm:pr-8 py-3">
                                                    <div class="flex items-center">
                                                        <div>
                                                            <img class="w-10" src="{{ asset($answer->user->profile) }}" alt="">
                                                        </div>
                                                        <div class="text-sm opacity-60 pr-1">
                                                            پاسخ داده شده توسط {{ $answer->user->name }}
                                                        </div>
                                                    </div>
                                                    <div class="opacity-60 text-sm py-3">
                                                        {!! $answer->body !!}
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                    @empty
                                        <p>نظری وجود ندارد</p>
                                    @endforelse
                                </div>

                                @if(auth()->check())
                                    <form action="{{ route('home.comments.product.store' , $product->id) }}" method="post" >
                                    @csrf
                                    <!-- BOX SENT COMMENT -->
                                        <div class="mb-4">
                                            <label for="mailTicket" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700">نظر شما:</label>
                                            <textarea cols="30" rows="5" name="body" class="text-sm block w-full rounded-lg border border-gray-400 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300">{{ old('body') }}</textarea>
                                            @error('body')
                                            <span  style="color: red">
                                   <strong>
                                        {{ $message }}
                                    </strong>
                              </span>
                                            @enderror
                                        </div>
                                        <button class="inline-block px-8 py-2 ml-auto font-semibold text-center text-white bg-red-500 rounded-lg shadow-md text-xs">ارسال نظر</button>
                                    </form>
                                @endif
                            </div>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- SLIDER -->
                <div class="bg-white rounded-2xl pt-10">
                    <!-- TOP SLIDER -->
                    <div class="flex justify-between px-5 md:px-10 items-center">
                        <div class="border-b-2 border-red-500 pb-1">مرتبط ترین ها</div>
                        <a href="#">
                            <div
                                class="transition px-4 py-2 rounded-xl flex justify-center items-center text-red-500 hover:text-red-600">
                                دیدن همه<img class="w-4" src="{{ asset('home-assets/image/arrow-left.png') }}" alt=""></div>
                        </a>
                    </div>
                    <!-- SLIDER -->
                    <div class="containerPSlider swiper">
                        <div class="slide-container1 px-2">
                            <div class="card-wrapper swiper-wrapper py-4">
                                @forelse($relatedProducts as $relatedProduct)
                                    <span class="card swiper-slide my-2 p-2 md:p-3 ">
                  <div class="image-box mb-6 ">
                    <a href="{{ route('home.product.detail' , $relatedProduct->slug) }}">
                      <img class="hover:scale-105 transition rounded-3xl w-full mx-auto"
                           src="{{ asset($relatedProduct->image) }}" alt="{{ $relatedProduct->name }}"/>
                    </a>
                  </div>
                  <div class="space-y-3 text-center">
                    <span class="text-sm opacity-80 mb-2 h-8 md:h-10">
                      <a href="{{ route('home.product.detail' , $relatedProduct->slug) }}">
                         {{ $relatedProduct->name }}
                      </a>
                    </span>

                      @php
                            $amazingSale = $relatedProduct->activeAmazingSales();
                              $totalDiscount = 0;
                       @endphp
                      @if(!empty($amazingSale))
                          @php
                              $totalDiscount = $relatedProduct->price * ($amazingSale->percentage / 100);
                          @endphp
                          <div class="flex justify-center text-xs opacity-75">
                        <div class="line-through">{{ priceFormat($relatedProduct->price) }}</div>
                        <div class="line-through">تومان</div>
                    </div>
                          <div class="flex justify-center mt-1 mb-2 text-sm">
                        <div>{{ priceFormat($relatedProduct->price - $totalDiscount) }}</div>
                        <div>تومان</div>
                    </div>
                      @else
                          <div class="flex justify-center mt-1 mb-2 text-sm">
                        <div>{{ priceFormat($relatedProduct->price) }}</div>
                        <div>تومان</div>
                    </div>
                      @endif

                  </div>
                </span>
                                @empty
                                    <p>محصولی وجود ندارد</p>
                                @endforelse
                            </div>
                        </div>
                        <div class="swiper-button-next swiper-navBtn"></div>
                        <div class="swiper-button-prev swiper-navBtn"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')

    <!-- showImageSingleProduct -->
    <script src="{{ asset('home-assets/js/showImageSingleProduct.js') }}"></script>
    <!-- TABS -->
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>

    <script>
        $(document).ready(function () {
            bill();
            //input color
            $('input[name="color"]').change(function () {
                bill();
            })
            //guarantee
            $('select[name="guarantee"]').change(function () {
                bill();
            })
            //number
            $('.cart-number').click(function () {
                bill();
            })
        })

        function bill() {
            if ($('input[name="color"]:checked').length != 0) {
                var selected_color = $('input[name="color"]:checked');
                $("#selected_color_name").html(selected_color.attr('data-color-name'));
            }

            //price computing
            var selected_color_price = 0;
            var selected_guarantee_price = 0;
            var number = 1;
            var product_discount_price = 0;
            var product_original_price = parseFloat($('#product_price').attr('data-product-original-price'));

            if ($('input[name="color"]:checked').length != 0) {
                selected_color_price = parseFloat(selected_color.attr('data-color-price'));
            }

            if ($('#guarantee option:selected').length != 0) {
                selected_guarantee_price = parseFloat($('#guarantee option:selected').attr('data-guarantee-price'));
            }

            if ($('#number').val() > 0) {
                number = parseFloat($('#number').val());
            }

            if ($('#product-discount-price').length != 0) {
                product_discount_price = parseFloat($('#product-discount-price').attr('data-product-discount-price'));
            }

            //final price
            var product_price = product_original_price + selected_color_price + selected_guarantee_price;
            var final_price = number * (product_price - product_discount_price);
            $('#product-price').html(toFarsiNumber(product_price));
            $('#final-price').html(toFarsiNumber(final_price));
        }

        function toFarsiNumber(number) {
            const farsiDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
            // add comma
            number = new Intl.NumberFormat().format(number);
            //convert to persian
            return number.toString().replace(/\d/g, x => farsiDigits[x]);
        }

    </script>


    <script>
        $('.product-add-to-favorite button').click(function () {
            var url = $(this).attr('data-url');
            var element = $(this);
            $.ajax({
                url: url,
                success: function (result) {
                    if (result.status == 1) {
                        $(element).children().first().addClass('text-danger');
                        $(element).attr('data-original-title', 'حذف از علاقه مندی ها');
                        $(element).attr('data-bs-original-title', 'حذف از علاقه مندی ها');
                    } else if (result.status == 2) {
                        $(element).children().first().removeClass('text-danger')
                        $(element).attr('data-original-title', 'افزودن از علاقه مندی ها');
                        $(element).attr('data-bs-original-title', 'افزودن از علاقه مندی ها');
                    } else if (result.status == 3) {
                        $('.toast').toast('show');
                    }
                }
            })
        })
    </script>

    <script>
        $('.product-add-to-compare button').click(function () {
            var url = $(this).attr('data-url');
            var element = $(this);
            $.ajax({
                url: url,
                success: function (result) {
                    if (result.status == 1) {
                        $(element).children().first().addClass('text-danger');
                        $(element).attr('data-original-title', 'حذف از  مقایسه ها');
                        $(element).attr('data-bs-original-title', 'حذف از  مقایسه ها');
                    } else if (result.status == 2) {
                        $(element).children().first().removeClass('text-danger')
                        $(element).attr('data-original-title', 'افزودن به  مقایسه ها');
                        $(element).attr('data-bs-original-title', 'افزودن به  مقایسه ها');
                    } else if (result.status == 3) {
                        $('.toast').toast('show');
                    }
                }
            })
        })
    </script>


    <script>

        //start product introduction, features and comment
        $(document).ready(function () {
            var s = $("#introduction-features-comments");
            var pos = s.position();
            $(window).scroll(function () {
                var windowpos = $(window).scrollTop();

                if (windowpos >= pos.top) {
                    s.addClass("stick");
                } else {
                    s.removeClass("stick");
                }
            });
        });
        //end product introduction, features and comment

    </script>



@endsection
