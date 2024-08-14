<div class="bg-white rounded-2xl py-8 shadow-xl my-10">
    <div class="flex justify-between px-5 md:px-10 items-center">
        <div class="text-red-500">پست ها</div>
        <a href="{{ route('home.post.all') }}"><div class="transition px-4 py-2 rounded-xl flex justify-center items-center text-red-500 hover:text-red-600">مطالب بیشتر<img class="w-4" src="{{ asset('home-assets/image/arrow-left.png') }}" alt=""></div></a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 px-10 gap-5">
        @foreach($posts as $post)
        <a href="{{ route('home.post.detail' , $post->slug) }}" class="shadow-lg rounded-3xl p-4 hover:text-red-600 transition">
            <div>
                <img class="rounded-xl hover:scale-105 transition" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
            </div>
            <div class="text-sm opacity-90 py-5">
                {{ $post->title }}
            </div>
        </a>
        @endforeach

    </div>
</div>
