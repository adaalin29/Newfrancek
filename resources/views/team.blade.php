@extends('parts.template') @section('title', 'Page Title') @section('content')
<div class="container">
    <div class="pagini">
        <a href="" class="pagini-text-mare">{{__('site.homepage')}} |</a>
        <a href="team" class="pagini-text-mic">{{__('site.team')}} </a>
    </div>
    <div class="bio-video-mobile"></div>
    <div class="page-title">{{__('site.team')}}</div>
    <div class="biblio-container">

        <video class="biblio-video" style="object-fit:contain!important;" autoplay="" playsinline="" muted=""
            preload="auto" data-aos="fade-right" data-aos-delay="250">
            <source src="http://newfrancek.laravel.touchmediahost.com/storage/Videos/video_team.mp4" type="video/mp4">
        </video>
        {{-- <div class = "biblio-image" data-aos="fade-right" data-aos-delay="250"><img src = "{{ route('thumb', ['width:800', settings('biography.banner')]) }}"
        class = "full-width"></div> --}}
    <div class="text" data-aos="fade-left" data-aos-delay="500">{!!settings('team.description')!!}</div>
    <div class="team-meet">
        <div class="team-subtitle">{{settings('team.subtitle')}}</div>
        <div class="text">{!!settings('team.team-description')!!}</div>
        {{-- @if($team!==NULL) --}}
        <div class="team-swiper-container">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($team as $person)
                    <div class="swiper-slide">

                        <a class="person-container inline"
                            style="background-image:url('{{ route('thumb', ['width:300', $person->images]) }}')"
                            data-src="#person-id-{{$person['id']}}">
                            <div class="person-details-container">
                                <div class="person-name">{{$person->name}}</div>
                            </div>
                            <div class="person-details-container-show">
                                <div class="person-name person-name-show">{{$person->name}}</div>
                                <div class="person-quali">{{$person->qualification}}</div>
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
        {{-- @endif --}}
    </div>
</div>
</div>

<div style="display:none">
    @foreach($team as $person)
    <div class="person-description-container" id="person-id-{{$person['id']}}">
        @if($person->description!=null)
        <div class="person-description-container-container">
            <div class="person-description-left">
                <img src="{{ route('thumb', ['width:800', $person->images]) }}" class="full-width">
            </div>
            <div class="person-description-right">
                <div class="person-description-title">{{$person->name}}</div>
                <div class="person-description-description">{!!$person->description!!}</div>
            </div>
        </div>
        @else
        <div class="person-description-no-container">
            <div class="person-description-title person-description-title-center">{{$person->name}}</div>
            <div class="person-description-image-da"><img class="fara-descriere-imagine"
                    src="{{ route('thumb', ['width:800', $person->images]) }}" class="full-width"></div>
        </div>
        @endif
    </div>
    @endforeach
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {

        if (screen.width <= 1024)
            $('video').appendTo('.bio-video-mobile');

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

        var swiper = new Swiper('.team-swiper-container .swiper-container', {
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

        $(".inline").fancybox({
            'hideOnContentClick': true
        });

    });
</script>
@endpush