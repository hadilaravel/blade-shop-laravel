<!-- FOOTER -->
<footer class="pt-5 shadow-xl bg-white">
    <!-- SERVICES -->
    <div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-y-5 gap-x-10 justify-items-center mb-10">
            <div class="flex justify-center items-center flex-col rounded-3xl w-32 h-24">
                <img class="w-20" src="{{ asset('home-assets/image/services/cash-on-delivery.svg') }}" alt="">
                <span class="text-sm opacity-80">
          پرداخت درب منزل
          </span>
            </div>
            <div class="flex justify-center items-center flex-col rounded-3xl w-32 h-24">
                <img class="w-20" src="{{ asset('home-assets/image/services/days-return.svg') }}" alt="">
                <span class="text-sm opacity-80">
            ضمانت بازگشت کالا
          </span>
            </div>
            <div class="flex justify-center items-center flex-col rounded-3xl w-32 h-24">
                <img class="w-20" src="{{ asset('home-assets/image/services/express-delivery.svg') }}" alt="">
                <span class="text-sm opacity-80">
            تحویل سریع
          </span>
            </div>
            <div class="flex justify-center items-center flex-col rounded-3xl w-32 h-24">
                <img class="w-20" src="{{ asset('home-assets/image/services/original-products.svg') }}" alt="">
                <span class="text-sm opacity-80">
            ضمانت اصل بودن
          </span>
            </div>
        </div>
    </div>
    <!-- MAIN -->
    <div class="flex items-center justify-between my-4 px-5">
        <a href="{{ route('home.index') }}" class="inline-block">
            <img
                src="{{ asset($setting->logo_footer) }}"
                alt="logo"
                class="w-48"
            />
        </a>
        <button type="button" class="flex items-center gap-x-1 border rounded-lg px-3 py-2 text-zinc-500 text-sm md:text-base" id="btn-back-to-top">
            برو به بالا
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#9c9c9c" viewBox="0 0 256 256"><path d="M128,26A102,102,0,1,0,230,128,102.12,102.12,0,0,0,128,26Zm0,192a90,90,0,1,1,90-90A90.1,90.1,0,0,1,128,218Zm44.24-78.24a6,6,0,1,1-8.48,8.48L128,112.49,92.24,148.24a6,6,0,0,1-8.48-8.48l40-40a6,6,0,0,1,8.48,0Z"></path></svg>
        </button>
    </div>
    <div class="mx-auto shadow-lg">
        <div class="flex flex-wrap">
            <div class="w-full px-4 sm:w-2/3 lg:w-4/12">
                <div class="mb-10 w-full">
                    <p class="mb-2 opacity-80">
                        {{ $setting->title }}
                    </p>
                    <p class="mb-7 opacity-60 text-sm">
                        {{ $setting->title }} به عنوان یکی از بروزترین فروشگاه های اینترنتی با بیش از هفت سال تجربه، با پایبندی به اعتماد مشتری، موفق شده تا با فروشگاه‌های معتبر ایران به یکی از بزرگ‌ترین فروشگاه اینترنتی کشور تبدیل شود. هر آنچه که فکرش را بکنید و به ذهن شما خطور می‌کند در اینجا پیدا خواهید کرد.
                    </p>
                </div>
            </div>
            <div class="w-full px-4 sm:w-1/2 lg:w-3/12">
                <div class="mb-10 w-full">
                    <h4 class="mb-2 opacity-80">لینک های مفید:</h4>
                    <ul class="grid gap-y-2">
                        <li>
                            <a
                                href="{{ route('home.index') }}"
                                class="mb-2 text-sm hover:text-red-600 transition opacity-60 hover:opacity-100"
                            >
                                خانه
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('home.about') }}"
                                class="mb-12 text-sm hover:text-red-600 transition opacity-60 hover:opacity-100"
                            >
                                درباره ما
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('home.faq') }}"
                                class="mb-2 text-sm hover:text-red-600 transition opacity-60 hover:opacity-100"
                            >
                                سوالات متداول
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('home.post.all') }}"
                                class="mb-2 text-sm hover:text-red-600 transition opacity-60 hover:opacity-100"
                            >
                                بلاگ
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full px-4 sm:w-1/2 lg:w-3/12">
                <div class="mb-10 w-full">
                    <h4 class="mb-2 opacity-80">ارتباط با ما:</h4>
                    <ul class="grid gap-y-2">
                        @foreach($contacts as $contact)
                        <li>
                            <div class="mb-2 text-sm opacity-60">
                                {{ $contact->key }}: {{ $contact->value }}
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="w-full px-4 sm:w-1/2 lg:w-2/12">
                <div class="mb-10 w-full">
                    <h4 class="mb-2 text-center opacity-80">شبکه های اجتماعی:</h4>
                    <div class="mb-5 flex items-center justify-center">
                        <a href="{{  $instagram->link }}" target="_blank" title="instagram" class="mr-1 flex h-12 w-12 items-center justify-center p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#333333" viewBox="0 0 256 256"><path d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160ZM176,24H80A56.06,56.06,0,0,0,24,80v96a56.06,56.06,0,0,0,56,56h96a56.06,56.06,0,0,0,56-56V80A56.06,56.06,0,0,0,176,24Zm40,152a40,40,0,0,1-40,40H80a40,40,0,0,1-40-40V80A40,40,0,0,1,80,40h96a40,40,0,0,1,40,40ZM192,76a12,12,0,1,1-12-12A12,12,0,0,1,192,76Z"></path></svg>                </a>

                        <a href="{{  $telegram->link }}" target="_blank" title="telegram" class="mr-1 flex h-12 w-12 items-center justify-center p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#333333" viewBox="0 0 256 256"><path d="M236.88,26.19a9,9,0,0,0-9.16-1.57L25.06,103.93a14.22,14.22,0,0,0,2.43,27.21L80,141.45V200a15.92,15.92,0,0,0,10,14.83,15.91,15.91,0,0,0,17.51-3.73l25.32-26.26L173,220a15.88,15.88,0,0,0,10.51,4,16.3,16.3,0,0,0,5-.79,15.85,15.85,0,0,0,10.67-11.63L239.77,35A9,9,0,0,0,236.88,26.19Zm-61.14,36L86.15,126.35l-49.6-9.73ZM96,200V152.52l24.79,21.74Zm87.53,8L100.85,135.5l119-85.29Z"></path></svg>                </a>

                        <a href="{{  $whatsapp->link }}" target="_blank" title="whatsapp" class="mr-1 flex h-12 w-12 items-center justify-center p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#333333" viewBox="0 0 256 256"><path d="M187.58,144.84l-32-16a8,8,0,0,0-8,.5l-14.69,9.8a40.55,40.55,0,0,1-16-16l9.8-14.69a8,8,0,0,0,.5-8l-16-32A8,8,0,0,0,104,64a40,40,0,0,0-40,40,88.1,88.1,0,0,0,88,88,40,40,0,0,0,40-40A8,8,0,0,0,187.58,144.84ZM152,176a72.08,72.08,0,0,1-72-72A24,24,0,0,1,99.29,80.46l11.48,23L101,118a8,8,0,0,0-.73,7.51,56.47,56.47,0,0,0,30.15,30.15A8,8,0,0,0,138,155l14.61-9.74,23,11.48A24,24,0,0,1,152,176ZM128,24A104,104,0,0,0,36.18,176.88L24.83,210.93a16,16,0,0,0,20.24,20.24l34.05-11.35A104,104,0,1,0,128,24Zm0,192a87.87,87.87,0,0,1-44.06-11.81,8,8,0,0,0-6.54-.67L40,216,52.47,178.6a8,8,0,0,0-.66-6.54A88,88,0,1,1,128,216Z"></path></svg>                </a>

                    </div>
                    <div class="flex items-center justify-center gap-x-5">
                        @if(!empty($enamad))
                        <a href="{{ $enamad->link }}">
                            <img class="w-28 h-auto" src="{{ asset($enamad->image) }}" alt="">
                        </a>
                        @endif
                        <a href="https://www.zarinpal.com/" target="_blank">
                            <img class="w-20 h-auto" src="{{ asset('home-assets/image/logo/zarinPal.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- COPYRIGHT -->
    <div class="px-4 grid grid-cols-1 sm:grid-cols-2 border-t-[1px] py-5 text-gray-400">
      <span class="text-xs text-center sm:text-right">
        تمامی حقوق متعلق به   {{ $setting->title }} است و هر گونه سواستفاده پیگرد قانونی دارد
      </span>
    </div>
</footer>
