@extends('parts.template') @section('title', 'Page Title') @section('content')
<div class="container">
    <div class="pagini">
        <a href="" class="pagini-text-mare">{{__('site.homepage')}} |</a>
        <a href="services" class="pagini-text-mic">{{__('site.services-page')}} | {{$services->name}} </a>
    </div>
    <div class="service-top">
        <div class="services-top-left" data-aos="fade-right" data-aos-delay="250">
            <div class="services-description-title">{{$services->name}}</div>
            <div class="services-description-content">{!!$services->description1!!}</div>
        </div>
        <div class="services-top-right">
            <div class="services-image1" data-aos="fade-left" data-aos-delay="500"><img src="{{ route('thumb', ['width:340', $services->image_girl1]) }}"
                    class="full-width"></div>
            <div class="services-image2" data-aos="fade-right" data-aos-delay="7500"><img src="{{ route('thumb', ['width:340', $services->image_girl2]) }}"
                    class="full-width"></div>
        </div>
    </div>
    <div class="services-bottom">
        <div class="services-bottom-item" data-aos="fade-right" data-aos-delay="250">
            <img src="{{ route('thumb', ['width:700', $services->image]) }}" class="full-width">
        </div>
        <div class="services-bottom-item" data-aos="fade-left" data-aos-delay="500">
            <div class="services-description-content">{!!$services->description2!!}</div>
        </div>
    </div>
    <div class="services-description-bottom" data-aos="fade-up" data-aos-delay="250">{!!$services->description3!!}</div>
    @if($services->price_list!=null)
    <a data-fancybox="gallery" href = '{{app()->getLocale()=="de"?"images/price-de.pdf":"images/price-en.pdf"}}' data-type="iframe" target = "_blank" class="price-button-container fancybox-width">
        <div class="price-button">
            <div class="price-text">{{__('site.see-price')}}</div>
            <div class="price-image"><img class="full-width" src="images/subscribe-arrow.svg"></div>
        </div>
    </a>
  @endif
    <div class="other-services">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($anotherServices as $service)
                <div class="swiper-slide">
                    <a href="service-detail/{{$service->slug}}" class="service-element" >
                        <div class="service-image"><img src="{{ route('thumb', ['width:260', $service->image]) }}" class="full-width">
                        </div>
                        <div class="gallery-category-overflow">
                            <div class="gallery-category-name service-name">{{$service->name}}</div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
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

            var swiper = new Swiper('.other-services .swiper-container', {
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