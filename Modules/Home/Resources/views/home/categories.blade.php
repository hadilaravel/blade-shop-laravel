<div class="bg-white rounded-2xl py-6 shadow-xl my-10">
    <div class="flex justify-between px-5 pb-5 md:px-10 items-center">
        <div class="border-b-2 border-red-500 pb-1">دسته بندی های محبوب</div>
        <a href="{{ route('home.products' , ['sort' => 1]) }}"><div class="transition px-4 py-2 rounded-xl flex justify-center items-center text-red-500 hover:text-red-600">دیدن همه<img class="w-4" src="{{ asset('home-assets/image/arrow-left.png') }}" alt=""></div></a>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-x-4 gap-y-4 md:gap-x-8 2xl:gap-x-10 px-3 md:px-8 lg:px-28">
        @foreach($categories as $category)
        <a href="{{ route('home.products' ,  $category->id) }}" class="flex justify-center items-center flex-col gap-y-3 hover:scale-105 transition">
            <img src="{{ asset($category->image) }}" alt="{{ $category->name }}">
            <div class="text-sm opacity-90">{{ $category->name }}</div>
        </a>
        @endforeach

    </div>
</div>
