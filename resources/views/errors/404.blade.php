@extends('home::layouts.master')
@section('head-tag')

    <title>صفحه مورد نظر پیدا نشد!!!</title>

@endsection
@section('content')

    <div class="max-w-[1440px] mx-auto px-3">
        <div class="bg-white shadow-xl my-5 lg:my-10 rounded-xl md:rounded-2xl  p-3 md:p-5">
            <img class="mx-auto rounded-3xl" src="{{ asset('home-assets/image/404/404-error-not-found.png') }}" alt="">
            <div class="opacity-90 text-center mt-7 mb-5 text-lg">
                صفحه مورد نظر پیدا نشد!!!
            </div>
            <div class="flex justify-center items-center mb-5">
                <a class="border-b-2 border-red-500 hover:text-red-600 transition" href="{{ route('home.index') }}">
                    صفحه اصلی
                </a>
                <img class="w-5" src="{{ asset('home-assets/image/arrow-left.png') }}" alt="">
            </div>
        </div>
    </div>


@endsection
@section('script')
    <script src="{{ asset('home-assets/js/loader.js') }}"></script>
@endsection
