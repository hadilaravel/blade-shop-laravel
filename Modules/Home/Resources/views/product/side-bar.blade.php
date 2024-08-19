<div class="md:w-4/12 lg:w-3/12">
    <form
        action="{{ route('home.products', ['category' => request()->category ? request()->category->id : null]) }}"
        method="get">
    <div class="bg-white mx-5 mb-4 px-3 py-3 border rounded-xl">
        <div>
            <div class="opacity-80 mb-1">
                دسته بندی:
            </div>
            <div class="space-y-1">
                @foreach($categories as $category)
                    <div class="flex items-center rounded-lg hover:bg-gray-100 opacity-80  {{ $category->id === $catRequest ? 'bg-gray-200' : '' }}">
                        <a  href="{{  route('home.products', [ 'category' => $category->id , 'search' => request()->search, 'sort' => '4', 'min_price' => request()->min_price, 'max_price' => request()->max_price , 'brands' => request()->brands ]) }}" class="w-full text-xs text-gray-900 rounded pr-1 py-2  ">
                            {{ $category->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="bg-white mx-5 mb-4 px-3 py-3 border rounded-xl">
        <div>
            <div class="opacity-80 mb-1">
                برند:
            </div>
            <div class="space-y-1">
                @foreach($brands as $brand)
                    <div class="flex items-center rounded-lg hover:bg-gray-100 opacity-80">
                        <input id="checkbox-item-{{ $brand->id }}" type="checkbox"  name="brands[]"
                               @if (request()->brands && in_array($brand->id, request()->brands)) checked @endif
                               class="w-4 h-4 bg-gray-100 border-gray-300 mr-3" value="{{ $brand->id }}">
                        <label for="checkbox-item-{{ $brand->id }}" class="w-full text-xs text-gray-900 rounded pr-1 py-2">{{ $brand->persian_name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="bg-white mx-5 mb-4 px-3 py-3 border rounded-xl">
        <div class="wrapper">
            <div class="price-input flex flex-col-reverse gap-y-3 text-sm opacity-80">
                <div class="field">
                    <span>تا</span>
                    <input type="number" name="max_price" value="{{ request()->max_price }}">
                    <span>تومان</span>
                </div>
                <div class="field">
                    <span>از</span>
                    <input type="number"  value="{{ request()->min_price }}" name="min_price" >
                    <span>تومان</span>
                </div>
            </div>
            <div class="slider">
                <!-- <div class="progress"></div> -->
            </div>
            <div class="range-input">
                <input type="range" class="range-min" min="0" max="100000000" value="0" step="100">
                <input type="range" class="range-max" min="0" max="1000000000" value="1000000" step="100">
            </div>
            <div class="flex justify-between opacity-70 text-xs my-3">
                <span>
                  ارزان ترین
                </span>
                <span>
                  گران ترین
                </span>
            </div>
            <div>
            <a style="display: flex;justify-content: center;align-content: center;" href="{{ route('home.products') }}" class="px-7 py-2 text-center text-white bg-red-500 align-middle border-0 rounded-lg shadow-md text-xs">حذف فیلتر ها</a>
            </div>
            <div style="margin-top: 10px">
                <button style="width: 100%" href="{{ route('home.products') }}" class="px-7 py-2 text-center text-white bg-blue-500 align-middle border-0 rounded-lg shadow-md text-xs">اعمال کردن فیلتر</button>
            </div>
        </div>
    </div>
    </form>
</div>
