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
                        <form action="{{ route('user.profile.add-to-cart' , $product->slug) }}" id="add_to_cart_form" method="post">
                            @csrf
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
                                                                    value="{{ $color->id }}"
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
                                                                data-guarantee-name="{{ $guarantee->name }}"  id="optionGuarantee"  data-guarantee-price="{{ $guarantee->price_increase }}"  @if($key == 0) selected @endif>{{ $guarantee->name }}</option>
                                                    @endforeach

                                                </select>
                                            </p>

                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="md:w-2/5 mt-5 md:mt-0">
                                @if($product->marketable == 1)
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
                                                تخفیف:
                                            </div>
                                            <div>
                                                قیمت نهایی :
                                            </div>
                                            <div>
                                                تعداد:
                                            </div>
                                        </div>
                                        <div class="text-left opacity-70 text-sm flex flex-col gap-y-6">
                                            <div id="guarantee_name">
                                            </div>
                                            <div>
                                                {{ $product->marketable_number }} عدد
                                            </div>
                                            <div class="flex text-red-500">
                                                <div data-product-original-price="{{ $product->price }}" id="product_price">
                                                    {{ priceFormat($product->price) }}
                                                </div>
                                                <div>
                                                    تومان
                                                </div>
                                            </div>
                                            @php

                                                $amazingSale = $product->activeAmazingSales();

                                            @endphp
                                            @if(!empty($amazingSale))
                                            <div class="flex text-red-500">
                                                <div  data-product-discount-price="{{ ($product->price * ($amazingSale->percentage / 100) ) }}" id="product-discount-price">
                                                    {{ priceFormat($product->price * ($amazingSale->percentage / 100) ) }}
                                                </div>
                                                <div>
                                                    تومان
                                                </div>
                                            </div>
                                            @endif

                                            <div class="flex text-red-500">
                                                <div id="final-price">
                                                </div>
                                                <div>
                                                    تومان
                                                </div>
                                            </div>

                                            <div class="flex text-sm sm:text-sm items-center justify-center lg:justify-start">
                                                <div class="flex items-center justify-center select-none">
                                                    <div class="divkk">
                                                    <button class="cart-number cart-number-down" type="button">-</button>
                                                    <input type="number" id="number" name="number" min="1" max="5" step="1" value="1" readonly="readonly"/>
                                                    <button class="cart-number cart-number-up" type="button">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="flex justify-center items-center opacity-90">
                                        @if($product->marketable_number > 0)
                                            @if(auth()->check())
                                              <button  onclick="document.getElementById('add_to_cart_form').submit();" class="px-7 py-2 text-center text-white bg-red-500 align-middle border-0 rounded-lg shadow-md text-sm">افزودن به سبد خرید</button>
                                            @else
                                                <p>
                                               کاربر گرامی لطفا برای افزودن به سبد خرید ابتدا وارد حساب کاربری خود شوید
                                              <a style="color: red" href="{{ route('auth.login.view') }}">کلیک کنید</a>
                                             </p>
                                            @endif
                                        @else
                                            <p>محصول ناموجود میباشد</p>
                                        @endif
                                      </span>
                                </div>
                                @else
                                    <span class="flex justify-center items-center opacity-90">
                                    <p style="background-color: gray;margin-top: 30px" class="px-7 py-2 text-center text-white align-middle border-0 rounded-lg shadow-md text-sm">محصول قابل فروش نیست</p>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </form>
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
                                @else
                                    <p>
                                        کاربر گرامی لطفا برای ثبت نظر ابتدا وارد حساب کاربری خود شوید
                                        <a style="color: red" href="{{ route('auth.login.view') }}">کلیک کنید</a>
                                    </p>

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
        $(document).ready(function(){
            //input color
            $('input[name="color"]').change(function(){
                bill();
                if($('input[name="color"]:checked').length != 0){
                    var selected_color = $('input[name="color"]:checked');
                    $("#selected_color_name").html(selected_color.attr('data-color-name'));
                }
            });

            var guarantee_name = $('#guarantee option:selected');
            $("#guarantee_name").html(guarantee_name.attr('data-guarantee-name'));

            $('select[name="guarantee"]').change(function(){
                bill();
                if($('#guarantee option:selected').length != 0)
                 {
                   var guarantee_name = $('#guarantee option:selected');
                   $("#guarantee_name").html(guarantee_name.attr('data-guarantee-name'));
                 }
            });

            //number
            $('.cart-number').click(function(){
                bill();
            })

        });

        function bill()
        {

            //price computing
            var selected_color_price = 0;
            var selected_guarantee_price = 0;
            var number = 1;
            var product_discount_price = 0;
            var product_original_price = parseFloat($('#product_price').attr('data-product-original-price'));

            if($('input[name="color"]:checked').length != 0)
            {
                var selected_color = $('input[name="color"]:checked');
                selected_color_price = parseFloat(selected_color.attr('data-color-price'));
            }

            // console.log('price color :' + selected_color_price)

            if($('#guarantee option:selected').length != 0)
            {
                selected_guarantee_price = parseFloat($('#guarantee option:selected').attr('data-guarantee-price'));
            }

            if($('#number').val() > 0)
            {
                number = parseFloat($('#number').val());
            }

            if($('#product-discount-price').length != 0)
            {
                product_discount_price = parseFloat($('#product-discount-price').attr('data-product-discount-price'));
            }

            var product_price = product_original_price + selected_color_price + selected_guarantee_price;
            var final_price = number * (product_price - product_discount_price);
            $('#product-price').html(toFarsiNumber(product_price) );
            $('#final-price').html(toFarsiNumber(final_price));

        }


        function toFarsiNumber(number)
        {
            const farsiDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
            // add comma
            number = new Intl.NumberFormat().format(number);
            //convert to persian
            return number.toString().replace(/\d/g, x => farsiDigits[x]);
        }

    </script>


@endsection
