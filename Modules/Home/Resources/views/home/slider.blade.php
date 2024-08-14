<div class="md:w-[100%] mx-auto md:mt-5 hidden md:block">
    <div dir="ltr" class="owl-carousel">
        @foreach($bannerSliders as $bannerSlider)
        <div class="box-border">
            <a href="#"
            ><img class="rounded-md md:rounded-3xl md:px-2 box-border" src="{{ $bannerSlider->image }}" alt="بنر محصولات"
                /></a>
        </div>
        @endforeach
    </div>
</div>
<!-- HERO SLIDER MOBILE -->
<div class="md:w-[100%] mx-auto md:mt-5 md:hidden">
    <div dir="ltr" class="owl-carousel">
        @foreach($bannerSliders as $bannerSlider)
        <div class="box-border">
            <a href="#"
            ><img class="rounded-md md:rounded-3xl md:px-2 box-border" src="{{ $bannerSlider->image }}" alt=""
                /></a>
        </div>
        @endforeach
    </div>
</div>
