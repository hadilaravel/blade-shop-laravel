@extends('home::layouts.master')
@section('head-tag')

    <title>نظرات من</title>
    <link rel="canonical" href="{{ route('user.profile.my-comments') }}">

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
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="hidden md:table-header-group text-xs text-gray-700 bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3">
                                <span class="sr-only">تصویر</span>
                            </th>
                            <th scope="col" class="md:pr-6 py-3">
                                نام محصول
                            </th>
                            <th scope="col" class="pr-5 py-3">
                                نظر
                            </th>
                            <th scope="col" class="px-6 py-3">
                                وضعیت
                            </th>
                            <th scope="col" class="px-3 py-3">
                                عملیات
                            </th>
                        </tr>
                        </thead>
                        <tbody class="grid grid-cols-1 sm:grid-cols-2 md:contents gap-5">
                        @forelse($comments as $comment)
                        <tr class="bg-white hover:bg-gray-50 grid grid-cols-1 justify-items-center md:table-row border-x sm:border-x-0 sm:border-b">
                            <td class="px-2 py-4">
                                <img src="{{ asset($comment->commentable->image) }}" class="w-48 md:w-28 max-w-full max-h-full rounded-lg" alt="">
                            </td>
                            <td class="md:pr-6 py-4 text-xs opacity-90 text-gray-900">
                                {{ $comment->commentable->name }}
                            </td>
                            <td class="px-3 py-4 max-w-md text-xs">
                                {{ $comment->body }}
                            </td>
                            @if($comment->seen == 0 && $comment->status == 0 )
                            <td class="px-6 py-4 text-sm opacity-90 text-yellow-500">
                                در انتظار تایید
                            </td>
                             @elseif($comment->seen == 1 && $comment->status == 0)
                                <td class="px-6 py-4 text-sm opacity-90 text-yellow-500">
                                    در انتظار تایید
                                </td>
                            @elseif($comment->seen == 1 && $comment->status == 1)
                                <td class="px-6 py-4 text-sm opacity-90 text-green-500">
                                    تایید شده
                                </td>
                            @endif
                            <td class="px-3 py-4">
                                <a href="{{ route('user.profile.delete-my-comments' , $comment) }}" class=" text-red-600">حذف</a>
                            </td>
                        </tr>
                        @empty
                        <p>نظری یافت نشد</p>
                        @endforelse
                        </tbody>
                    </table>
                </div>


            </div>
        </div>


@endsection
@section('script')
    <script src="{{ asset('home-assets/js/navbar.js') }}"></script>
    <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
@endsection
