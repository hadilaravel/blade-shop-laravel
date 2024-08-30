@foreach($categories as $category)
<li
    class="block relative"
    x-data="{showChildren:false}">
    <a
        href="{{ route('home.products' , ['sort' => 1 , 'category' => $category->id ]) }}"
        class="flex items-center h-10 leading-10 px-3 text-sm mx-1 transition text-gray-700 hover:text-red-500"
        @mouseenter="showChildren=true"
        @mouseleave="showChildren=false">
        <span>{{ $category->name }}</span>
        @if($category->activeChildren->count() > 0)
        <span>
                    <img class="w-4 mr-1" src="{{ asset('home-assets/image/chevron-down-login.png') }}" alt="" />
                  </span>
        @endif
    </a>

    @if($category->activeChildren->count() > 0)
                    @include('home::layouts.partials.sub-categories' , ['subCategories' => $category->activeChildren])
    @endif
</li>
@endforeach
