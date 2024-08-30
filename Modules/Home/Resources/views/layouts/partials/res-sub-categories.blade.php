<div
    class="bg-white rounded-2xl shadow-lg border-1 border-gray-50 text-sm absolute top-full right-0 min-w-full w-56 z-30 mt-1"
    x-show="showChildren"
    x-transition:enter="transition ease duration-300 transform"
    x-transition:enter-start="opacity-0 translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease duration-300 transform"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-4"
    style="display: none">
    </span>
    <div
        class="bg-white rounded-2xl w-full relative z-10 py-2 px-2">
        <ul class="list-reset">
            @foreach($subCategories as $subCategory)
            <li
                class="relative"
                x-data="{showChildren:false}"
                @mouseleave="showChildren=false"
                @mouseenter="showChildren=true">
                <a
                    href="{{ route('home.products' , ['sort' => 1 , 'category' => $subCategory->id ]) }}"
                    class="px-4 py-2 flex w-full items-start hover:bg-red-100 rounded-lg transition no-underline hover:no-underline duration-100 cursor-pointer">
                    <span class="flex-1">{{ $subCategory->name }}</span>
                </a>
            </li>
            @endforeach

        </ul>
    </div>
</div>

