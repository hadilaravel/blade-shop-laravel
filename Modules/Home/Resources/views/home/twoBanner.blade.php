<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
    @foreach($bannerTwoPhotos as $bannerTwoPhoto)
    <a href="{{ route('home.products') }}">
        <img class="rounded-xl" src="{{ $bannerTwoPhoto->image }}" alt="">
    </a>
    @endforeach
</div>
