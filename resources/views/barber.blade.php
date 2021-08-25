@extends('parts.template') @section('title', 'Page Title') @section('content')
<div class="barbershop-banner">
    <img src="{{ route('thumb', ['width:1920', settings('barbershop.banner')]) }}" class="full-width">
    <div class="barber-overlay"></div>
</div>
<div class="container">
    <div class="pagini mobile-hidden"></div>
    <div class="service-top">
        <div class="services-top-left" data-aos="fade-right" data-aos-delay="250">
            <div class="services-description-title">{{__('site.barber')}}</div>
            <div class="services-description-content">{!!settings('barbershop.description1')!!}</div>
        </div>
        <div class="services-top-right">
            <div class="services-image1" data-aos="fade-left" data-aos-delay="500"><img
                    src="{{ route('thumb', ['width:340', settings('barbershop.description1-image1')]) }}"
                    class="full-width"></div>
            <div class="services-image2" data-aos="fade-right" data-aos-delay="7500"><img
                    src="{{ route('thumb', ['width:340', settings('barbershop.description1-image2')]) }}"
                    class="full-width"></div>
        </div>
    </div>
    <div class="services-bottom barber-bottom">
        <div class="barber-bottom-item" data-aos="fade-right" data-aos-delay="250">
            <div class="services-image2" data-aos="fade-right" data-aos-delay="7500"><img
                    src="{{ route('thumb', ['width:340', settings('barbershop.description2-image1')]) }}"
                    class="full-width"></div>
            <div class="services-image1" data-aos="fade-left" data-aos-delay="500"><img
                    src="{{ route('thumb', ['width:340', settings('barbershop.description2-image2')]) }}"
                    class="full-width"></div>
        </div>
        <div class="services-bottom-item" data-aos="fade-left" data-aos-delay="500">
            <div class="services-description-content description-modificat">{!!settings('barbershop.description2')!!}</div>
        </div>
    </div>

    <div class="barber-images">
        <div class="form-title">{{__('site.gallery-barber')}}</div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($gallery->images as $item)
                <div class="swiper-slide">
                    <a class = "gallery-item-container fancybox-width gallery-barber" data-fancybox="gallery" href = "{{ route('thumb', ['width:1920', $item]) }}">
                        <img style = "transition:0.5s;" src = "{{ route('thumb', ['width:300', $item]) }}" class = "full-width">
                        <div class="gallery-category-overflow">
                            <div class = "search-image"><img src = "images/search.svg" class = "full-width"></div>
                        </div>
                    </a>
                </div>
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
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {


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

        var swiper = new Swiper('.barber-images .swiper-container', {
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