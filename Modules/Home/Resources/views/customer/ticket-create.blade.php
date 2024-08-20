@extends('home::layouts.master')
@section('head-tag')

    <title>ساخت تیکت</title>

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
                    <form action="{{ route('user.profile.tickets.store') }}" method="post">
                        @csrf
                    <div class="border rounded-3xl shadow-lg flex flex-col p-5 gap-y-5">
                        <div class="mb-4">
                            <label for="username" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700"> عنوان تیکت</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="text-sm block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300"/>
                            @error('title')
                            <p style="color: red">
                            {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="username" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700"> دسته تیکت</label>
                            <select name="category_id"  class="text-sm block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300">
                                <option>دسته تیکت انتخاب کنید</option>
                                @foreach($ticketCategories as $ticketCategory)
                                    <option value="{{ $ticketCategory->id }}" @if(old('category_id') == $ticketCategory->id) selected @endif>{{ $ticketCategory->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p style="color: red">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="username" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700"> توضیحات تیکت</label>
                            <textarea name="body" rows="10"  class="text-sm block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300">{{ old('body') }}</textarea>
                            @error('body')
                            <p style="color: red">
                                {{ $message }}
                            </p>
                            @enderror
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
    <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
@endsection
