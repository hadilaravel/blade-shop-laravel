@extends('home::layouts.master')
@section('head-tag')

    <title>درباره ما</title>
    <link rel="canonical" href="{{ route('home.about') }}">

@endsection
@section('content')


    <div class="max-w-[1440px] mx-auto px-3">
        <div class="bg-white shadow-xl my-5 lg:my-10 rounded-xl md:rounded-2xl p-3 md:p-5">
            <div class="relative flex justify-center items-center mb-5">
                <img class="w-full h-96 md:h-[500px] object-center object-cover rounded-xl" src="{{ asset($about->image) }}" alt="درباره ما">
                <div class="absolute top-0 bg-zinc-500 bg-opacity-50 w-full h-full flex justify-center items-center text-white font-semibold rounded-xl">
                    <div class="text-center space-y-5">
                        <div class="text-3xl sm:text-3xl md:text-5xl "> {{ $about->title }}</div>
{{--                        <div class="text-xl sm:text-2xl md:text-4xl">به شرکت مهندسی و فروشگاهی ایران مارکت خوش آمدید</div>--}}
                    </div>
                </div>
            </div>
            <div class="space-y-7">
                <div class="leading-8 opacity-80 text-sm">
                    {!! $about->body !!}
                </div>
            </div>

        </div>
    </div>



@endsection
