@extends('home::layouts.master')
@section('head-tag')

    <title>ویرایش آدرس</title>

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


                <div class="md:w-8/12 lg:w-9/12 flex flex-col gap-y-5">
                    <form action="{{ route('user.profile.my-address.update' , $address->id) }}" method="post">
                        @csrf
                        {{ method_field('put') }}
                    <div class="border rounded-3xl shadow-lg flex flex-col p-5 gap-y-5">
                        <div class="mb-4">
                            <label for="username" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700">نام گیرنده</label>
                            <input type="text" name="recipient_first_name" value="{{ old('recipient_first_name', $address->recipient_first_name) }}" class="text-sm block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300"/>
                            @error('recipient_first_name')
                            <p style="color: red">
                            {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="username" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700"> نام خانوادگی تحویل گیرنده</label>
                            <input type="text" name="recipient_last_name" value="{{ old('recipient_last_name' , $address->recipient_last_name) }}" class="text-sm block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300"/>
                            @error('recipient_last_name')
                            <p style="color: red">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="username" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700">شماره موبایل</label>
                            <input type="number" name="mobile" value="{{ old('mobile' , $address->mobile) }}" class="text-sm block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300"/>
                            @error('mobile')
                            <p style="color: red">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <div class="mb-2">
                                <label for="select" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">استان</label>
                                <select name="province_id" id="province-{{ $address->id }}" class="text-sm block w-full appearance-none rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-700 outline-none transition-all">
                                    <option selected>استان را انتخاب کنید</option>
                                @foreach($provinces as $province)
                                        <option {{ $address->province_id == $province->id ? 'selected' : '' }} value="{{ $province->id }}" @if(old('province_id') == $province) selected @endif data-url="{{ route('user.profile.get-cities', $province->id) }}">
                                            {{ $province->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('province_id')
                                <p style="color: red">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="mb-2">
                                <label for="select" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">شهر</label>
                                <select   id="city-{{ $address->id }}" name="city_id" class="text-sm block w-full appearance-none rounded-lg border border-gray-300 bg-white px-3 py-2 text-gray-700 outline-none transition-all">
                                    <option value="{{ $address->city->id }}" selected>{{ $address->city->name }}</option>
                                </select>
                                @error('city_id')
                                <p style="color: red">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="username" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700">کدپستی</label>
                            <input type="number" name="postal_code" value="{{ old('postal_code' , $address->postal_code) }}" class="text-sm block w-full appearance-none rounded-lg border border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300"/>
                            @error('postal_code')
                            <p style="color: red">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="username" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700">آدرس</label>
                            <textarea  rows="5" name="address"  type="number" class="text-sm block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300">{{ old('address' , $address->address) }}</textarea>
                            @error('address')
                            <p style="color: red">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="sm:grid grid-cols-2 gap-x-5">
                            <div class="mb-4">
                                <label for="username" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700">واحد</label>
                                <input type="number" name="unit" value="{{ old('unit' , $address->unit) }}" class="text-sm block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300"/>
                                @error('unit')
                                <p style="color: red">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="username" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700">پلاک</label>
                                <input type="number" name="no" value="{{ old('no' , $address->no) }}" class="text-sm block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300"/>
                                @error('no')
                                <p style="color: red">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <span class="opacity-90">
              <button class="px-7 py-2 text-center text-white bg-blue-500 align-middle border-0 rounded-lg shadow-md text-sm">ثبت</button>
            </span>
                    </div>
                    </form>
                </div>

            </div>
        </div>


@endsection
@section('script')
    <script src="{{ asset('home-assets/js/navbar.js') }}"></script>
    <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

    <script>

        // edit
        var addresses = {!! auth()->user()->addresses !!}
            // console.log(addresses);
        addresses.map(function(address) {
            var id = address.id;
            var target = `#province-${id}`;
            var selected = `${target} option:selected`
            $(target).change(function() {
                var element = $(selected);
                var url = element.attr('data-url');

                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(response) {
                        if (response.status) {
                            let cities = response.cities;
                            $(`#city-${id}`).empty();
                            cities.map((city) => {
                                $(`#city-${id}`).append($('<option/>').val(city.id).text(city
                                    .name))
                            })
                        } else {
                            errorToast('خطا پیش آمده است')
                        }
                    },
                    error: function() {
                        errorToast('خطا پیش آمده است')
                    }
                })
            })
        })


    </script>

@endsection
