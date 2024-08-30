<div
    class="bg-white rounded-2xl shadow-md text-sm  opacity-[0.97] absolute top-auto right-0 min-w-full w-56 z-30 mt-3"
    x-show="showChildren"
    x-transition:enter="transition ease duration-300 transform"
    x-transition:enter-start="opacity-0 translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease duration-300 transform"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-4"
    style="display: none"
    @mouseenter="showChildren=true"
    @mouseleave="showChildren=false">
    <div
        class="bg-white rounded-2xl w-full relative z-10 py-2 px-2">
        <ul class="list-reset">
@foreach($subCategories as $subCategory)
<li
    class="relative">
    <a
        href="{{ route('home.products' , ['sort' => 1 , 'category' => $subCategory->id ]) }}"
        class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
        <span class="flex-1">{{ $subCategory->name }}</span>
    </a>

{{--    @if($subCategory->activeChildren->count() > 0)--}}
{{--                    @include('home::layouts.partials.sub-categories' , ['subCategories' => $subCategory->activeChildren])--}}
{{--     @endif--}}

</li>
@endforeach
        </ul>
    </div>
</div>
