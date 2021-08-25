@extends('parts.template') @section('title', 'Page Title') @section('content')
<div class="index-banner"
    style="background-image: url('{{ route('thumb', ['width:1920', settings('index.banner')]) }}')">
    <div class="container banner-container" data-aos="fade-right" data-aos-delay="250">
        <div class="index-banner-continut">
            <div class="index-banner-title">{{settings('index.banner-title')}}</div>
            <div class="index-banner-subtitle">{{settings('index.banner-subtitle')}}</div>
        </div>
    </div>
    <div class="index-banner-left" data-aos="fade-left" data-aos-delay="750">
        <div class="social-title">{{__('site.follow')}}</div>
        <div class="banner-social">
            <a href="{{settings('index.facebook')}}" target="_blank" class="banner-social-item"><img
                    src="images/facebook.svg"></a>
            <a href="{{settings('index.instagram')}}" target="_blank" class="banner-social-item"><img
                    src="images/instagram.svg"></a>
        </div>
    </div>
</div>
<div class="girls-top-container">
    <div class="girls-top-inner">
        {{-- fetele mai mici --}}
        <div class="girls-top-inner-top" data-aos="fade-right" data-aos-delay="500">
            <div class="inner-girl-image"><img
                    src="{{ route('thumb', ['width:700', settings('index.small-girl1-image')]) }}" class="full-width">
            </div>
            <div class="girl-description">
                <div class="girl-description-title">{{settings('index.small-girl1-title')}}</div>
                <div class="girl-description-description">{{settings('index.small-girl1-description')}}</div>
            </div>
            {{-- fata mica 1 --}}
        </div>
        <div class="girls-top-inner-top girls-top-inner-top-reverse" data-aos="fade-right" data-aos-delay="750">
            <div class="inner-girl-image"><img
                    src="{{ route('thumb', ['width:700', settings('index.small-girl2-image')]) }}" class="full-width">
            </div>
            <div class="girl-description girl-description-reverse">
                <div class="girl-description-title">{{settings('index.small-girl2-title')}}</div>
                <div class="girl-description-description">{{settings('index.small-girl2-description')}}</div>
            </div>
            {{-- fata mica 1 --}}
        </div>
    </div>
    {{-- fata mare --}}
    <div class="fata-mare" data-aos="fade-left" data-aos-delay="500"><img
            src="{{ route('thumb', ['width:700', settings('index.big-girl')]) }}" class="full-width">
    </div>
</div>
<div class="girls-bottom-container">
    <div class="inner-girl-image-bottom" data-aos="fade-right" data-aos-delay="750"><img
            src="{{ route('thumb', ['width:700', settings('index.small-girl3-image')]) }}" class="full-width">
    </div>
    <div class="girl-description-bottom">
        <div class="girl-description-title">{{settings('index.small-girl3-title')}}</div>
        <div class="girl-description-description">{{settings('index.small-girl3-description')}}</div>
    </div>
    <div class="inner-girl-image-bottom inner-girl-image-botton-mobile" data-aos="fade-left" data-aos-delay="1000"><img
            src="{{ route('thumb', ['width:700', settings('index.small-girl4-image')]) }}" class="full-width">
    </div>

</div>
<div class="index-about">
    <div class="index-about-left"data-aos="fade-right" data-aos-delay="250">
        <div class="index-about-title">{{settings('index.about-title')}}</div>
        <div class="index-about-description">{!!settings('index.about-description')!!}</div>
        <a href="biography" class="about-link"><img src="images/subscribe-arrow.svg" class="full-width"></a>
    </div>
    <div class="index-about-right">
        <div class="about-girl girl1" data-aos="fade-left" data-aos-delay="500"><img src="{{ route('thumb', ['width:470', settings('index.about-girl1')]) }}"
                class="full-width"></div>
        <div class="about-girl girl2" data-aos="fade-right" data-aos-delay="750"><img src="{{ route('thumb', ['width:470', settings('index.about-girl2')]) }}"
                class="full-width"></div>
    </div>
</div>
<div class="container">
    <div class="appointment-salons">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @php ($delay_contor = 0)
                @foreach($services as $item)
                <div class="swiper-slide" data-aos-delay="{{$delay_contor*150}}"
                data-aos-easing="ease-in-sine" data-aos="fade-right">
                    <a @if($item->id ==2) href="barber" @else href="service-detail/{{$item->slug}}" @endif class="service-element">
                        <div class="service-image"><img src="{{ route('thumb', ['width:260', $item->image]) }}"
                                class="full-width">
                        </div>
                        <div class="gallery-category-overflow">
                            <div class="gallery-category-name service-name">{{$item->name}}</div>
                        </div>
                    </a>
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
</div>
<div class = "container">
    <div class="lifestyle-container">
        <a href = "miss" class="lifestyle-item" data-aos="fade-left" data-aos-delay="250">
            <div class="lifestyle-interior"></div>
            <div class="lifestyle-image"><img
                    src="{{ route('thumb', ['width:470', settings('lifestyle.miss-image')]) }}" class="full-width">
            </div>
            <div class="lifestyle-overlay">
                <div class="lifestyle-text">{{__('site.miss-germany')}}</div>
            </div>
        </a>
        <a href = "celebrity" class="lifestyle-item">
            <div class="lifestyle-interior"></div>
            <div class="lifestyle-image"><img
                    src="{{ route('thumb', ['width:470', settings('lifestyle.celebrity-image')]) }}" class="full-width">
            </div>
            <div class="lifestyle-overlay">
                <div class="lifestyle-text">{{__('site.element-mic-celebrity')}}</div>
            </div>
        </a>
        <a href = "editorial" class="lifestyle-item" data-aos="fade-right" data-aos-delay="500">
            <div class="lifestyle-interior"></div>
            <div class="lifestyle-image"><img
                    src="{{ route('thumb', ['width:470', settings('lifestyle.editorial-image')]) }}" class="full-width">
            </div>
            <div class="lifestyle-overlay">
                <div class="lifestyle-text">{{__('site.element-mic-editorial')}}</div>
            </div>
        </a>
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
        // var swiperMobile = new Swiper('.services-elemente-mobile .swiper-container', {
        //     slidesPerView: $swiperSlides,
        //     spaceBetween: 30,
        //     slidesPerGroup: $swiperSlidesPerView,
        //     loop: false,
        //     loopFillGroupWithBlank: true,
        //     navigation: {
        //         nextEl: '.swiper-button-next',
        //         prevEl: '.swiper-button-prev',
        //     },
        // });


    });
</script>
@endpush