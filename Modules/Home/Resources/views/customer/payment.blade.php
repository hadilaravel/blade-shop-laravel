@extends('home::layouts.master')
@section('head-tag')

    <title>پرداخت</title>


    <link rel="stylesheet" href="{{ asset('home-assets/css/output.css') }}" />
    <link rel="stylesheet" href="{{ asset('home-assets/css/font.css') }}">

@endsection
@section('content')

    <div class="max-w-[1440px] mx-auto px-3">
        <div class="bg-white shadow-xl my-5 lg:my-10 rounded-xl md:rounded-2xl p-3 md:p-5">
            <div class="flex flex-col md:flex-row gap-y-3 items-center gap-x-2 mb-7">

            <div class="text-sm opacity-80">
                کد تخفیف دارید؟ وارد کنید:
            </div>
            <div>
                <input name="copan" form="myFormCopan" class="border border-gray-400 outline-none focus:border-red-300 rounded-lg p-1" type="text">
            </div>

            <div>
                <button type="button" class="bg-red-600 text-white px-3 py-1 rounded-lg shadow-md"
                        onclick="document.getElementById('myFormCopan').submit();"
                >
                    اعمال کد تخفیف
                </button>
            </div>
                @error('copan')
                <p style="color: red">
                    {{ $message }}
                </p>
                @enderror
            </div>

              <form action="{{ route('user.profile.copan-discount') }}" method="post" id="myFormCopan">
                            @csrf
              </form>

                <div class="text-lg md:text-xl opacity-70 mb-3">
                   انتخاب نوع پرداخت
                </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 px-5 md:px-20">
                <div class="mb-4  delivery-select">

                    <input type="radio"  name="payment_type" style="opacity: 0" form="paymentSubmit" value="1" id="d1" />
                    <label for="d1"  class="delivery-wrapper">
                        <section class="mb-2">
                            <i class="fa fa-credit-card-alt mx-1"></i>
                            پرداخت آنلاین
                        </section>
                        <section class="mb-2">
                            <i class="fa fa-calendar mx-1"></i>
                            درگاه پرداخت زرین پال
                        </section>
                    </label>

                    <input type="radio"  name="payment_type" style="opacity: 0" form="paymentSubmit" value="2" id="d2" />
                    <label for="d2"  class="delivery-wrapper">
                        <section class="mb-2">
                            <i class="fa fa-money mx-1"></i>
                            پرداخت در محل
                        </section>
                        <section class="mb-2">
                            <i class="fa fa-calendar mx-1"></i>
                            پرداخت به پیک هنگام دریافت کالا
                        </section>
                    </label>

                </div>
                @error('payment_type')
                <p style="color: red">
                    {{ $message }}
                </p>
                @enderror

                @error('error')
                <p style="color: red">
                    {{ $message }}
                </p>
                @enderror
            </div>


            @php
                $totalProductPrice = 0;
                $totalDiscount = 0;
            @endphp
            @foreach ($cartItems as $cartItem)
                @php
                    $totalProductPrice += $cartItem->cartItemProductPrice() * $cartItem->number;
                    $totalDiscount += $cartItem->cartItemProductDiscount() * $cartItem->number;
                @endphp
            @endforeach
            <div class="border shadow-xl rounded-2xl mx-auto max-w-xl mt-7 flex flex-col gap-y-5 py-5 px-5 md:px-20">
            <div class="flex justify-between">
                <div>
                    قیمت کالاها
                   ({{ $cartItems->count() }})
                    :
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
                @if ($totalDiscount != 0)
                <div class="flex justify-between">
                    <div>
                        تخفیف کالاها
                        :
                    </div>
                    <div class="flex gap-x-1">
                        <div>
                            {{ priceFormat($totalDiscount) }}
                        </div>
                        <div>
                            تومان
                        </div>
                    </div>
                </div>
                @endif

                @if (!empty($order->commonDiscount))
                <div class="flex justify-between">
                    <div>
                        میزان تخفیف عمومی
                        :
                    </div>
                    <div class="flex gap-x-1">
                        <div>
                            {{ priceFormat($order->commonDiscount->percentage) }}
                        </div>
                        <div>
                            درصد
                        </div>
                    </div>
                </div>

                    <div class="flex justify-between">
                        <div>
                            میزان حداکثر تخفیف عمومی
                            :
                        </div>
                        <div class="flex gap-x-1">
                            <div>
                                {{ priceFormat($order->commonDiscount->discount_ceiling) }}
                            </div>
                            <div>
                                تومان
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <div>
                            حداقل موجودی سبد خرید
                            :
                        </div>
                        <div class="flex gap-x-1">
                            <div>
                                {{ priceFormat($order->commonDiscount->minimal_order_amount) }}
                            </div>
                            <div>
                                تومان
                            </div>
                        </div>
                    </div>
                @endif

            <div class="flex justify-between">
                <div class="text-red-600">
                    مجموع نهایی:
                </div>
                <div class="flex gap-x-1">
                    <div>
                       {{  priceFormat($order->order_final_amount)  }}
                    </div>
                    <div>
                        تومان
                    </div>
                </div>
            </div>
        </div>

            <form action="{{ route('user.profile.payment-submit') }}"  method="post" id="paymentSubmit">
                @csrf
            </form>

        <div href="#" class="flex justify-center items-center opacity-90 my-5">
                <button   onclick="document.getElementById('paymentSubmit').submit();" type="button" class="px-7 py-2 text-center text-white bg-red-500 align-middle border-0 rounded-lg shadow-md text-sm"> ثبت سفارش و کد رهگیری </button>
            </div>
        </div>
    </div>
    </div>


@endsection
@section('script')
    <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script src="{{ asset('home-assets/js/navbar.js') }}"></script>
@endsection
