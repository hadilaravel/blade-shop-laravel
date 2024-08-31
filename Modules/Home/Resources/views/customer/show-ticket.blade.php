@extends('home::layouts.master')
@section('head-tag')

    <title> جواب های تیکت</title>

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
                    <div class="border rounded-3xl shadow-lg flex flex-col p-5 gap-y-5">
                        <div >
                            <div class="text-xs opacity-80 mb-1">
                                عنوان تیکت:
                            </div>
                            <div class="text-sm opacity-90">
                                {{ $ticket->title }}
                            </div>
                        </div>
                        <div class="md:grid grid-cols-2">
                            <div>
                                <div class="text-xs opacity-80 mb-1">
                                    متن تیکت:
                                </div>
                                <div class="text-sm opacity-90">
                                    {!! $ticket->body !!}
                                </div>
                            </div>
                        </div>
                        <div class="w-1/2">
                            <div class="text-xs opacity-80 mb-1">
                                دسته تیکت :
                            </div>
                            <div class="text-sm opacity-90">
                                {{ $ticket->category->name  ?? '-'}}
                            </div>
                        </div>
                        <div >
                            <div class="text-xs opacity-80 mb-1">
                                وضعیت تیکت:
                            </div>
                            <div class="text-sm opacity-90">
                                {{ $ticket->seen == 1 ? 'دیده شده ' : 'دیده نشده' }}
                            </div>
                        </div>
                        <span class="opacity-90"></span>
                    </div>
                </div>

                <div class="border rounded-3xl shadow-lg flex flex-col p-5 gap-y-5">
                    <h3>جواب های تیکت</h3>
                    @foreach($ticket->answers()->get() as $answer)
                    <div >
                        <div class="text-xs opacity-80 mb-1">
                             نویسنده:
                        </div>
                        <div class="text-sm opacity-90">
                            ادمین
                        </div>
                    </div>
                    <div class="md:grid grid-cols-2">
                        <div>
                            <div class="text-xs opacity-80 mb-1">
                                متن تیکت:
                            </div>
                            <div class="text-sm opacity-90">
                                {!!  $answer->body !!}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <span class="opacity-90"></span>
                    @endforeach
                </div>
            </div>
        </div>


@endsection
