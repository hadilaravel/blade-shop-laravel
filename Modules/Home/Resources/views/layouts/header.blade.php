<!-- NAVBAR -->
<div>
    <!-- TOP -->
    <nav
        class="relative px-5 py-2 flex flex-wrap justify-between items-start pt-5 bg-white">
        <a class="order-2" href="{{ route('home.index') }}">
            <img class="w-36" src="{{ asset($setting->logo_header) }}" alt="{{ $setting->title }}" />
        </a>
        <div class="order-3 w-full mt-3 lg:mt-0 lg:w-5/12 lg:mr-[10%]">
            <div class="relative">
                <input
                    type="search"
                    id="default-search"
                    class="sm:block w-full px-4 py-3 sm:pl-12 text-sm sm:text-base pl-8 text-red-900 placeholder:text-red-600 rounded-2xl text-right placeholder:text-sm focus:outline-red-400 border-2 border-red-400"
                    placeholder="جستجو محصول"
                    onfocus="showModalSearch()"/>
                <div
                    class="absolute inset-y-0 left-0 flex items-center pl-4">
                    <img class="w-5 h-5 text-gray-500" src="{{ asset('home-assets/image/search.png') }}" alt="" />
                </div>
                <div class="absolute w-full bg-gray-50 shadow-2xl h-auto mt-2 z-50 rounded-2xl hidden" id="showModalSearch">
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-3 p-3">
                        <a href="" class="flex items-center bg-white p-2 rounded-xl">
                            <img src="./assets/image/product/bag.png" alt="" class="w-14 rounded-lg ml-2">
                            <div class="text-xs opacity-70">
                                کیف لپ تاپ مدل ضدآب
                            </div>
                        </a>
                        <a href="" class="flex items-center bg-white p-2 rounded-xl">
                            <img src="./assets/image/product/bag.png" alt="" class="w-14 rounded-lg ml-2">
                            <div class="text-xs opacity-70">
                                کیف لپ تاپ مدل ضدآب
                            </div>
                        </a>
                        <a href="" class="flex items-center bg-white p-2 rounded-xl">
                            <img src="./assets/image/product/bag.png" alt="" class="w-14 rounded-lg ml-2">
                            <div class="text-xs opacity-70">
                                کیف لپ تاپ مدل ضدآب
                            </div>
                        </a>
                    </div>
                    <div class="flex flex-wrap gap-2 px-3 mb-3">
                        <a href="" class="bg-white rounded-xl px-2 py-1 flex items-center text-sm">
                            کیف زنانه
                            <div class="opacity-70">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="#333333" viewBox="0 0 256 256">
                                    <path d="M165.66,202.34a8,8,0,0,1-11.32,11.32l-80-80a8,8,0,0,1,0-11.32l80-80a8,8,0,0,1,11.32,11.32L91.31,128Z">
                                    </path>
                                </svg>
                            </div>
                        </a>
                        <a href="" class="bg-white rounded-xl px-2 py-1 flex items-center text-sm">
                            کیف سبک
                            <div class="opacity-70">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="#333333" viewBox="0 0 256 256">
                                    <path d="M165.66,202.34a8,8,0,0,1-11.32,11.32l-80-80a8,8,0,0,1,0-11.32l80-80a8,8,0,0,1,11.32,11.32L91.31,128Z">
                                    </path>
                                </svg>
                            </div>
                        </a>
                        <a href="" class="bg-white rounded-xl px-2 py-1 flex items-center text-sm">
                            کیف زیبا
                            <div class="opacity-70">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="#333333" viewBox="0 0 256 256">
                                    <path d="M165.66,202.34a8,8,0,0,1-11.32,11.32l-80-80a8,8,0,0,1,0-11.32l80-80a8,8,0,0,1,11.32,11.32L91.31,128Z">
                                    </path>
                                </svg>
                            </div>
                        </a>
                    </div>
                    <div class="border-t mx-3 flex justify-between px-1 py-2">
                        <div class="opacity-80">
                            جستجو های اخیر
                        </div>
                        <a href="" class="bg-white rounded-full p-1 hover:bg-stone-50 transition opacity-90">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#333333" viewBox="0 0 256 256">
                                <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z">
                                </path>
                            </svg>
                        </a>
                    </div>
                    <div class="flex flex-wrap gap-2 px-3 mb-3">
                        <a href="" class="bg-white rounded-xl px-2 py-1 flex items-center text-sm">
                            <div class="opacity-70 ml-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#333333" viewBox="0 0 256 256">
                                    <path d="M136,80v43.47l36.12,21.67a8,8,0,0,1-8.24,13.72l-40-24A8,8,0,0,1,120,128V80a8,8,0,0,1,16,0Zm-8-48A95.44,95.44,0,0,0,60.08,60.15C52.81,67.51,46.35,74.59,40,82V64a8,8,0,0,0-16,0v40a8,8,0,0,0,8,8H72a8,8,0,0,0,0-16H49c7.15-8.42,14.27-16.35,22.39-24.57a80,80,0,1,1,1.66,114.75,8,8,0,1,0-11,11.64A96,96,0,1,0,128,32Z">
                                    </path>
                                </svg>
                            </div>
                            آیفون
                        </a>
                        <a href="" class="bg-white rounded-xl px-2 py-1 flex items-center text-sm">
                            <div class="opacity-70 ml-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#333333" viewBox="0 0 256 256">
                                    <path d="M136,80v43.47l36.12,21.67a8,8,0,0,1-8.24,13.72l-40-24A8,8,0,0,1,120,128V80a8,8,0,0,1,16,0Zm-8-48A95.44,95.44,0,0,0,60.08,60.15C52.81,67.51,46.35,74.59,40,82V64a8,8,0,0,0-16,0v40a8,8,0,0,0,8,8H72a8,8,0,0,0,0-16H49c7.15-8.42,14.27-16.35,22.39-24.57a80,80,0,1,1,1.66,114.75,8,8,0,1,0-11,11.64A96,96,0,1,0,128,32Z">
                                    </path>
                                </svg>
                            </div>
                            تلویزیون
                        </a>
                        <a href="" class="bg-white rounded-xl px-2 py-1 flex items-center text-sm">
                            <div class="opacity-70 ml-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#333333" viewBox="0 0 256 256">
                                    <path d="M136,80v43.47l36.12,21.67a8,8,0,0,1-8.24,13.72l-40-24A8,8,0,0,1,120,128V80a8,8,0,0,1,16,0Zm-8-48A95.44,95.44,0,0,0,60.08,60.15C52.81,67.51,46.35,74.59,40,82V64a8,8,0,0,0-16,0v40a8,8,0,0,0,8,8H72a8,8,0,0,0,0-16H49c7.15-8.42,14.27-16.35,22.39-24.57a80,80,0,1,1,1.66,114.75,8,8,0,1,0-11,11.64A96,96,0,1,0,128,32Z">
                                    </path>
                                </svg>
                            </div>
                            شیائومی
                        </a>
                        <a href="" class="bg-white rounded-xl px-2 py-1 flex items-center text-sm">
                            <div class="opacity-70 ml-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#333333" viewBox="0 0 256 256">
                                    <path d="M136,80v43.47l36.12,21.67a8,8,0,0,1-8.24,13.72l-40-24A8,8,0,0,1,120,128V80a8,8,0,0,1,16,0Zm-8-48A95.44,95.44,0,0,0,60.08,60.15C52.81,67.51,46.35,74.59,40,82V64a8,8,0,0,0-16,0v40a8,8,0,0,0,8,8H72a8,8,0,0,0,0-16H49c7.15-8.42,14.27-16.35,22.39-24.57a80,80,0,1,1,1.66,114.75,8,8,0,1,0-11,11.64A96,96,0,1,0,128,32Z">
                                    </path>
                                </svg>
                            </div>
                            کفش اسپورت
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="order-4 hidden lg:flex">

          <span
              class="block relative"
              x-data="{showChildren:false}"
              @mouseenter="showChildren=true"
              @mouseleave="showChildren=false">
            <a
                @if(!auth()->check()) href="{{ route('auth.register.view') }}" @endif
                class="flex items-center h-10 leading-10 px-3 mx-1 transition rounded-xl hover:bg-red-50">
              <img class="ml-1 w-6" src="{{ asset('home-assets/image/user.png') }}" alt="" />
              <span
                  class="text-sm opacity-95"
              >
                ورود | ثبت نام
              </span>
                 @if(auth()->check())
              <span>
                <img class="w-4 mr-1" src="{{ asset('home-assets/image/chevron-down-login.png') }}" alt="" />
              </span>
                @endif
            </a>
              @if(auth()->check())
              <div
                class="bg-white rounded-2xl shadow-md border-gray-50 text-sm absolute top-auto right-0 w-64 z-30 mt-1"
                x-show="showChildren"
                x-transition:enter="transition ease duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease duration-300 transform"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-4"
                style="display: none"
                @mouseenter="showChildren=true"
                @mouseleave="showChildren=false">
              <div class="bg-white rounded-2xl w-full relative z-10 py-2 px-2">
                <ul class="list-reset">
                  <li
                      class="relative border-b-2 border-red-300 pb-2"
                      x-data="{showChildren:false}"
                      @mouseleave="showChildren=false"
                      @mouseenter="showChildren=true">
                    <a
                        href="{{ route('user.profile') }}"
                        class="px-2 py-2 flex w-full items-start hover:bg-red-50 rounded-xl">
                      <span
                          class="flex justify-center items-center opacity-90"
                      ><img
                              class="w-8 ml-2"
                              src="{{ asset('home-assets/image/userNotImage.png') }}"
                              alt="" />{{ auth()->user()->name }}</span
                      >
                    </a>
                  </li>
                  <li
                      class="relative pt-2"
                      x-data="{showChildren:false}"
                      @mouseleave="showChildren=false"
                      @mouseenter="showChildren=true">
                    <a
                        href=""
                        class="px-4 py-2 flex w-full items-start hover:bg-red-50 rounded-xl">
                      <span class="flex justify-center items-center text-sm opacity-90"
                      ><img
                              class="w-5 ml-1"
                              src="{{ asset('home-assets/image/package.png') }}"
                              alt="" />سفارش ها</span
                      >
                    </a>
                  </li>
                  <li
                      class="relative"
                      x-data="{showChildren:false}"
                      @mouseleave="showChildren=false"
                      @mouseenter="showChildren=true">
                    <a
                        href="{{ route('user.profile.my-favorites') }}"
                        class="px-4 py-2 flex w-full items-start hover:bg-red-50 rounded-xl">
                      <span class="flex justify-center items-center text-sm opacity-90"
                      ><img
                              class="w-5 ml-1"
                              src="{{ asset('home-assets/image/heart.png') }}"
                              alt="" />علاقه مندی ها</span
                      >
                    </a>
                  </li>
                  <li
                      class="relative"
                      x-data="{showChildren:false}"
                      @mouseleave="showChildren=false"
                      @mouseenter="showChildren=true">
                    <a
                        href="{{ route('logout') }}"
                        class="px-4 py-2 flex w-full items-start hover:bg-red-50 rounded-xl">
                      <span class="flex justify-center items-center text-sm opacity-90"
                      ><img class="w-5 ml-1" src="{{ asset('home-assets/image/exit.png') }}" alt="" />خروج
                        از حساب کاربری</span
                      >
                    </a>
                  </li>
                </ul>
              </div>
            </div>
              @endif
          </span>

            @if(auth()->check())
            <span
                class="block relative"
                x-data="{showChildren:false}"
                @click.away="showChildren=false"
                @mouseenter="showChildren=true"
                @mouseleave="showChildren=false">
            <a
                href="{{ route('user.profile.cart-item') }}"
                class="flex items-center h-10 leading-10 px-3 cursor-pointer no-underline hover:no-underline duration-100 mx-1 transition rounded-xl hover:bg-red-100">
              <img
                  class="inline ml-1 w-5"
                  src="{{ asset('home-assets/image/shopping-cart.png') }}"
                  alt="" />
              <span
                  class="text-sm text-neutral-800 hover:text-neutral-700 opacity-95">
                سبد خرید
              </span>
              <span>
                <img class="w-4 mr-1" src="{{ asset('home-assets/image/chevron-down-login.png') }}" alt="" />
              </span>
            </a>
            <div
                class="bg-white rounded-2xl shadow-md first-letter:border-2 border-gray-50 text-sm absolute top-auto left-0 w-72 z-30 mt-1"
                x-show="showChildren"
                x-transition:enter="transition ease duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease duration-300 transform"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-4"
                style="display: none"
                @mouseenter="showChildren=true"
                @mouseleave="showChildren=false">
              <div class="bg-white rounded-2xl w-full relative z-10 py-2 px-2">
                <ul class="list-reset flex flex-col gap-y-2">
                        @php
                            $totalProductPrice = 0;
                            $totalDiscount = 0;
                        @endphp
                    @foreach(auth()->user()->cartItems as $cartItem)
                  <li
                      class="relative">
                    <a
                        href="{{ route('home.product.detail' , $cartItem->product->slug) }}"
                        class="px-2 py-2 flex w-full items-start hover:bg-red-50 rounded-xl">
                      <span class="flex justify-center items-center opacity-90">
                        <div class="flex">
                          <img
                              class="w-14 ml-2 rounded-lg"
                              src="{{ asset($cartItem->product->image) }}"
                              alt="" />
                          <div class="flex flex-col flex-wrap gap-y-1 justify-center">
                            <div class="opacity-80 w-full text-sm">
                              {{ $cartItem->product->name }}
                            </div>
                            <div class="flex opacity-75 text-xs">
                              <div>
                                قیمت:
                              </div>
                              <div>
                              {{ priceFormat($cartItem->cartItemFinalPrice() ) }}
                              </div>
                              <div>
                                تومان
                              </div>
                            </div>
                          </div>
                          <span class="text-red-400 hover:text-red-500 bg-red-100 hover:bg-red-200 px-2 text-xl font-bold h-7 rounded-full cursor-pointer absolute left-2 top-5">
                            ×
                          </span>
                        </div>
                      </span>
                    </a>
                  </li>
                    @endforeach
                  <li
                      class="relative">
                    <a
                        href="{{ route('user.profile.cart-item') }}"
                        class="px-2 py-2 flex w-full items-start justify-center">
                      <span class="flex justify-center items-center opacity-90">
                        <button class="px-7 py-2 text-center text-white bg-red-500 align-middle border-0 rounded-lg shadow-md text-xs">تسویه حساب</button>
                      </span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </span>
            @endif
        </div>
        <div class="order-1 lg:hidden">
            <button class="navbar-burger flex items-center text-red-300 p-3">
                <svg
                    class="block h-4 w-4 fill-current"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>
    </nav>
    <!-- DOWN -->
    <div class="w-full">
        <div class="py-2 px-5 bg-white shadow-stone-50 shadow-md hidden lg:block">
            <div class="-mx-1">
                <ul class="flex w-full flex-wrap items-center h-10">
                    <li class="block relative">
                        <a
                            href="./index.html"
                            class="flex items-center h-10 text-sm leading-10 px-4 mx-1 transition text-gray-700 hover:text-red-500">
                            <span class=" border-b-2 border-red-600">صفحه اصلی</span>
                        </a>
                    </li>
                    <li
                        class="block relative"
                        x-data="{showChildren:false}"
                    >
                        <a
                            href="./category-index.html"
                            class="flex items-center h-10 leading-10 px-3 text-sm mx-1 transition text-gray-700 hover:text-red-500"
                            @click.prevent="showChildren=!showChildren"
                            @mouseenter="showChildren=true"
                            @mouseleave="showChildren=false">
                            <span>پوشاک</span>
                            <span>
                    <img class="w-4 mr-1" src="./assets/image/chevron-down-login.png" alt="" />
                  </span>
                        </a>
                        <div
                            class="bg-white rounded-2xl shadow-md text-sm  opacity-[0.97] absolute top-auto right-0 min-w-full w-56 z-30 mt-3"
                            x-show="showChildren"
                            x-transition:enter="transition ease duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease duration-300 transform"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-4"
                            style="display: none"
                            @mouseenter="showChildren=true"
                            @mouseleave="showChildren=false">
                            <div
                                class="bg-white rounded-2xl w-full relative z-10 py-2 px-2">
                                <ul class="list-reset">
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">مردانه</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">زنانه</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">بچگانه</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li
                        class="block relative"
                        x-data="{showChildren:false}"
                        @click.away="showChildren=false">
                        <a
                            href="./category-index.html"
                            class="flex items-center h-10 leading-10 px-3 cursor-pointer text-sm no-underline hover:no-underline duration-100 mx-1 transition text-gray-700 hover:text-red-500"
                            @click.prevent="showChildren=!showChildren"
                            @mouseenter="showChildren=true"
                            @mouseleave="showChildren=false">
                            <span>کالای دیجیتال</span>
                            <span>
                    <img class="w-4 mr-1" src="./assets/image/chevron-down-login.png" alt="" />
                  </span>
                        </a>
                        <div
                            class="bg-white rounded-2xl shadow-md text-sm opacity-[0.97] absolute top-auto right-0 min-w-full w-56 z-30 mt-3"
                            x-show="showChildren"
                            x-transition:enter="transition ease duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease duration-300 transform"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-4"
                            @mouseenter="showChildren=true"
                            @mouseleave="showChildren=false"
                            style="display: none">
                            <div
                                class="bg-white rounded-2xl w-full relative z-10 py-2 px-2">
                                <ul class="list-reset">
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">لپ تاپ و کامپیوتر</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">موبایل</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">تبلت</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">وسایل جانبی</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li
                        class="block relative"
                        x-data="{showChildren:false}"
                        @click.away="showChildren=false">
                        <a
                            href="./category-index.html"
                            class="flex items-center h-10 leading-10 px-3 cursor-pointer text-sm no-underline hover:no-underline duration-100 mx-1 transition text-gray-700 hover:text-red-500"
                            @click.prevent="showChildren=!showChildren"
                            @mouseenter="showChildren=true"
                            @mouseleave="showChildren=false">
                            <span>لوازم خانگی</span>
                            <span>
                    <img class="w-4 mr-1" src="./assets/image/chevron-down-login.png" alt="" />
                  </span>
                        </a>
                        <div
                            class="bg-white rounded-2xl shadow-md text-sm  opacity-[0.97] absolute top-auto right-0 min-w-full w-56 z-30 mt-3"
                            x-show="showChildren"
                            x-transition:enter="transition ease duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease duration-300 transform"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-4"
                            @mouseenter="showChildren=true"
                            @mouseleave="showChildren=false"
                            style="display: none">
                            <div
                                class="bg-white rounded-2xl w-full relative z-10 py-2 px-2">
                                <ul class="list-reset">
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">یخچال و فریزر</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">ماشین لباسشویی</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">ماشین ظرف شویی</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">اجاق گاز</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">هود و سینک</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li
                        class="block relative"
                        x-data="{showChildren:false}"
                        @click.away="showChildren=false">
                        <a
                            href="./category-index.html"
                            class="flex items-center h-10 leading-10 px-3 cursor-pointer text-sm no-underline hover:no-underline duration-100 mx-1 transition text-gray-700 hover:text-red-500"
                            @click.prevent="showChildren=!showChildren"
                            @mouseenter="showChildren=true"
                            @mouseleave="showChildren=false">
                            <span>زیبایی</span>
                            <span>
                    <img class="w-4 mr-1" src="./assets/image/chevron-down-login.png" alt="" />
                  </span>
                        </a>
                        <div
                            class="bg-white rounded-2xl shadow-md text-sm  opacity-[0.97] absolute top-auto right-0 min-w-full w-56 z-30 mt-3"
                            x-show="showChildren"
                            x-transition:enter="transition ease duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease duration-300 transform"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-4"
                            @mouseenter="showChildren=true"
                            @mouseleave="showChildren=false"
                            style="display: none">
                            <div
                                class="bg-white rounded-2xl w-full relative z-10 py-2 px-2">
                                <ul class="list-reset">
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">لوازم آرایشی</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">عطر و ادکلن</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">لوازم بهداشتی</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li
                        class="block relative"
                        x-data="{showChildren:false}"
                        @click.away="showChildren=false">
                        <a
                            href="./category-index.html"
                            class="flex items-center h-10 leading-10 px-3 cursor-pointer text-sm no-underline hover:no-underline duration-100 mx-1 transition text-gray-700 hover:text-red-500"
                            @click.prevent="showChildren=!showChildren"
                            @mouseenter="showChildren=true"
                            @mouseleave="showChildren=false">
                            <span>لوازم برقی</span>
                            <span>
                    <img class="w-4 mr-1" src="./assets/image/chevron-down-login.png" alt="" />
                  </span>
                        </a>
                        <div
                            class="bg-white rounded-2xl shadow-md text-sm  opacity-[0.97] absolute top-auto right-0 min-w-full w-56 z-30 mt-3"
                            x-show="showChildren"
                            x-transition:enter="transition ease duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease duration-300 transform"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-4"
                            @mouseenter="showChildren=true"
                            @mouseleave="showChildren=false"
                            style="display: none">
                            <div
                                class="bg-white rounded-2xl w-full relative z-10 py-2 px-2">
                                <ul class="list-reset">
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">سشوار</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">اتو</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">ریش تراش</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">ساعت دیجیتال</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">هم زن و آبمیوه گیر</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">ترازو دیجیتال و چرخ کن</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li
                        class="block relative"
                        x-data="{showChildren:false}"
                        @click.away="showChildren=false">
                        <a
                            href="./category-index.html"
                            class="flex items-center h-10 leading-10 px-3 cursor-pointer text-sm no-underline hover:no-underline duration-100 mx-1 transition text-gray-700 hover:text-red-500"
                            @click.prevent="showChildren=!showChildren"
                            @mouseenter="showChildren=true"
                            @mouseleave="showChildren=false">
                            <span>سوپر مارکت</span>
                            <span>
                    <img class="w-4 mr-1" src="./assets/image/chevron-down-login.png" alt="" />
                  </span>
                        </a>
                        <div
                            class="bg-white rounded-2xl shadow-md text-sm opacity-[0.97] absolute top-auto right-0 min-w-full w-56 z-30 mt-3"
                            x-show="showChildren"
                            x-transition:enter="transition ease duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease duration-300 transform"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-4"
                            @mouseenter="showChildren=true"
                            @mouseleave="showChildren=false"
                            style="display: none">
                            <div
                                class="bg-white rounded-2xl w-full relative z-10 py-2 px-2">
                                <ul class="list-reset">
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">صبحانه</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">تنقلات</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">خشکبار</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">حبوبات و کنسرو</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">میوه و سبزیجات</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">سوسیس و کالباس</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">گوشت</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">لبنیات</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li
                        class="block relative"
                        x-data="{showChildren:false}"
                        @click.away="showChildren=false">
                        <a
                            href="./category-index.html"
                            class="flex items-center h-10 leading-10 px-3 cursor-pointer text-sm no-underline hover:no-underline duration-100 mx-1 transition text-gray-700 hover:text-red-500"
                            @click.prevent="showChildren=!showChildren"
                            @mouseenter="showChildren=true"
                            @mouseleave="showChildren=false">
                            <span>کودک و نوزاد</span>
                            <span>
                    <img class="w-4 mr-1" src="./assets/image/chevron-down-login.png" alt="" />
                  </span>
                        </a>
                        <div
                            class="bg-white rounded-2xl shadow-md text-sm  opacity-[0.97] absolute top-auto left-0 xl:right-0 min-w-full w-56 z-30 mt-3"
                            x-show="showChildren"
                            x-transition:enter="transition ease duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease duration-300 transform"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-4"
                            @mouseenter="showChildren=true"
                            @mouseleave="showChildren=false"
                            style="display: none">
                            <div
                                class="bg-white rounded-2xl w-full relative z-10 py-2 px-2">
                                <ul class="list-reset">
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">پوشک</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">بهداشت و حمام</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">سرگرمی و غذاخوری</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">کالای خواب</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li
                        class="block relative"
                        x-data="{showChildren:false}"
                        @click.away="showChildren=false">
                        <a
                            href="#"
                            class="flex items-center h-10 leading-10 px-3 cursor-pointer text-sm no-underline hover:no-underline duration-100 mx-1 transition text-gray-700 hover:text-red-500"
                            @click.prevent="showChildren=!showChildren"
                            @mouseenter="showChildren=true"
                            @mouseleave="showChildren=false">
                            <span>صفحات</span>
                            <span>
                  <img class="w-4 mr-1" src="./assets/image/chevron-down-login.png" alt="" />
                </span>
                        </a>
                        <div
                            class="bg-white rounded-2xl shadow-md text-sm  opacity-[0.97] absolute top-auto left-0 xl:right-0 min-w-full w-56 z-30 mt-3"
                            x-show="showChildren"
                            x-transition:enter="transition ease duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease duration-300 transform"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-4"
                            @mouseenter="showChildren=true"
                            @mouseleave="showChildren=false"
                            style="display: none">
                            <div
                                class="bg-white rounded-2xl w-full relative z-10 py-2 px-2">
                                <ul class="list-reset">
                                    <li
                                        class="relative">
                                        <a
                                            href="./404.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">404</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./aboute-me.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">درباره ما</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./blog.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">بلاگ</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./blog(single).html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">بلاگ(تک صفحه)</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./cart.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">سبد خرید</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./checkout.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">تسویه حساب</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./faq.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">سوالات متداول</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./login.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">ورود</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./verify.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">ارسال کد 4 رقمی</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./profile.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">پروفایل</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./search.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">جستجو محصول</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./single-product.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">صفحه محصول</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">دسته بندی</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative">
                                        <a
                                            href="./category-index.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">دسته بندی تکی(نمونه لپ تاپ)</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--MOBILE NAVBAR-->
    <div class="navbar-menu relative z-50 hidden">
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav
            class="fixed top-0 right-0 bottom-0 flex flex-col w-5/6 max-w-sm py-5 px-6 bg-white border-r overflow-y-auto">
            <div class="flex justify-center items-center mb-4">
                <a class="order-1" href="./index.html">
                    <img class="w-32" src="./assets/image/logo.png" alt="" />
                </a>
            </div>
            <div>
                <ul class="space-y-3">
                    <li class="border-b">
                        <div class="mt-0 mb-3 text-center space-y-5">
                            <div>
                                <div
                                    class="md:flex justify-center align-middle lg:inline-block py-2 px-4 text-sm text-neutral-800 rounded-xl hover:text-neutral-700 hover:bg-red-100 transition">
                                    <a href="./cart.html">
                                        <img
                                            class="inline ml-1 w-5"
                                            src="{{ asset('home-assets/image/shopping-cart.png') }}"
                                            alt="" />سبد خرید</a
                                    >
                                </div>
                                <div
                                    class="md:flex justify-center align-middle lg:inline-block py-2 px-4 text-sm text-neutral-800 rounded-xl hover:text-neutral-700 hover:bg-red-100 transition">
                                    @if(!auth()->check()) href="{{ route('auth.register.view') }}" @endif
                                    ><img
                                            class="inline ml-1 w-5"
                                            src="{{ asset('home-assets/image/user.png') }}"
                                            alt="" />ورود | ثبت نام</a
                                    >
                                </div>
                            </div>
                        </div>
                    </li>
                    <li
                        class="relative flex"
                        x-data="{showChildren:false}"
                        @click.away="showChildren=false">
                        <a
                            href="./category-index.html"
                            class="flex justify-between items-center h-10 leading-10 text-sm opacity-90 px-3 cursor-pointer no-underline w-full hover:no-underline duration-100 mx-1 transition rounded-xl hover:bg-red-100"
                            @click.prevent="showChildren=!showChildren">
                            <span>پوشاک</span>
                            <span>
                    <img class="w-4 mr-1" src="./assets/image/chevron-down-login.png" alt="" />
                  </span>
                        </a>
                        <div
                            class="bg-white rounded-2xl shadow-lg border-1 border-gray-50 text-sm absolute top-full right-0 min-w-full w-56 z-30 mt-1"
                            x-show="showChildren"
                            x-transition:enter="transition ease duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease duration-300 transform"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-4"
                            style="display: none">
                            </span>
                            <div
                                class="bg-white rounded-2xl w-full relative z-10 py-2 px-2">
                                <ul class="list-reset">
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">مردانه</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">زنانه</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">بچگانه</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li
                        class="relative flex"
                        x-data="{showChildren:false}"
                        @click.away="showChildren=false">
                        <a
                            href="./category-index.html"
                            class="flex justify-between items-center h-10 text-sm opacity-90 leading-10 px-3 cursor-pointer no-underline w-full hover:no-underline duration-100 mx-1 transition rounded-xl hover:bg-red-100"
                            @click.prevent="showChildren=!showChildren">
                            <span>کالای دیجیتال</span>
                            <span>
                    <img class="w-4 mr-1" src="./assets/image/chevron-down-login.png" alt="" />
                  </span>
                        </a>
                        <div
                            class="bg-white rounded-2xl shadow-lg border-1 border-gray-50 text-sm absolute top-full right-0 min-w-full w-56 z-30 mt-1"
                            x-show="showChildren"
                            x-transition:enter="transition ease duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease duration-300 transform"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-4"
                            style="display: none">
                            </span>
                            <div
                                class="bg-white rounded-2xl w-full relative z-10 py-2 px-2">
                                <ul class="list-reset">
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">لپ تاپ و کامپیوتر</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">موبایل</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">تبلت</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">وسایل جانبی</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li
                        class="relative flex"
                        x-data="{showChildren:false}"
                        @click.away="showChildren=false">
                        <a
                            href="./category-index.html"
                            class="flex justify-between items-center h-10 text-sm opacity-90 leading-10 px-3 cursor-pointer no-underline w-full hover:no-underline duration-100 mx-1 transition rounded-xl hover:bg-red-100"
                            @click.prevent="showChildren=!showChildren">
                            <span>لوازم خانگی</span>
                            <span>
                    <img class="w-4 mr-1" src="./assets/image/chevron-down-login.png" alt="" />
                  </span>
                        </a>
                        <div
                            class="bg-white rounded-2xl shadow-lg border-1 border-gray-50 text-sm absolute top-full right-0 min-w-full w-56 z-30 mt-1"
                            x-show="showChildren"
                            x-transition:enter="transition ease duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease duration-300 transform"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-4"
                            style="display: none">
                            </span>
                            <div
                                class="bg-white rounded-2xl w-full relative z-10 py-2 px-2">
                                <ul class="list-reset">
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">یخچال و فریزر</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">ماشین لباسشویی</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">ماشین ظرف شویی</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">اجاق گاز</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">هود و سینک</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li
                        class="relative flex"
                        x-data="{showChildren:false}"
                        @click.away="showChildren=false">
                        <a
                            href="./category-index.html"
                            class="flex justify-between items-center h-10 text-sm opacity-90 leading-10 px-3 cursor-pointer no-underline w-full hover:no-underline duration-100 mx-1 transition rounded-xl hover:bg-red-100"
                            @click.prevent="showChildren=!showChildren">
                            <span>زیبایی</span>
                            <span>
                    <img class="w-4 mr-1" src="./assets/image/chevron-down-login.png" alt="" />
                  </span>
                        </a>
                        <div
                            class="bg-white rounded-2xl shadow-lg border-1 border-gray-50 text-sm absolute top-full right-0 min-w-full w-56 z-30 mt-1"
                            x-show="showChildren"
                            x-transition:enter="transition ease duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease duration-300 transform"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-4"
                            style="display: none">
                            </span>
                            <div
                                class="bg-white rounded-2xl w-full relative z-10 py-2 px-2">
                                <ul class="list-reset">
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">لوازم آرایشی</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">عطر و ادکلن</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">لوازم بهداشتی</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li
                        class="relative flex"
                        x-data="{showChildren:false}"
                        @click.away="showChildren=false">
                        <a
                            href="./category-index.html"
                            class="flex justify-between items-center h-10 text-sm opacity-90 leading-10 px-3 cursor-pointer no-underline w-full hover:no-underline duration-100 mx-1 transition rounded-xl hover:bg-red-100"
                            @click.prevent="showChildren=!showChildren">
                            <span>لوازم برقی</span>
                            <span>
                    <img class="w-4 mr-1" src="./assets/image/chevron-down-login.png" alt="" />
                  </span>
                        </a>
                        <div
                            class="bg-white rounded-2xl shadow-lg border-1 border-gray-50 text-sm absolute top-full right-0 min-w-full w-56 z-30 mt-1"
                            x-show="showChildren"
                            x-transition:enter="transition ease duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease duration-300 transform"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-4"
                            style="display: none">
                            </span>
                            <div
                                class="bg-white rounded-2xl w-full relative z-10 py-2 px-2">
                                <ul class="list-reset">
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">سشوار</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">اتو</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">ریش تراش</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">ساعت دیجیتال</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">هم زن و آبمیوه گیر</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">ترازو دیجیتال و چرخ کن</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li
                        class="relative flex"
                        x-data="{showChildren:false}"
                        @click.away="showChildren=false">
                        <a
                            href="./category-index.html"
                            class="flex justify-between items-center h-10 text-sm opacity-90 leading-10 px-3 cursor-pointer no-underline w-full hover:no-underline duration-100 mx-1 transition rounded-xl hover:bg-red-100"
                            @click.prevent="showChildren=!showChildren">
                            <span>سوپر مارکت</span>
                            <span>
                    <img class="w-4 mr-1" src="./assets/image/chevron-down-login.png" alt="" />
                  </span>
                        </a>
                        <div
                            class="bg-white rounded-2xl shadow-lg border-1 border-gray-50 text-sm absolute top-full right-0 min-w-full w-56 z-30 mt-1"
                            x-show="showChildren"
                            x-transition:enter="transition ease duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease duration-300 transform"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-4"
                            style="display: none">
                            </span>
                            <div
                                class="bg-white rounded-2xl w-full relative z-10 py-2 px-2">
                                <ul class="list-reset">
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">صبحانه</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">تنقلات</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">خشکبار</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">حبوبات و کنسرو</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">میوه و سبزیجات</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">سوسیس و کالباس</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">گوشت</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">لبنیات</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li
                        class="relative flex"
                        x-data="{showChildren:false}"
                        @click.away="showChildren=false">
                        <a
                            href="./category-index.html"
                            class="flex justify-between items-center h-10 text-sm opacity-90 leading-10 px-3 cursor-pointer no-underline w-full hover:no-underline duration-100 mx-1 transition rounded-xl hover:bg-red-100"
                            @click.prevent="showChildren=!showChildren">
                            <span>کودک و نوزاد</span>
                            <span>
                    <img class="w-4 mr-1" src="./assets/image/chevron-down-login.png" alt="" />
                  </span>
                        </a>
                        <div
                            class="bg-white rounded-2xl shadow-lg border-1 border-gray-50 text-sm absolute top-full right-0 min-w-full w-56 z-30 mt-1"
                            x-show="showChildren"
                            x-transition:enter="transition ease duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease duration-300 transform"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-4"
                            style="display: none">
                            </span>
                            <div
                                class="bg-white rounded-2xl w-full relative z-10 py-2 px-2">
                                <ul class="list-reset">
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">پوشک</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">بهداشت و حمام</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">سرگرمی و غذاخوری</span>
                                        </a>
                                    </li>
                                    <li
                                        class="relative"
                                        x-data="{showChildren:false}"
                                        @mouseleave="showChildren=false"
                                        @mouseenter="showChildren=true">
                                        <a
                                            href="./category.html"
                                            class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                                            <span class="flex-1">کالای خواب</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- OPACITY SCREEN FOR SEARCH INPUT FOCUS -->
    <div class="absolute w-full h-screen bg-gray-200 opacity-40 z-40 hidden" id="opacitiScreen" onclick="closeScreen()">
    </div>
</div>


<!-- BOTTOM NAVIGATION -->
<div class="px-4 bg-white shadow-2xl w-full border fixed bottom-0 left-1/2 -translate-x-1/2 md:hidden z-50">
    <div class="grid grid-cols-5">
        <div class="flex-1 group">
            <a href="#" class="flex items-end justify-center text-center mx-auto pt-2 w-full text-gray-800 group-hover:text-red-500">
            <span class="block pt-1 pb-1">
              <svg class="mx-auto fill-gray-800 group-hover:fill-red-600" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
              <span class="block text-xs py-1">پروفایل</span>
              <span class="block w-5 mx-auto h-1 group-hover:bg-red-500 rounded-full"></span>
            </span>
            </a>
        </div>
        <div class="flex-1 group">
            <a href="#" class="flex items-end justify-center text-center mx-auto pt-2 w-full text-gray-800 group-hover:text-red-500">
            <span class="block pt-1 pb-1">
              <svg class="mx-auto fill-gray-800 group-hover:fill-red-600" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#000000" viewBox="0 0 256 256"><path d="M178,32c-20.65,0-38.73,8.88-50,23.89C116.73,40.88,98.65,32,78,32A62.07,62.07,0,0,0,16,94c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,220.66,240,164,240,94A62.07,62.07,0,0,0,178,32ZM128,206.8C109.74,196.16,32,147.69,32,94A46.06,46.06,0,0,1,78,48c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,147.61,146.24,196.15,128,206.8Z"></path></svg>
              <span class="block text-xs py-1">علاقه مندی</span>
              <span class="block w-5 mx-auto h-1 group-hover:bg-red-500 rounded-full"></span>
            </span>
            </a>
        </div>
        <div class="flex-1 group">
            <a href="#" class="flex items-end justify-center text-center mx-auto pt-2 w-full text-red-500">
            <span class="block pt-1 pb-1">
              <svg class="mx-auto fill-red-600" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#000000" viewBox="0 0 256 256"><path d="M218.83,103.77l-80-75.48a1.14,1.14,0,0,1-.11-.11,16,16,0,0,0-21.53,0l-.11.11L37.17,103.77A16,16,0,0,0,32,115.55V208a16,16,0,0,0,16,16H96a16,16,0,0,0,16-16V160h32v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V115.55A16,16,0,0,0,218.83,103.77ZM208,208H160V160a16,16,0,0,0-16-16H112a16,16,0,0,0-16,16v48H48V115.55l.11-.1L128,40l79.9,75.43.11.1Z"></path></svg>
              <span class="block text-xs py-1">صفحه اصلی</span>
              <span class="block w-5 mx-auto h-1 bg-red-500 rounded-full"></span>
            </span>
            </a>
        </div>
        <div class="flex-1 group">
            <a href="#" class="flex items-end justify-center text-center mx-auto pt-2 w-full text-gray-800 group-hover:text-red-500">
            <span class="block pt-1 pb-1">
              <svg class="mx-auto fill-gray-800 group-hover:fill-red-600" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#000000" viewBox="0 0 256 256"><path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path></svg>
              <span class="block text-xs py-1">جستجو</span>
              <span class="block w-5 mx-auto h-1 group-hover:bg-red-500 rounded-full"></span>
            </span>
            </a>
        </div>
        <div class="flex-1 group">
            <a href="#" class="flex items-end justify-center text-center mx-auto pt-2 w-full text-gray-800 group-hover:text-red-500">
            <span class="block pt-1 pb-1">
              <svg class="mx-auto fill-gray-800 group-hover:fill-red-600" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#000000" viewBox="0 0 256 256"><path d="M222.14,58.87A8,8,0,0,0,216,56H54.68L49.79,29.14A16,16,0,0,0,34.05,16H16a8,8,0,0,0,0,16h18L59.56,172.29a24,24,0,0,0,5.33,11.27,28,28,0,1,0,44.4,8.44h45.42A27.75,27.75,0,0,0,152,204a28,28,0,1,0,28-28H83.17a8,8,0,0,1-7.87-6.57L72.13,152h116a24,24,0,0,0,23.61-19.71l12.16-66.86A8,8,0,0,0,222.14,58.87ZM96,204a12,12,0,1,1-12-12A12,12,0,0,1,96,204Zm96,0a12,12,0,1,1-12-12A12,12,0,0,1,192,204Zm4-74.57A8,8,0,0,1,188.1,136H69.22L57.59,72H206.41Z"></path></svg>
              <span class="block text-xs py-1">سبد خرید</span>
              <span class="block w-5 mx-auto h-1 group-hover:bg-red-500 rounded-full"></span>
            </span>
            </a>
        </div>
    </div>
</div>
