@extends('parts.template') @section('title', 'Page Title') @section('content')
<div class="barbershop-banner">
    <img src="{{ route('thumb', ['width:1920', $salon->banner]) }}" class="full-width">
    <div class="barber-overlay"></div>
</div>
<div class="container">
    <div class="pagini mobile-hidden">
        <a href="" class="pagini-text-mare">{{__('site.homepage')}} |</a>
        <a href="services" class="pagini-text-mic">{{__('site.salons')}} | {{$salon->name}} </a>
    </div>
    <div class="service-top">
        <div class="services-top-left" data-aos="fade-right" data-aos-delay="250">
            <div class="services-description-title">{{$salon->name}}</div>
            <div class="services-description-content">{!!$salon->description!!}</div>
        </div>
        <div class="services-top-right">
            <div class="services-image1" data-aos="fade-left" data-aos-delay="500"><img
                    src="{{ route('thumb', ['width:340', $salon->description1_image1]) }}" class="full-width"></div>
            <div class="services-image2" data-aos="fade-right" data-aos-delay="7500"><img
                    src="{{ route('thumb', ['width:340', $salon->description1_image2]) }}" class="full-width"></div>
        </div>
    </div>
    <div class="services-bottom">
        <div class="services-bottom-item" data-aos="fade-right" data-aos-delay="250">
            <img src="{{ route('thumb', ['width:700', $salon->description2_image]) }}" class="full-width">
        </div>
        <div class="services-bottom-item" data-aos="fade-left" data-aos-delay="500">
            <div class="services-description-title">{{__('site.services')}}</div>
            <div class="services-description-content salon-mobile-margin">{!!$salon->description2!!}</div>
        </div>
    </div>
    <div class="team-meet">
        <div class="team-subtitle">{{settings('team.subtitle')}}</div>
        <div class="text">{!!settings('team.team-description')!!}</div>
        @if($salon->teams)
        <div class="team-swiper-container">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($salon->teams as $person)
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
        @endif
    </div>

  @if($gallery!=null)
   <div class="page-title salon-gallery">{{$gallery->categories['name']}}</div>
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
  @endif
  
  
    <div class="details-container">
        <div class="detail-item">
            <div class="detail-image"><img src="images/detail-image1.svg"></div>
            <div class="detail-text">{{$salon->location}}</div>
        </div>
        <div class="detail-item">
            <div class="detail-image"><img src="images/detail-image2.svg"></div>
        <a href = "mailto:{{$salon->email}}" class="detail-text">{{$salon->email}}</a>
        </div>
        <div class="detail-item">
            <div class="detail-image"><img src="images/detail-image3.svg"></div>
            <a href = "tel:{{$salon->phone}}" class="detail-text">{{$salon->phone}}</a>
        </div>
        <div class="detail-item">
            <div class="detail-image"><img src="images/detail-image4.svg"></div>
            <div class="detail-text">{{$salon->time}}</div>
        </div>
    </div>

    <div class = "appointment-salons">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($salon->services as $item)
              <div class="swiper-slide">
                <div  class="service-element">
                    <div class="service-image"><img src="{{ route('thumb', ['width:260', $item->image]) }}"
                            class="full-width">
                    </div>
                    <div class="gallery-category-overflow">
                        <div class="gallery-category-name service-name">{{$item->name}}</div>
                    </div>
                </div>
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
@if($salon->teams)
<div style="display:none">
    @foreach($salon->teams as $person)
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
@endif
<div class = "salon-map">
    <div id="map-canvas" onclick="mapsSelector()" style="height:100%"></div>
</div>
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCmM1P-D5Zka0kPEbZSrsR90gpBlDxgm18"></script>
<script>
    function initialize() {

        // 				var geocoder;

        //         var address = "{{setting('site.adresa')}}";

        // # Get marker data

        var defaultMarkerLat = {!! json_encode($salon->latitude, JSON_HEX_TAG) !!};

        var defaultMarkerLng = {!! json_encode($salon->longitude, JSON_HEX_TAG) !!};

        var markerImg = '../images/marker.png';

        var markerTitle = "{{setting('site.title')}}";



        // # Show map

        var myLatlng = new google.maps.LatLng(defaultMarkerLat, defaultMarkerLng);

        var mapOptions = {

            zoom: 15,

            center: myLatlng,

            scrollwheel: false,

            mapTypeId: google.maps.MapTypeId.ROADMAP,

            disableDefaultUI: true

        }

        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        // # Show marker

        var marker = new google.maps.Marker({



            position: myLatlng,

            map: map,

            // 					icon:{markerImg} ,
            icon: {
                url: "images/marker.png",
                scaledSize: new google.maps.Size(48, 58)
            },

            title: markerTitle
        });

    }


    google.maps.event.addDomListener(window, 'load', initialize);;

    function mapsSelector() {
        if /* if we're on iOS, open in Apple Maps */ ((navigator.platform.indexOf("iPhone") != -1) ||
            (navigator.platform.indexOf("iPad") != -1) ||
            (navigator.platform.indexOf("iPod") != -1))
            window.open(
                "http://maps.apple.com/?ll={{setting('contact.contact-latitudine')}},{{setting('contact.contact-longitudine')}}"
            );
        //      window.open("https://maps.google.com/maps?daddr={{setting('contact.contact-latitudine')}},{{setting('contact.contact-longitudine')}}&amp;ll=");
        else /* else use Google */
            window.open(
                "https://maps.google.com/maps?daddr={{setting('contact.contact-latitudine')}},{{setting('contact.contact-longitudine')}}&amp;ll="
            );
    }
</script>
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