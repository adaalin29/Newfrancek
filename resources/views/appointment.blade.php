@extends('parts.template') @section('title', 'Page Title') @section('content')
<div class="container">
    <div class="pagini">
        <a href="" class="pagini-text-mare">{{__('site.homepage')}} |</a>
        <a href="team" class="pagini-text-mic">{{__('site.appointment-top')}} </a>
    </div>
    <div class="bio-video-mobile"></div>
    <div class="page-title">{{__('site.site-appointment')}}</div>
    <div class="services-description appointment-description">{{__('site.welcome')}}</div>
    <form class="pages-form" action='{{ action("ContactController@send_appointment") }}' method="post">
        <div class="gender-container" data-aos-delay="500" data-aos="fade-right">
            <div class="gender-item">
                <label class="checkbox">
                    <input type="checkbox" class="gender" id="accept-privacy" value='Ms.' name="gender" value="Ms.">
                    <span></span>
                </label>
                <div class="gender-text">{{__('site.ms')}}</div>
            </div>
            <div class="gender-item">
                <label class="checkbox">
                    <input type="checkbox" class="gender" id="accept-privacy" value="Mr." name="gender" value="Mr.">
                    <span></span>
                </label>
                <div class="gender-text">{{__('site.mr')}}</div>
            </div>
        </div>
        <div class="form-top" data-aos-delay="750" data-aos="fade-right">
            <div class="form-top-element">
                <div class="form-text">{{__('site.name')}}</div>
                <input class="form-input" type="text" id="name" name="name">
            </div>
            <div class="form-top-element">
                <div class="form-text">{{__('site.email')}}</div>
                <input class="form-input" type="email" id="email" name="email">
            </div>
            <div class="form-top-element">
                <div class="form-text">{{__('site.phone')}}</div>
                <input class="form-input" type="number" id="number" name="number">
            </div>
        </div>
        <div class="form-top" data-aos-delay="1000" data-aos="fade-right">
            <div class="form-top-element-modificat">
                <div class="form-text">{{__('site.select-service')}}</div>
                <div class="select-container">
                    <select id="service" name="service">
                        @foreach($services as $service)
                        <option value="{{$service->name}}">{{$service->name}}</option>
                        @endforeach
                    </select>
                    <div class="select-arrow"><img src="images/white-arrow.svg" class="full-width"></div>
                </div>
            </div>
            <div class="form-top-element-modificat"data-aos-delay="1250" data-aos="fade-right">
                <div class="form-text">{{__('site.select-studio')}}</div>
                <div class="select-container">
                    <select id="salons" name="salons">
                        @foreach($salons as $salon)
                        <option value="{{$salon->name}}">{{$salon->name}}</option>
                        @endforeach
                    </select>
                    <div class="select-arrow"><img src="images/white-arrow.svg" class="full-width"></div>
                </div>
            </div>

        </div>
        <div class='form-top'data-aos-delay="1500" data-aos="fade-right">
            <div class="form-top-element-modificat">
                <div class="form-text">{{__('site.date')}}</div>
                <div class="select-container">
                    <input class="form-input datepicker-here" data-position="bottom left" type="text" id="date" name="date"
                        data-language='en'>
                    <div class="select-arrow"><img src="images/event.svg" class="full-width"></div>

                </div>
            </div>
            <div class="form-top-element-modificat">
                <div class="form-text">{{__('site.hour')}}</div>
                <div class="select-container">
                    <input class="form-input  time-picker" type="text" id="date" name="hour" data-precision="30">
                    <div class="select-arrow"><img src="images/time.svg" class="full-width"></div>
                </div>
            </div>
        </div>
        <div class="form-text" style="margin-top:20px;" >{{__('site.message')}}</div>
        <textarea name="message"></textarea>
        <div class="form-terms">
            <label class="checkbox">
                <input type="checkbox" id="accept-privacy" name="terms" value="terms">
                <span></span>
            </label>
            <div class="form-terms-text">{{__('site.terms')}}</div>
        </div>
        <div id="result"></div>
        <div class="price-button-container align-center">
            <button class="price-button">
                <div class="price-text">{{__('site.schedule')}}</div>
                <div class="price-image"><img class="full-width" src="images/subscribe-arrow.svg"></div>
            </button>
        </div>
    </form>

    <div class = "appointment-salons">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($salons as $item)
              <div class="swiper-slide">
              <a href = "salon-detail/{{$item->slug}}"  class="service-element">
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
                <div class="swiper-button-prev">
                    <img src="images/swiper-left.svg" class="full-width">
                </div>
    </div>


</div>

@endsection
@push('scripts')
<script>
    $(document).ready(function () {

        $(".inline").fancybox({
            'hideOnContentClick': true
        });
        $('input.gender').on('change', function () {
            $('input.gender').not(this).prop('checked', false);
        });
        $('#date').datepicker({
            language: 'en',
            minDate: new Date() // Now can select only dates, which goes after today
        });
        $('.time-picker').clockTimePicker({
            duration: true,

            i18n: {
                cancelButton: 'Cancel'
            },
            colors: {
                popupHeaderBackgroundColor: '#B6A27F',
                selectorColor: '#B6A27F',
                popupHeaderBackgroundColor: '#B6A27F',
                hoverCircleColor: '#B6A27F',
                // buttonTextColor: '#B6A27F',
            },
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $.ajaxSetup({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        var $formContact = $('.pages-form');
        var $rezultatFormular = $('#result');
        $('.price-button').on('click', function (event) {
            event.preventDefault();
            $.ajax({
                method: 'POST',
                url: '{{ action("ContactController@send_appointment") }}',
                data: $formContact.serializeArray(),
                context: this,
                async: true,
                cache: false,
                dataType: 'json'
            }).done(function (res) {
                console.log(res);
                if (res.success == true) {
                    $.notify(res.successMessage, "success");
                    setTimeout(function () {
                        window.location.reload();

                    }, 4000);
                } else {
                    //   var eroare = res.error;
                    // for (var i = 0; i < eroare.length; i++) {
                    //   eroare[i] = eroare[i] + "\n";
                    // }
                    //   $.notify(res.error, {
                    //     type: "error",
                    //     breakNewLines: true,
                    //     gap:2
                    //   });

                    $rezultatFormular.fadeIn()
                    $rezultatFormular.css('color', 'red');
                    $rezultatFormular.html(

                        '<strong>' + res.error.join('<br>') + "</strong>"
                    );
                }
            });
            return;
        });

    });
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