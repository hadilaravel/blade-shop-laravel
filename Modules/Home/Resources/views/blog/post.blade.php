@extends('home::layouts.master')
@section('head-tag')

    <title>{{ $post->title }}</title>
    <link rel="canonical" href="{{ route('home.post.detail' , $post->id) }}">

@endsection
@section('content')


    <div class="max-w-[1440px] mx-auto px-3">
        <div class="mt-0 mb-5 lg:mt-10 lg:mb-8 p-1 md:p-3">
            <div class="md:flex w-full gap-x-7">
                <div class="w-full md:w-8/12 lg:w-9/12">
          <span class="flex flex-col py-2 px-3 mt-6 lg:mt-0 max-w-5xl rounded-2xl bg-white">
            <div>
              <div class="flex flex-wrap gap-x-3 text-xs opacity-75 py-1">
                <div class="flex">
                  <div>تاریخ: </div>
                  <div>{{ convertEnglishToPersian(jdate($post->created_at)->format('Y-m-d')) }}</div>
                </div>
                <div class="flex">
                  <div>دسته بندی: </div>
                  <div>{{ $post->category->name }}</div>
                </div>
              </div>
            </div>
            <img class="rounded-2xl my-3" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
            <div>
              <div class="text-2xl opacity-95 py-3">{{ $post->title }}</div>
              <div class="opacity-70 pb-3 leading-6 text-sm">
                  {!! $post->body !!}
              </div>
            </div>
          </span>
                    <div class="flex flex-col py-4 px-4 my-6 max-w-5xl rounded-2xl bg-white">

                    @if($post->commentable == 1)
                    <!-- BOX COMMENTS -->
                        <!-- UO COMMENTS -->
                        <div>
                            <div>نظرات</div>
                            <div class="pr-5 opacity-70 text-xs">{{ $post->activeComments()->count() }}نظر </div>
                        </div>
                        <!-- COMMENT -->

                        <div class="bg-gray-50 rounded-xl px-5 py-3 my-2">
                          @foreach($post->activeComments() as $comment)
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

                  @endforeach
                        </div>

                    @if(auth()->check())
                        <form action="{{ route('home.comments.post.store' , $post->id) }}" method="post" >
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
                        @endif
                        @endif
                    </div>


                </div>
                <div class="w-full md:w-4/12 lg:w-3/12 max-w-xl mx-auto">
                    <div class="lg:block p-3 space-y-4 mx-2 md:ml-3 bg-white rounded-2xl">
                        <div class="opacity-90 border-b pb-3">
                            مرتبط ترین مقاله ها:
                        </div>
                        @foreach($postRelateds as $postRelated)
                        <a href="{{ route('home.post.detail' , $postRelated->slug) }}" class="flex flex-row items-center p-1">
                            <div class="md:ml-3  mb-3 md:mb-0">
                                <img class="hover:scale-105 transition rounded-lg w-44" src="{{ asset($postRelated->image) }}" alt="{{ $postRelated->title }}" />
                            </div>
                            <div class="w-full px-3 md:px-0">
                                <div class="mx-auto text-sm h-10 opacity-90">{{ \Illuminate\Support\Str::limit($postRelated->title , 40)}}</div>
                                <div class="text-xs md:flex justify-start opacity-75 mx-auto md:mx-0 pb-3">
                                    <div>{{ convertEnglishToPersian(jdate($postRelated->created_at)->format('Y-m-d')) }}</div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
