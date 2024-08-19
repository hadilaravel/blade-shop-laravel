<div class="bg-white rounded-2xl py-6 shadow-xl my-10">
    <div class="flex justify-between px-5 pb-5 md:px-10 items-center">
        <div class="border-b-2 border-red-500 pb-1">برند ها</div>
        <a href="{{ route('home.products') }}"><div class="transition px-4 py-2 rounded-xl flex justify-center items-center text-red-500 hover:text-red-600">دیدن همه<img class="w-4" src="{{ asset('home-assets/image/arrow-left.png') }}" alt=""></div></a>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-x-2 gap-y-4 md:gap-x-4 2xl:gap-x-5 px-3 md:px-8 lg:px-28">
        @foreach($brands as $brand)
        <a href="{{ route('home.products' , ['brands[]' => $brand->id]) }}" class="flex justify-center items-center flex-col gap-y-3 hover:scale-105 transition">
            <img src="{{ asset($brand->logo) }}" alt="{{ $brand->persian_name }}">
            <div class="text-sm opacity-90">{{ $brand->persian_name }}</div>
        </a>
        @endforeach

    </div>
</div>
