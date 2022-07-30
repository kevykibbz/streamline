<!doctype html>
<html class="no-js" lang="en">
<head>
    <title>DevMe | Site Installation  @yield('title')</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Site installation">
    <meta name="author" content="DevMe">
    <meta name="theme-color" content="#39f">
    <meta name="msapplication-navbutton-color" content="#39f">
    <meta name="apple-mobile-web-app-status-bar-style" content="#39f">
    <meta name="keywords" content="site installation,web setup">
    <meta http-equiv="Content-type" content="text/html;charset:utf-8">
    <meta property="og:type" content="website"> 
    <meta property="twitter:site" content="https://twitter.com/Kevin36285655">
    <meta property="twitter:title" content="@Kevin36285655">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="twitter:image" content="https://pbs.twimg.com/profile_images/1385307847542640644/zZrPhJUm_normal.jpg">
    <meta property="twitter:description" content="Follow us on twitter for more infomation and amaizing deals.">
    <meta property="twitter:text:title" content="web designs,development,setup and installation">
    <meta property="og:title" content="DevMe | Web installation">
    <meta property="og:locale" content="en_US">
    <meta property="og:description" content="Site installation">
    <meta property="og:image" content="{{ url('installation/assets/images/favicon.ico')}}">
    <meta name="apple-mobile-web-app-title" content="DevMe">
    <meta name="application-name" content="DevMe">
    <meta name="msapplication-TileColor" content="#39f">
    <meta name="msapplication-config" content="{{ url('installation/assets/images/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('installation/assets/images/favicon.ico')}}">
    <link rel="stylesheet" href="{{ url('installation/assets/css/plugins.css')}}">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ url('installation/assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ url('installation/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ url('installation/assets/css/custom.css')}}">
    <style>
      
    </style>
</head>

<body onload="load();">
    <!-- preloader -->
    <div class="placeholder">
        <div class="overlay">
            <div class="row">
                <div class="col-12">
                     <div class="loader-container">
                       <div class="loader">
                         <svg class="circular" viewBox="25 25 50 50">
                           <circle class="path" cx="50" cy="50" r="10" fill="none" stroke-width="2" stroke-miterlimit="10"/>
                         </svg>
                       </div>
                     </div>
                </div>
            </div>
         </div>
     </div>
    <!-- //preloader -->

    <div class="main-display " style="display:none">
        <!--slider area start-->
        <section class="slider_section d-flex align-items-center" data-bgimg="{{ url('installation/assets/images/slider3.jpg')}}" style="height:100vh;margin-bottom:0 !important;">
            <div class="slider_area owl-carousel">
                <div class="single_slider d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="slider_content">
                                    <img src="{{ url('installation/assets/images/loader.gif')}}" data-src="{{ url('installation/assets/images/1.png')}}" alt="">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="slider_content">
                                    <h1>Hello,</h1>
                                    <h2>Welcome To Website Setup Wizard.</h2>
                                    <p>Offering best web solution services.Begin setup</p>
                                    <a class="button button1" href="#">next</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="single_slider d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="slider_content">
                                    <img src="{{ url('installation/assets/images/loader.gif')}}" data-src="{{ url('installation/assets/images/2.png')}}" alt="slider image">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="slider_content">
                                    <h1>Accept Terms And Conditions.</h1>
                                    <h2>100% Flexible</h2>
                                    <p>By proceeding you accept our terms and Conditions.</p>
                                    <a class="button button2" href="#">Next</a>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
                <div class="single_slider d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="slider_content">
                                    <img src="{{ url('installation/assets/images/loader.gif')}}" data-src="{{ url('installation/assets/images/3.png')}}" alt="">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 mt-md-0 mt-3 position-relative">

                                <div class="load-overlay content-overlay" style="display:none;">
                                   <div class="overlay">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="loader-container">
                                                    <div class="innerloader">
                                                        <svg class="circular" viewBox="25 25 50 50">
                                                        <circle class="path" cx="50" cy="50" r="10" fill="none" stroke-width="2" stroke-miterlimit="10"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   </div>
                                </div> 
                                <div class="slider_content hider">
                                    <h1>Now ready</h1>
                                    <h2>Begin installation</h2>
                                    <p>Please follow the following steps to install site.</p>
                                    <a class="button start_installation" href="{{ url('/start')}}">start</a>
                                </div>
                            </div>                      
                        </div>
                    </div>
                </div>     
            </div>
        </section>
        <!--slider area end-->
    </div>

<script src="{{ url('installation/assets/js/jquery-3.5.1.min.js')}}"></script> 
<script src="{{ url('installation/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{ url('installation/assets/js/plugins.js')}}"></script>
<script src="{{ url('installation/assets/js/main.js')}}"></script>
<script src="{{ url('installation/assets/js/custom.js')}}"></script>
<script type="text/javascript">
    $.ajaxSetup({headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
</script>
</body>
</html>