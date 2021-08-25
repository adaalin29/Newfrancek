@extends('parts.template') @section('title', 'Page Title') @section('content')
<div class="container">
    <div class="pagini">
        <a href="" class="pagini-text-mare">{{__('site.homepage')}} |</a>
        <a href="miss" class="pagini-text-mic"> {{__('site.miss-germany')}}</a>
    </div>
    <div class="page-title">{{__('site.miss-germany')}}</div>

    <div class="appointment-salons">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @php ($delay_contor = 0)
                @foreach($miss as $item)
                <div class="swiper-slide">
                    <a target = "scroll" class="service-element" data-aos-delay="{{$delay_contor*150}}" data-aos-easing="ease-in-sine"  data-aos="fade-right" style = "cursor:pointer;" id_miss="{{$item['id']}}">
                        <div class="service-image"><img src="{{ route('thumb', ['width:260', $item->images[0]]) }}"
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
    <div class = "scroll"></div>
    <div class="miss-album-container"  data-aos="fade-left" data-aos-delay="500">
        @foreach($miss as $album)
        <div class="album-container categorie-{{$album['id']}}">
            <div class="album-title">{{$album->name}}</div>
            <div class="album">
                @foreach($album->images as $item)
                <a class="album-item-container fancybox-width" data-fancybox="gallery"
                    href="{{ route('thumb', ['width:1920', $item]) }}">
                    <img style="transition:0.5s;" src="{{ route('thumb', ['width:300', $item]) }}" class="full-width">
                    <div class="gallery-category-overflow gallery-category-overflow-modificat">
                        <div class="search-image"><img src="images/search.svg" class="full-width"></div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {

        $('.service-element').click(function () {
            var categorie_curenta = $(this).attr('id_miss');
            if (categorie_curenta == 0) {
                $('.album-container').fadeIn();
            } else {
                var elemente_afisate = '.categorie-' + categorie_curenta;
                $('.album-container').fadeOut();
                console.log(elemente_afisate);
                $(elemente_afisate).fadeIn();

            }

            $('html, body').animate({
                scrollTop: eval($('.' + $(this).attr('target')).offset().top - 70)
            }, 1000);
        });

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