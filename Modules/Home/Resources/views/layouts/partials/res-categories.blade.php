@foreach($categories as $category)
    <li
    class="relative flex"
    x-data="{showChildren:false}"
    @click.away="showChildren=false">
    <a
        href="{{ route('home.products' , ['sort' => 1 , 'category' => $category->id ]) }}"
        class="flex justify-between items-center h-10 text-sm opacity-90 leading-10 px-3 cursor-pointer no-underline w-full hover:no-underline duration-100 mx-1 transition rounded-xl hover:bg-red-100"
        @mouseenter="showChildren=true"
    >
        <span>{{ $category->name }}</span>
        @if($category->activeChildren->count() > 0)
        <span>
                    <img class="w-4 mr-1" src="{{ asset('home-assets/image/chevron-down-login.png') }}" alt="" />
                  </span>
        @endif
    </a>
        @if($category->activeChildren->count() > 0)
            @include('home::layouts.partials.res-sub-categories' , ['subCategories' => $category->activeChildren])
        @endif
</li>
@endforeach
