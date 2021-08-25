@extends('parts.template') @section('title', 'Page Title') @section('content')
<div class="container">
    <div class="pagini">
        <a href="" class="pagini-text-mare">{{__('site.homepage')}} |</a>
        <a href="contact" class="pagini-text-mic">{{__('site.contact')}} </a>
    </div>
    <div class="contact-container">
        <form class="contact-form">
            <div class="contact-title">{{__('site.contact')}}</div>
            <div class="contact-subtitle">{{__('site.contact-subtitle')}}</div>
            <div class="form-top" data-aos-delay="250" data-aos="fade-right">
                <div class="form-top-element contact-form-element">
                    <div class="form-text">{{__('site.name')}}</div>
                    <input class="form-input" type="text" id="name" name="name">
                </div>
                <div class="form-top-element contact-form-element">
                    <div class="form-text">{{__('site.phone')}}</div>
                    <input class="form-input" type="number" id="number" name="number">
                </div>
            </div>
            <div class="form-top" data-aos-delay="250" data-aos="fade-right">
                <div class="form-top-element contact-form-element">
                    <div class="form-text">{{__('site.email')}}</div>
                    <input class="form-input" type="email" id="name" name="email">
                </div>
                <div class="form-top-element contact-form-element">
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
            <div class="form-text" style="margin-top:20px;" data-aos-delay="500" data-aos="fade-right">
                {{__('site.message')}}</div>
            <textarea name="message" data-aos-delay="500" data-aos="fade-right"></textarea>
            <div class="form-terms">
                <label class="checkbox">
                    <input type="checkbox" id="accept-privacy" name="terms" value="terms">
                    <span></span>
                </label>
                <div class="form-terms-text">{{__('site.form-accept')}}</div>
            </div>
            <div id="result"></div>
            <div class="price-button-container contact-button-contaner">
                <button class="price-button contact-button">
                    <div class="price-text">{{__('site.send')}}</div>
                    <div class="price-image"><img class="full-width" src="images/subscribe-arrow.svg"></div>
                </button>
            </div>
        </form>
        <div id="map-container" data-aos-delay="750" data-aos="fade-left">
            <div id="map-canvas" onclick="mapsSelector()" style="height:100%"></div>
        </div>

    </div>
    <div class="contact-detail-container">
        <div class="contact-detail-left">
            <div class="contact-detail-title">{{__('site.contact-details')}}</div>
            <div class="contact-details-text">E-mail:</div>
            <a href="mailto:{{settings('contact.email')}}"
                class="contact-details-text">{{settings('contact.email')}}</a>
            <div class="contact-details-text">Social media:</div>
            <div class="social-contact-container">
                <a href="{{settings('index.facebook')}}" target="_blank" class="banner-social-item"><img
                        src="images/facebook.svg"></a>
                <a href="{{settings('index.instagram')}}" target="_blank" class="banner-social-item"><img
                        src="images/instagram.svg"></a>
            </div>
        </div>
        <div class="contact-detail-center">
            <div class="contact-detail-title">{{__('site.salons')}}</div>
            <div class="contact-salon-text">{!!settings('contact.salon1')!!}</div>
            <div class="contact-salon-text">{!!settings('contact.salon2')!!}</div>
            <div class="contact-salon-text">{!!settings('contact.salon3')!!}</div>
        </div>
        <div class="contact-detail-right">
            <div class="contact-salon-text">{!!settings('contact.salon4')!!}</div>
            <div class="contact-salon-text">{!!settings('contact.salon5')!!}</div>
            <div class="contact-salon-text">{!!settings('contact.salon6')!!}</div>
        </div>
    </div>
</div>

@endsection
@push('scripts')


<script>
    document.addEventListener("DOMContentLoaded", function () {
        $.ajaxSetup({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        var $formContact = $('.contact-form');
        var $rezultatFormular = $('#result');
        $('.price-button').on('click', function (event) {
            event.preventDefault();
            $.ajax({
                method: 'POST',
                url: '{{ action("ContactController@send_contact") }}',
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

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCmM1P-D5Zka0kPEbZSrsR90gpBlDxgm18"></script>
<script>
//     function initialize() {

//         // 				var geocoder;

//         //         var address = "{{setting('site.adresa')}}";

//         // # Get marker data

//         var defaultMarkerLat = "{{setting('contact.latitude')}}";
//         var defaultMarkerLng = "{{setting('contact.longitude')}}";

//         var markerImg = '../images/marker.png';

//         var markerTitle = "{{setting('site.title')}}";



//         // # Show map

//         var myLatlng = new google.maps.LatLng(defaultMarkerLat, defaultMarkerLng);
//         var myLatlng = new google.maps.LatLng(defaultMarkerLat, defaultMarkerLng);

//         var mapOptions = {

//             zoom: 15,

//             center: myLatlng,

//             scrollwheel: false,

//             mapTypeId: google.maps.MapTypeId.ROADMAP,

//             disableDefaultUI: true

//         }

//         var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

//         // # Show marker

//         var marker = new google.maps.Marker({



//             position: myLatlng,

//             map: map,

//             // 					icon:{markerImg} ,
//             icon: {
//                 url: "images/marker.png",
//                 scaledSize: new google.maps.Size(48, 58)
//             },

//             title: markerTitle
//         });

//     }


//     google.maps.event.addDomListener(window, 'load', initialize);;

//     function mapsSelector() {
//         if /* if we're on iOS, open in Apple Maps */ ((navigator.platform.indexOf("iPhone") != -1) ||
//             (navigator.platform.indexOf("iPad") != -1) ||
//             (navigator.platform.indexOf("iPod") != -1))
//             window.open(
//                 "http://maps.apple.com/?ll={{setting('contact.contact-latitudine')}},{{setting('contact.contact-longitudine')}}"
//             );
//         //      window.open("https://maps.google.com/maps?daddr={{setting('contact.contact-latitudine')}},{{setting('contact.contact-longitudine')}}&amp;ll=");
//         else /* else use Google */
//             window.open(
//                 "https://maps.google.com/maps?daddr={{setting('contact.contact-latitudine')}},{{setting('contact.contact-longitudine')}}&amp;ll="
//             );
//     }
  document.addEventListener("DOMContentLoaded", function () {

    
  var locations = [
      ['FRANCEK F1', 47.988065, 7.845704, 4],
      ['FRANCEK F2', 47.996114, 7.843187, 5],
      ['FRANCEK F3', 48.260014, 7.723087, 3],
      ['FRANCEK F4', 48.040762, 7.865673, 2],
      ['FRANCEK F5', 47.997112, 7.848015, 1],
      ['FRANCEK F6', 47.997083, 7.847940, 1],
    ];  
    
    
  var icon = {
    url: "../images/marker.png", // url
    scaledSize: new google.maps.Size(30, 30), // scaled size
};

  function initMap() {
    map = new google.maps.Map(document.getElementById('map-container'), {
      zoom:13,
      center: {"lat":48.010000, "lng": 7.845758 }
    });
  }
 
  initMap();

  for (let i = 0; i < locations.length; i++) {
    console.log('c');
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        icon:icon
      });
  }
   
  });
  
</script>
@endpush