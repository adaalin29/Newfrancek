@extends('parts.template') @section('title', 'Page Title') @section('content')
<div class="container">
    <div class="pagini">
        <a href="" class="pagini-text-mare">{{__('site.homepage')}} |</a>
        <a href="celebrity" class="pagini-text-mic">{{__('site.celebrity')}} </a>
    </div>
    <div class="page-title">{{__('site.celebrity')}}</div>
    <div class="services-description">{!!settings('celebrity.description')!!}</div>
    <div class="appointment-salons">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @php ($delay_contor = 0)
                @foreach($celebrities as $item)
                <div class="swiper-slide">
                    <div class = "celebrity-person">
                        <div class = "celebrity-image"><img src = "{{ route('thumb', ['width:400', $item->image]) }}" class = "full-width"></div>
                        <div class = "celebrity-overlay">
                        <div class = "celebrity-name">{{$item->name}}</div>
                        </div>
                    </div>
                </div>
                <?php $delay_contor++ ?>
                @endforeach

            </div>
            <!-- Add Arrows -->
        </div>
        <div class="swiper-button-next">
            <img src="images/swiper-right.svg" class="full-width">
        </div>
        <div class="swiper-button-prev">
            <img src="images/swiper-left.svg" class="full-width">
        </div>
    </div>

    <div class = "celebrity-photo-title">{{__('site.celebrity-gallery')}}</div>
    <div class = "gallery-items-container">
        @php ($delay_contor = 0)
        @foreach($gallery->images as $item)
        <a class = "gallery-item-container fancybox-width" data-fancybox="gallery" href = "{{ route('thumb', ['width:1920', $item]) }}" data-aos-delay="{{$delay_contor*150}}" data-aos-easing="ease-in-sine"  data-aos="fade-right">
            <img style = "transition:0.5s;" src = "{{ route('thumb', ['width:300', $item]) }}" class = "full-width">
            <div class="gallery-category-overflow">
                <div class = "search-image"><img src = "images/search.svg" class = "full-width"></div>
            </div>
        </a>
         <?php $delay_contor++ ?>
        @endforeach
    </div>
</div>
@endsection
@push('scripts')
<script>
$( document ).ready(function() {

    $swiperSlides = 5;
    $swiperSlidesPerView = 5;

    if (screen.width <= 1366) {
        $swiperSlides = 4;
        $swiperSlidesPerView = 4;
    }
    if (screen.width <= 1024) {
        $swiperSlides = 3;
        $swiperSlidesPerView = 3;
    }
    if (screen.width <= 768) {
        $swiperSlides = 2;
        $swiperSlidesPerView = 2;
    }
    if (screen.width <= 480) {
        $swiperSlides = 1;
        $swiperSlidesPerView = 1;
    }

    var swiperSalons = new Swiper('.appointment-salons .swiper-container', {
        slidesPerView: $swiperSlides,
        spaceBetween: 30,
        slidesPerGroup: $swiperSlidesPerView,
        loop: false,
        loopFillGroupWithBlank: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

});
</script>
@endpush