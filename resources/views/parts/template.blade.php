<!DOCTYPE html>
<html>

<head>
    <base href="{{ URL::to('/') }}" />
    <title>Francek - {{$metaTitle}}</title>
    <meta charset="utf-8" />
    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link runat="server" rel="shortcut icon" href="images/favi.ico" type="image/x-icon"/>
    <link runat="server" rel="icon" href="images/favi.ico" type="image/ico"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- responsive use only -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="css/swiper.min.css" rel="stylesheet" type="text/css" />
    <link href="css/fancybox.min.css" rel="stylesheet" type="text/css" />
    <link href="css/datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="css/aos.css" rel="stylesheet" type="text/css" />

    {{-- <link href="css/responsive.css" rel="stylesheet" type="text/css" /> <!-- responsive use only --> --}}
    {{-- <link href="css/swiper.min.css" rel="stylesheet" type="text/css" /> --}}
    @stack('styles')
</head>

<body>
    @include('parts.header')
    <div id="page">
        <div class="sidenav">
            <div class="container" style="height:100%">
                <div class="close-sidenav-container">
                    <div class="close-sidenav">Close</div>
                </div>
                <div class="sidenav-align">
                    <div class="sidenav-container">
                        <a href="/" class="sidenav-element">{{__('site.home')}}</a>

                        <div class="sidenav-element-special-container">
                            <div class="sidenav-element-special-left">{{__('site.francek')}}</div>
                            <div class="sidenav-element-special-right">
                                <a href="biography" class="sidenav-eement-small">{{__('site.element-mic-bio')}}</a>
                                <a href="team" class="sidenav-eement-small">{{__('site.element-mic-team')}}</a>
                                <a href="salons" class="sidenav-eement-small">{{__('site.element-mic-salons')}}</a>
                            </div>
                        </div>

                        <a href="services" class="sidenav-element">{{__('site.services')}}</a>
                        <a href="gallery" class="sidenav-element">{{__('site.gallery')}}</a>
                        <a href="barber" class="sidenav-element">{{__('site.sidenav-barber')}}</a>
                        <a href="appointments" class="sidenav-element">{{__('site.sidenav-app')}}</a>
                        <div class="sidenav-element-special-container">
                            <div class="sidenav-element-special-left">{{__('site.media')}}</div>
                            <div class="sidenav-element-special-right sidenav-element-special-right-modificat">
                                <a href="lifestyle"
                                    class="sidenav-eement-small">{{__('site.element-mic-lifestyle')}}</a>
                                <a href="miss" class="sidenav-eement-small">{{__('site.element-mic-miss')}}</a>
                                <a href="celebrity"
                                    class="sidenav-eement-small">{{__('site.element-mic-celebrity')}}</a>
                                <a href="offers" class="sidenav-eement-small">{{__('site.element-mic-events')}}</a>
                                <a href="editorial"
                                    class="sidenav-eement-small">{{__('site.element-mic-editorial')}}</a>
                            </div>
                        </div>
                        <div class="sidenav-element-special-container">
                            <div class="sidenav-element-special-left">{{__('site.contact')}}</div>
                            <div class="sidenav-element-special-right sidenav-element-special-right-modificat">
                                <a href="contact" class="sidenav-eement-small">{{__('site.hour-location')}}</a>
                                <a href="jobs" class="sidenav-eement-small">{{__('site.jobs')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




         {{-- <div class="appointment-sidenav">
            <div class="close-sidenav-container">
                <div class="close-sidenav appointment-close">Close</div>
            </div>
            <div class="appointment-text">{{__('site.make-appointment')}}</div>
            <a href="appointments" class="price-button appointment-button">
                <div class="price-text">{{__('site.schedule')}}</div>
            </a>
        </div>  --}}



        <main id="content">
            @yield('content')
        </main>
        <footer id="footer">
            @include('parts.footer')
        </footer>
    </div>
    <!--[if lt IE 9]> <script src="js/html5shiv.js"></script> <![endif]-->
    {{-- <script src="js/common.js" type="text/javascript"></script> --}}
    <script src="js/jquerry.js" type="text/javascript"></script>
    <script src="js/aos.js" type="text/javascript"></script>
    <script src="js/common.js" type="text/javascript"></script>
    <script src="js/swiper.min.js" type="text/javascript"></script>
    <script src="js/fancybox.min.js" type="text/javascript"></script>
    <script src="js/datepicker.min.js" type="text/javascript"></script>
    <script src="js/datepicker.en.js" type="text/javascript"></script>
    <script src="js/datepicker.de.js" type="text/javascript"></script>
    <script src="js/timepicker.js" type="text/javascript"></script>
    <script src="js/notify.js" type="text/javascript"></script>
    @stack('scripts')
</body>

</html>