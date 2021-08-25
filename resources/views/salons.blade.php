@extends('parts.template') @section('title', 'Page Title') @section('content')
<div class="container">
    <div class="pagini">
        <a href="" class="pagini-text-mare">{{__('site.homepage')}} |</a>
        <a href="salons" class="pagini-text-mic"> {{__('site.salons')}}</a>
    </div>

    <div class="salons-container">
        <div class="salons-left">
            <div class="salons-title">{{settings('salons.title')}}</div>
            <div class="salons-text">{{settings('salons.description')}}</div>
        </div>
        {{-- <div class="salons-right">
            <div class="appointment-salons">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($salons as $item)
                        <div class="swiper-slide">
                        <a href = "salon-detail/{{$item->slug}}" class="service-element">
                                <div class="service-image"><img src="{{ route('thumb', ['width:260', $item->image]) }}"
                                        class="full-width">
                                </div>
                                <div class="gallery-category-overflow">
                                    <div class="gallery-category-name service-name">{{$item->name}}</div>
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
                <div class="swiper-button-prev prev-modificat">
                    <img src="images/swiper-left.svg" class="full-width">
                </div>
            </div>
        </div> --}}
    </div>
    <div class="appointment-salons">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($salons as $item)
                <div class="swiper-slide">
                <a href = "salon-detail/{{$item->slug}}" class="service-element">
                        <div class="service-image"><img src="{{ route('thumb', ['width:260', $item->image]) }}"
                                class="full-width">
                        </div>
                        <div class="gallery-category-overflow">
                            <div class="gallery-category-name service-name">{{$item->name}}</div>
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
        <div class="swiper-button-prev prev-modificat prev-modificat-modificat">
            <img src="images/swiper-left.svg" class="full-width">
        </div>
    </div>

    <div class = "celebrity-photo-title">{{__('site.gallery-salons')}}</div>
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
    $(document).ready(function () {


        $swiperSlides = 4;
        $swiperSlidesPerView = 4;

        if (screen.width <= 1366) {
            $swiperSlides = 3;
            $swiperSlidesPerView = 3;
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