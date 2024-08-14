<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
    @foreach($bannerImages as $bannerImage)
    <a href="#">
        <img class="rounded-xl" src="{{ $bannerImage->image }}" alt="">
    </a>
    @endforeach
</div>
