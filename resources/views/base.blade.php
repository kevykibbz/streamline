<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="copyright" content="Legit Crew, {{Config::get('constants.designer_link')}}">
    <title>{{$site->site_name ? $site->site_name : env('SITE_NAME') }} | @yield('title')</title>
    <meta name="description" content="{{$site->site_descreption ? $site->site_descreption : env('SITE_DESCRIPTION') }}">
    <meta name="author" content="{{Config::get('constants.author')}}">
    <meta name="theme-color" content="{{$site->theme_color ? $site->theme_color : env('THEME_COLOR') }}">
    <meta name="msapplication-navbutton-color" content="{{$site->theme_color ? $site->theme_color : env('THEME_COLOR') }}">
    <meta name="apple-mobile-web-app-status-bar-style" content="{{$site->theme_color ? $site->theme_color : env('THEME_COLOR') }}">
    <meta name="keywords" content="{{$site->site_keywords ? $site->site_keywords : env('SITE_KEYWORDS') }}">
    <meta property="og:site_name" content="{{$site->site_name ? $site->site_name : env('SITE_NAME') }}">
    <meta property="og:url" content="{{$site->site_url ? $site->site_url : env('SITE_URL') }}">
    <meta http-equiv="Content-type" content="text/html;charset:utf-8">
    <meta property="og:type" content="website"> 
    <meta property="twitter:site" content="https://twitter.com/Kevin36285655">
    <meta property="twitter:title" content="@Kevin36285655">
    <meta property="twitter:image" content="https://twitter.com/Kevin36285655/photo">
    <meta property="twitter:description" content="Life's Simple.">
    <meta property="twitter:text:title" content="Life's Simple.">
    <meta property="og:title" content="{{$site->site_name ? $site->site_name : env('SITE_NAME') }} |  @yield('title')">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:description" content="{{$site->site_descreption ? $site->site_descreption : env('SITE_DESCRIPTION') }}">
    <meta property="og:image" content="/logos/{{$site->favicon}}">
    <meta name="apple-mobile-web-app-title" content="{{$site->site_name ? $site->site_name : env('SITE_NAME') }}">
    <meta name="apple-mobile-web-app-status-bar-style" content="#2bbbad">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="application-name" content="{{$site->site_name ? $site->site_name : env('SITE_NAME') }} |  @yield('title')">
    <meta name="msapplication-TileColor" content="">
    <meta name="theme-color" content="#ffffff">
    <link rel='shortlink' href='<?php echo url()->full(); ?>' />
    <link rel="canonical" href="<?php echo url()->full(); ?>" />
    <meta name="robots" content="index, follow" />
    <meta name="msapplication-TileImage" content="{{ url('wp-content/uploads/sites/12/2018/06/cropped-favicon-300x300.png')}}" />
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <link rel='dns-prefetch' href='<?php echo url()->full(); ?>' />
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link href='//fonts.gstatic.com' crossorigin rel='preconnect' />
    <link rel="icon" href="/logos/{{$site->favicon}}" sizes="16x16" />
    <link rel="icon" href="/logos/{{$site->favicon}}" sizes="32x32" />
    <link rel="icon" href="/logos/{{$site->favicon}}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{ url('wp-content/uploads/sites/12/2018/06/cropped-favicon-300x300.png')}}" />
    <script type="text/javascript">
        window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/13.1.0\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/13.1.0\/svg\/","svgExt":".svg","source":{"concatemoji":"{{$site->site_url ? $site->site_url : env('SITE_URL') }}\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.8.4"}};
        !function(e,a,t){var n,r,o,i=a.createElement("canvas"),p=i.getContext&&i.getContext("2d");function s(e,t){var a=String.fromCharCode;p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,e),0,0);e=i.toDataURL();return p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,t),0,0),e===i.toDataURL()}function c(e){var t=a.createElement("script");t.src=e,t.defer=t.type="text/javascript",a.getElementsByTagName("head")[0].appendChild(t)}for(o=Array("flag","emoji"),t.supports={everything:!0,everythingExceptFlag:!0},r=0;r<o.length;r++)t.supports[o[r]]=function(e){if(!p||!p.fillText)return!1;switch(p.textBaseline="top",p.font="600 32px Arial",e){case"flag":return s([127987,65039,8205,9895,65039],[127987,65039,8203,9895,65039])?!1:!s([55356,56826,55356,56819],[55356,56826,8203,55356,56819])&&!s([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]);case"emoji":return!s([10084,65039,8205,55357,56613],[10084,65039,8203,55357,56613])}return!1}(o[r]),t.supports.everything=t.supports.everything&&t.supports[o[r]],"flag"!==o[r]&&(t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&t.supports[o[r]]);t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&!t.supports.flag,t.DOMReady=!1,t.readyCallback=function(){t.DOMReady=!0},t.supports.everything||(n=function(){t.readyCallback()},a.addEventListener?(a.addEventListener("DOMContentLoaded",n,!1),e.addEventListener("load",n,!1)):(e.attachEvent("onload",n),a.attachEvent("onreadystatechange",function(){"complete"===a.readyState&&t.readyCallback()})),(n=t.source||{}).concatemoji?c(n.concatemoji):n.wpemoji&&n.twemoji&&(c(n.twemoji),c(n.wpemoji)))}(window,document,window._wpemojiSettings);
    </script>
    <link rel='stylesheet'  href="{{ url('wp-content/plugins/LayerSlider/assets/static/layerslider/css/layerslider.css')}}" type='text/css'/>
    <link rel='stylesheet' href="{{ url('wp-includes/css/dist/block-library/style.min.css')}}" type='text/css'  />
    <link rel='stylesheet' href="{{ url('wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/vendors-style.css')}}" type='text/css'/>
    <link rel='stylesheet' href="{{ url('wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/style.css')}}" type='text/css' />
    <link rel='stylesheet' href="{{ url('wp-content/plugins/woocommerce/assets/css/photoswipe/photoswipe.min.css')}}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ url('wp-content/plugins/woocommerce/assets/css/photoswipe/default-skin/default-skin.min.css')}}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ url('wp-content/plugins/contact-form-7/includes/css/styles.css')}}" type='text/css'  />
    <link rel='stylesheet' href="{{ url('wp-content/plugins/designthemes-core-features-homi/shortcodes/css/animations.css')}}" type='text/css'  />
    <link rel='stylesheet'  href="{{ url('wp-content/plugins/designthemes-core-features-homi/shortcodes/css/slick.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/plugins/designthemes-core-features-homi/shortcodes/css/shortcodes.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/plugins/designthemes-core-features-homi/custom-post-types/css/portfolio.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/uploads/sites/12/smile_fonts/Defaults/Defaults.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/style.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/base.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/grid.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/widget.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/layout.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/blog.css')}}" type='text/css' />
    <link rel='stylesheet' href="{{ url('wp-content/themes/homi/css/contact.css')}}" type='text/css' />
    <link rel='stylesheet' href="{{ url('wp-content/themes/homi/css/custom-class.css')}}" type='text/css' />
    <link rel='stylesheet' href="{{ url('wp-content/themes/homi/css/browsers.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/plugins/js_composer/assets/css/js_composer.min.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/plugins/Ultimate_VC_Addons/assets/min-css/style.min.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/plugins/Ultimate_VC_Addons/assets/min-css/slick.min.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/plugins/Ultimate_VC_Addons/assets/css/icons.css')}}" type='text/css' />
    <link rel='stylesheet' href="{{ url('wp-content/plugins/Ultimate_VC_Addons/assets/min-css/animate.min.css')}}" type='text/css' />
    <link rel='stylesheet' href="{{ url('wp-content/plugins/Ultimate_VC_Addons/assets/min-css/content-box.min.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/plugins/Ultimate_VC_Addons/assets/min-css/modal.min.css')}}" type='text/css' />
    <link rel='stylesheet' href="{{ url('wp-content/plugins/js_composer/assets/lib/prettyphoto/css/prettyPhoto.min.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/font-awesome.min.css?')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/pe-icon-7-stroke.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/stroke-gap-icons-style.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/icon-moon.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/material-design-iconic-font.min.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/woocommerce/woocommerce-default.css')}}" type='text/css' />
    <link rel='stylesheet' href="{{ url('wp-content/themes/homi/css/woocommerce/type1-fashion.css')}}" type='text/css' />
    <link rel='stylesheet' href="{{ url('wp-content/themes/homi/css/woocommerce/type4-hosting.css')}}" type='text/css' />
    <link rel='stylesheet' href="{{ url('wp-content/themes/homi/css/woocommerce/type8-insurance.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/woocommerce/type10-medical.css')}}" type='text/css' />
    <link rel='stylesheet' href="{{ url('wp-content/themes/homi/css/woocommerce/type11-model.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/woocommerce/type12-attorney.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/woocommerce/type13-architecture.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/woocommerce/type14-fitness.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/woocommerce/type16-photography.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/woocommerce/type17-restaurant.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/woocommerce/type20-yoga.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/woocommerce/type21-styleshop.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/woocommerce.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/tribe-events/custom.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/css/custom.css')}}" type='text/css' />
    <link rel='stylesheet' href="{{ url('wp-content/themes/homi/css/cookieconsent.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/themes/homi/framework/js/magnific/magnific-popup.css')}}" type='text/css' />
    <link rel='stylesheet' href="{{ url('wp-content/themes/homi/css/gutenberg.css')}}" type='text/css'/>
    <link rel='stylesheet'  href="{{ url('wp-content/plugins/js_composer/assets/lib/bower/font-awesome/css/v4-shims.min.css')}}" type='text/css'/>
    <link rel='stylesheet' href="{{ url('wp-content/plugins/js_composer/assets/lib/bower/font-awesome/css/all.min.css')}}" type='text/css'  />
    <link rel='stylesheet'  href="{{ url('wp-content/plugins/Ultimate_VC_Addons/assets/min-css/background-style.min.css')}}" type='text/css' />
    <link rel='stylesheet'  href="{{ url('wp-content/plugins/revslider/public/assets/css/rs6.css')}}" type='text/css'  />
    <link rel='stylesheet' href="{{ url('wp-content/themes/homi/css/gutenberg.css')}}" type='text/css' />
    <link href="//fonts.googleapis.com/css?family=Lato:300%7CMontserrat:400" rel="stylesheet" property="stylesheet" media="all" type="text/css">
    <link rel='stylesheet' href="{{ url('css/streamline.css')}}" type='text/css' />
    <link rel='stylesheet' href="{{ url('css/bootstrap.min.css')}}" type='text/css' />
    <link rel='stylesheet' href="{{ url('css/custom.css')}}" type='text/css' />
    <script type='text/javascript' src="{{ url('js/jquery-3.5.1.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-includes/js/jquery/jquery-migrate.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('js/custom.js')}}" ></script>
    <script type='text/javascript' id='layerslider-utils-js-extra'></script>
    <script type='text/javascript' id='homi-jqplugins-js-extra'>
        var dttheme_urls = { 
                                "theme_base_url": "{{ url('/')}}\/wp-content\/themes\/homi", 
                                "loader": "{{ url('/')}}\/images", 
                                "framework_base_url": "{{ url('/')}}\/wp-content\/themes\/homi\/framework\/", 
                                "url": "{{ url('/')}}", 
                                "isRTL": "", 
                                "loadingbar": "disable", 
                                "advOptions": "Show Advanced Options", 
                                "wpnonce": "36c9b784a5" 
                            },
            LS_Meta = { "v": "6.11.8", "fixGSAP": "1" };
    </script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/LayerSlider/assets/static/layerslider/js/layerslider.utils.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/LayerSlider/assets/static/layerslider/js/layerslider.kreaturamedia.jquery.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/LayerSlider/assets/static/layerslider/js/layerslider.transitions.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/revslider/public/assets/js/rbtools.min.js?')}}" async></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/revslider/public/assets/js/rs6.min.js?')}}" async ></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/js_composer/assets/js/vendors/woocommerce-add-to-cart.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/Ultimate_VC_Addons/assets/min-js/ultimate-params.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/Ultimate_VC_Addons/assets/min-js/custom.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/Ultimate_VC_Addons/assets/min-js/slick.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/Ultimate_VC_Addons/assets/min-js/jquery-appear.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/Ultimate_VC_Addons/assets/min-js/slick-custom.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/Ultimate_VC_Addons/assets/min-js/modernizr-custom.min.js')}}"></script>
    <script type="text/javascript">
        function setREVStartSize(e)
        {
            //window.requestAnimationFrame(function() {              
            window.RSIW = window.RSIW === undefined ? window.innerWidth : window.RSIW;
            window.RSIH = window.RSIH === undefined ? window.innerHeight : window.RSIH;
            try {
                    var pw = document.getElementById(e.c).parentNode.offsetWidth,newh;
                    pw = pw === 0 || isNaN(pw) ? window.RSIW : pw;
                    e.tabw = e.tabw === undefined ? 0 : parseInt(e.tabw);
                    e.thumbw = e.thumbw === undefined ? 0 : parseInt(e.thumbw);
                    e.tabh = e.tabh === undefined ? 0 : parseInt(e.tabh);
                    e.thumbh = e.thumbh === undefined ? 0 : parseInt(e.thumbh);
                    e.tabhide = e.tabhide === undefined ? 0 : parseInt(e.tabhide);
                    e.thumbhide = e.thumbhide === undefined ? 0 : parseInt(e.thumbhide);
                    e.mh = e.mh === undefined || e.mh == "" || e.mh === "auto" ? 0 : parseInt(e.mh, 0);
                    if (e.layout === "fullscreen" || e.l === "fullscreen")
                        newh = Math.max(e.mh, window.RSIH);
                    else 
                    {
                        e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
                        for (var i in e.rl) if (e.gw[i] === undefined || e.gw[i] === 0) e.gw[i] = e.gw[i - 1];
                        e.gh = e.el === undefined || e.el === "" || (Array.isArray(e.el) && e.el.length == 0) ? e.gh : e.el;
                        e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
                        for (var i in e.rl) if (e.gh[i] === undefined || e.gh[i] === 0) e.gh[i] = e.gh[i - 1];

                        var nl = new Array(e.rl.length),ix = 0,sl;
                        e.tabw = e.tabhide >= pw ? 0 : e.tabw;
                        e.thumbw = e.thumbhide >= pw ? 0 : e.thumbw;
                        e.tabh = e.tabhide >= pw ? 0 : e.tabh;
                        e.thumbh = e.thumbhide >= pw ? 0 : e.thumbh;
                        for (var i in e.rl) nl[i] = e.rl[i] < window.RSIW ? 0 : e.rl[i];
                        sl = nl[0];
                        for (var i in nl) if (sl > nl[i] && nl[i] > 0) { sl = nl[i]; ix = i; }
                        var m = pw > (e.gw[ix] + e.tabw + e.thumbw) ? 1 : (pw - (e.tabw + e.thumbw)) / (e.gw[ix]);
                        newh = (e.gh[ix] * m) + (e.tabh + e.thumbh);
                    }
                    var el = document.getElementById(e.c);
                    if (el !== null && el) el.style.height = newh + "px";
                    el = document.getElementById(e.c + "_wrapper");
                    if (el !== null && el) el.style.height = newh + "px";
                } 
                catch (e) 
                {
                    console.log("Failure at Presize of Slider:" + e)
                }
        //});
    };</script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>

<body onload="load()" class="home page-template-default product-template-default single single-product page page-id-4 archive post-type-archive post-type-archive-product theme-homi woocommerce woocommerce-shop  woocommerce-cart woocommerce-checkout woocommerce-page  woocommerce-no-js layout-wide page-with-slider  layout-wide wpb-js-composer js-comp-ver-6.7.0  js-comp-ver-6.7.0 vc_responsive">

    <!-- preloader -->
     <div class="loader-placeholder" style="visibility:visible;">
        <div class="load-overlay">
            <div class="row">
                <div class="col-12">
                     <div class="loader-container">
                       <div class="overlay-loader">
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

    <!-- **Wrapper** -->
    <div class="main-display-window wrapper" style="visibility:hidden;">
        <!-- ** Inner Wrapper ** -->
        <div class="inner-wrapper">
            <!-- ** Header Wrapper ** -->
            <div id="header-wrapper">
                <!-- **Header** -->
                <header id="header" class="header-top-absolute">

                    <div class="container">
                        <div id="header-14500" class="dt-header-tpl header-14500">
                            <div class="vc_row wpb_row vc_row-fluid hide-with-slider">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="vc_row wpb_row vc_inner vc_row-fluid top-bar vc_custom_1528868641394">
                                                <div class="wpb_column vc_column_container vc_col-sm-6">
                                                    <div class="vc_column-inner vc_custom_1528868628140">
                                                        <div class="wpb_wrapper">
                                                            <div id="dt-1528866901077-ca741579-b467" class="dt-custom-nav-wrapper none" data-default-style="none" data-hover-style="none" data-default-decoration="none" data-hover-decoration="none" data-divider="yes">
                                                                <div class="menu-top-bar-container">
                                                                    <ul id="menu-top-bar" class="custom-sub-nav dt-custom-nav">
                                                                        <li id="menu-item-15293" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15293"><a href="tel:{{$site->phone ? $site->phone : env('SITE_PHONE1') }}" class="item-has-icon icon-position-left"><i class="menu-item-icon"></i>
                                                                            <span>Support {{$site->phone ? $site->phone : env('SITE_PHONE1') }}
                                                                            </span></a><span class="divider"></span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-6">
                                                    <div class="vc_column-inner vc_custom_1528868634178">
                                                        <div class="wpb_wrapper">
                                                            <div id="1528869452524-cba44c59-a1d0" class="dt-sc-empty-space"></div>
                                                            <ul id='dt-1528866528209-8bab47f4-d0d9' class='dt-sc-sociable small right' data-default-style='none' data-default-border-radius='no' data-default-shape='' data-hover-style='none' data-hover-border-radius='no'
                                                                data-hover-shape=''>
                                                                <li class="facebook"> 
                                                                    <a href="{{$site->facebook ? $site->facebook : env('FACEBOOK_LINK') }}" title="" target="_self">      <span class="dt-icon-default"> 
                                                                                <span></span>      
                                                                            </span>      <i></i>      <span class="dt-icon-hover"> <span></span> </span>  </a>
                                                                </li>
                                                                <li class="twitter">
                                                                <a href="{{$site->twitter ? $site->twitter : env('TWITTER_LINK') }}" title="" target="_self">      <span class="dt-icon-default"> <span></span> </span>      <i></i>      <span class="dt-icon-hover"> <span></span> </span>  </a></li>
                                                                <li class="youtube">
                                                                <a href="{{$site->youtube ? $site->youtube : env('YOUTUBE_LINK') }}" title="" target="_self">      <span class="dt-icon-default"> <span></span> </span>      <i></i>      <span class="dt-icon-hover"> <span></span> </span>  </a></li>
                                                                <li class="instagram">
                                                                <a href="{{$site->instagram ? $site->instagram : env('INSTAGRAM_LINK') }}" title="" target="_self">      <span class="dt-icon-default"> <span></span> </span>      <i></i>      <span class="dt-icon-hover"> <span></span> </span>  </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_row wpb_row vc_row-fluid dt-skin-secondary-bg dt-sc-dark-bg vc_row-o-equal-height vc_row-o-content-middle vc_row-flex">
                                <div class="dt-skin-primary-bg rs_col-sm-4 wpb_column vc_column_container vc_col-sm-2">
                                    <div class="vc_column-inner vc_custom_1557230970960" style=" text-align:left; ">
                                        <div class="wpb_wrapper">
                                            <div id="dt-1527077571653-6fe19314-253c" class="dt-logo-container logo-align-left"> 
                                                <a href="{{ url('/')}}" rel="home">
                                                    @if($site->favicon)
                                                    <img width="160" height="40" src="{{ url('images/loader.gif')}}" data-src="/logos/{{$site->favicon}}" alt="{{$site->site_name ? $site->site_name : env('SITE_NAME') }}" style="width:160px !important;height:40px !important;" />
                                                    @else
                                                    <img src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/themes/homi/images/light-logo.png')}}" alt="{{$site->site_name ? $site->site_name : env('SITE_NAME') }}"/>
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rs_col-sm-8 wpb_column vc_column_container vc_col-sm-10">
                                    <div class="vc_column-inner " style=" text-align:left; ">
                                        <div class="wpb_wrapper">
                                            <div data-menu="header-menu" id="dt-1527938937513-a464aa49-edec" class="dt-header-menu mega-menu-page-equal right" data-nav-item-divider="none" data-nav-item-highlight="top-border-only" data-nav-item-display="simple">
                                                <div class="menu-container">
                                                    <ul id="menu-header-menu" class="dt-primary-nav " data-menu="header-menu">
                                                        <li class="close-nav"></li>
                                                        <li id="menu-item-14827" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home  page_item page-item-4 @if($path=='home')current_page_item @endif menu-item-14827 dt-menu-item-14827 "><a href="{{ url('/')}}" class="item-has-icon icon-position-left"><span>Home </span></a></li>
                                                        <li id="menu-item-14828" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14828 dt-menu-item-14828 @if($path=='about')current_page_item @endif"><a href="{{ url('about') }}" class="item-has-icon icon-position-left"><span>About Us</span></a></li>
                                                        <li id="menu-item-14833" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14833 dt-menu-item-14833 @if($path=='brochure')current_page_item @endif"><a href="{{ url('/pages/brochure')}}" class="item-has-icon icon-position-left"><span>Brochure</span></a></li>
                                                        <li id="menu-item-15255" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-15255 dt-menu-item-15255 @if($path=='product')current_page_item @endif"><a href="/pages/products" class="item-has-icon icon-position-left"><span>Products</span></a>
                                                            <ul class="sub-menu is-hidden ">
                                                                @if(count($categories) > 0)
                                                                @foreach ($categories as $category)
                                                                <li class="go-back"><a href="javascript:void(0);"></a></li>
                                                                <li class="menu-item menu-item-type-custom menu-item-object-custom "><a href="/products/{{$category->category}}" class="item-has-icon icon-position-left"><span>{{$category->category}}</span></a></li>
                                                                @endforeach
                                                                @else
                                                                <li id="menu-item-15255" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15254 dt-menu-item-15255 "><a href="javascript:void(0);" class="item-has-icon icon-position-left"><span>No category found</span></a></li>
                                                                @endif
                                                            </ul>
                                                        </li>
                                                        <li id="menu-item-14829" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14829 dt-menu-item-14829 @if($path=='contact')current_page_item  @endif"><a href="{{ url('/contact')}}" class="item-has-icon icon-position-left"><span>Contact Us</span></a></li>
                                                    </ul>
                                                    <div class="sub-menu-overlay"></div>
                                                </div>
                                            </div>
                                            <div id="dt-1527938937513-a464aa49-edec-mobile" class="mobile-nav-container mobile-nav-offcanvas-right" data-menu="header-menu">
                                                <div class="menu-trigger menu-trigger-icon" data-menu="header-menu"><i class="fa fa-bars"></i><span>Menu</span> </div>
                                                <div class="mobile-menu" data-menu="header-menu"></div>
                                                <div class="overlay"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- **Header - End ** -->
                @yield('header')  
            </div>
            <!-- ** Header Wrapper - End ** -->
            <!-- **Main** -->
            <div id="main">
                @yield('content')   
            </div>
            <!-- ** Container End ** -->

        </div>
        <!-- **Main - End ** -->

        <!-- **Footer** -->
        <footer id="footer">
            <div class="container">
                <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1527927764743 vc_row-has-fill vc_row-o-equal-height vc_row-flex">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner vc_custom_1489734134146">
                            <div class="wpb_wrapper">
                                <div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1527927822541 vc_row-o-equal-height vc_row-flex">
                                    <div class="footer-custom-bg dt-sc-dark-bg wpb_column vc_column_container vc_col-sm-3">
                                        <div class="vc_column-inner ">
                                            <div class="wpb_wrapper">
                                                <div id="1527927971531-f3f9f4d1-ac80" class="dt-sc-empty-space"></div>
                                                <h2 style="color: #ffffff;text-align: center" class="vc_custom_heading">ABOUT</h2>
                                                <div class="wpb_text_column wpb_content_element ">
                                                    <div class="wpb_wrapper">
                                                        <p style="text-align: center;">{{$site->site_descreption ? $site->site_descreption : env('SITE_DESCRIPTION') }}</p>

                                                    </div>
                                                </div>
                                                <div id="1527927953227-dba6c1f0-5bd8" class="dt-sc-empty-space"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-1">
                                        <div class="vc_column-inner ">
                                            <div class="wpb_wrapper"></div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-2">
                                        <div class="vc_column-inner ">
                                            <div class="wpb_wrapper">
                                                <div id="1527927973130-73c9fa6f-ec00" class="dt-sc-empty-space"></div>
                                                <h3 style="text-align: left" class="vc_custom_heading footer-title">Company</h3>
                                                <div id="dt-1527925220140-a621f69d-2b25" class="dt-custom-nav-wrapper none" data-default-style="none" data-hover-style="none" data-link-icon-position="outside" data-link-icon-style="square" data-default-decoration="none"
                                                    data-hover-decoration="none" data-divider="yes">
                                                    <div class="menu-footer-link-i-container">
                                                        <ul id="menu-footer-link-i" class="custom-sub-nav dt-custom-nav">
                                                            <li id="menu-item-14183" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14183"><a href="/about" class="item-has-icon icon-position-left"><i class="menu-item-icon"></i><span>About</span></a><span class="divider"></span></li>
                                                            <li id="menu-item-14184" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14184"><a href="/site/products" class="item-has-icon icon-position-left"><i class="menu-item-icon"></i><span>Products</span></a><span class="divider"></span></li>
                                                            <li id="menu-item-14185" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14185"><a href="/" class="item-has-icon icon-position-left"><i class="menu-item-icon"></i><span>Home</span></a><span class="divider"></span></li>
                                                            <li id="menu-item-14944" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14944"><a href="{{ url('/contact')}}" class="item-has-icon icon-position-left"><i class="menu-item-icon"></i><span>Contact Us</span></a><span class="divider"></span></li> 
                                                            <li id="menu-item-14944" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14944"><a href="{{ url('/privacy/policy')}}" class="item-has-icon icon-position-left"><i class="menu-item-icon"></i><span>Privacy Policy </span></a><span class="divider"></span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-3">
                                        <div class="vc_column-inner ">
                                            <div class="wpb_wrapper">
                                                <div id="1527927942519-b6106bfa-880e" class="dt-sc-empty-space"></div>
                                                <h3 style="text-align: left" class="vc_custom_heading footer-title">Contact</h3>
                                                <div class='dt-sc-contact-info type1 '><span class='pe-icon pe-call'> </span><strong>Toll Free:</strong> 1224 2234 LAW</div>
                                                <div class="vc_empty_space" style="height: 10px"><span class="vc_empty_space_inner"></span></div>
                                                <div class='dt-sc-contact-info type1 '><span class='pe-icon pe-mail'> </span><a title="Mail us today" href="mailto:{{$site->email ? $site->email : env('SITE_EMAIL') }}"> {{$site->email ? $site->email : env('SITE_EMAIL') }} </a></div>
                                                <div class="vc_empty_space" style="height: 10px"><span class="vc_empty_space_inner"></span></div>
                                                <div class='dt-sc-contact-info type1 '><span class='pe-icon pe-map-marker'> </span>{{$site->site_address ? $site->site_address : env('SITE_ADDRESS') }}, <br> {{$site->site_location ? $site->site_location : env('SITE_LOCATION') }}</div>
                                                <div id="1557229618310-82514f87-3b33" class="dt-sc-empty-space"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vc_row-full-width vc_clearfix"></div>

                <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid dt-sc-dark-bg footer-34 vc_custom_1527940655187 vc_row-has-fill">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <div id="1556954403212-08a7ab7a-63bc" class="dt-sc-empty-space"></div>
                            </div>
                        </div>
                    </div>
                    <div class="rs_col-sm-5 wpb_column vc_column_container vc_col-sm-6">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <p style="font-size: 13px;color: #ffffff;text-align: left" class="vc_custom_heading uppercase rs_aligncenter">© <?php echo date('Y'); ?>. All Rights Reserved.Designed and coded by <a href="{{Config::get('constants.designer_link')}}" target="_blank">{{Config::get('constants.designer_name')}}.</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="alignright rs_col-sm-7 wpb_column vc_column_container vc_col-sm-6">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <div id="dt-1520591573539-6b39821d-3e99" class="dt-custom-nav-wrapper none inline-horizontal" data-default-style="none" data-hover-style="none" data-default-decoration="none" data-hover-decoration="none">
                                    <div class="menu-footer-link-i-container">
                                        <ul id="menu-footer-link-i-1" class="custom-sub-nav dt-custom-nav">
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14185"><a href="#" class="item-has-icon icon-position-left"><i class="menu-item-icon"></i><span>Careers</span></a></li>
                                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14944"><a href="{{ url('/contact') }}" class="item-has-icon icon-position-left"><i class="menu-item-icon"></i><span>Contact Us</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wpb_column vc_column_container vc_col-sm-12 vc_hidden-xs">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <div id="1556954415589-4e08917b-16a6" class="dt-sc-empty-space"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vc_row-full-width vc_clearfix"></div>
            </div>
        </footer>
        <!-- **Footer - End** -->


    </div>
    <!-- **Inner Wrapper - End** -->

    </div>
    <!-- **Wrapper - End** -->

    <div class="dt-cookie-consent cookiebar-hidden dt-cookiemessage-bottom">
        <div class="container">
            <p class="dt_cookie_text">This site uses cookies. By continuing to browse the site, you are agreeing to our use of cookies.</p><a href='#' class='dt-sc-button filled small dt-cookie-consent-button dt-cookie-consent-button-1  dt-cookie-close-bar ' data-contents='a6fe7a635a3ae90b600d28d9abace894'>Close</a>
            <a
                href='/privacy/policy' class='dt-sc-button filled small dt-cookie-consent-button dt-cookie-consent-button-2 dt-extra-cookie-btn'>Click Here</a><a href='#dt-consent-extra-info' class='dt-sc-button filled small dt-cookie-consent-button dt-cookie-consent-button-3 dt-extra-cookie-btn dt-cookie-info-btn '>Model</a> </div>
    </div>
    <div id='dt-consent-extra-info' class='dt-inline-modal main_color zoom-anim-dialog mfp-hide'>

        <h4>Cookie and Privacy Settings</h4>

        <div class='dt-sc-hr-invisible-xsmall '> </div>

        <div class='dt-sc-tabs-vertical-container ' data-effect='fade'>
            <ul class='dt-sc-tabs-vertical'>
                <li><a href="javascript:void(0);">Privacy Policy</a></li>
            </ul>
            <div class='dt-sc-tabs-vertical-content'>You can read about our cookies and privacy settings in detail on our Privacy Policy Page. <br><br> <a href='/privacy/policy'>Privacy Policy</a></div>
        </div>
    </div>
     <!-- Small Modal -->
    <div class="modal fade small-model bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
    <script type='text/javascript' src="{{ url('js/jquery-3.5.1.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/Ultimate_VC_Addons/assets/min-js/modal-all.min.js')}}" ></script>
    <script type='text/javascript' src="{{ url('wp-includes/js/dist/vendor/regenerator-runtime.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-includes/js/dist/vendor/wp-polyfill.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/contact-form-7/includes/js/index.js')}}" ></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/woocommerce/assets/js/zoom/jquery.zoom.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/js_composer/assets/lib/flexslider/jquery.flexslider.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/woocommerce/assets/js/photoswipe/photoswipe.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/woocommerce/assets/js/photoswipe/photoswipe-ui-default.min.js')}}"></script>
    <script type='text/javascript' id='wc-single-product-js-extra'>
         var wc_single_product_params = {"i18n_required_rating_text":"Please select a rating","review_rating_required":"yes","flexslider":{"rtl":false,"animation":"slide","smoothHeight":true,"directionNav":false,"controlNav":"thumbnails","slideshow":false,"animationSpeed":500,"animationLoop":false,"allowOneSlide":false},"zoom_enabled":"1","zoom_options":[],"photoswipe_enabled":"1","photoswipe_options":{"shareEl":false,"closeOnScroll":false,"history":false,"hideAnimationDuration":0,"showAnimationDuration":0},"flexslider_enabled":"1"};
    </script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/woocommerce/assets/js/frontend/single-product.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js')}}" ></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/designthemes-core-features-homi/shortcodes/js/jquery.tabs.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/designthemes-core-features-homi/shortcodes/js/jquery.tipTip.minified.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/designthemes-core-features-homi/shortcodes/js/jquery.inview.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/designthemes-core-features-homi/shortcodes/js/jquery.animateNumber.min.js')}}" ></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/designthemes-core-features-homi/shortcodes/js/jquery.donutchart.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/designthemes-core-features-homi/shortcodes/js/slick.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/designthemes-core-features-homi/shortcodes/js/shortcodes.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/designthemes-core-features-homi/custom-post-types/js/protfolio-custom.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/themes/homi/framework/js/jquery.ui.totop.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/themes/homi/framework/js/jquery.plugins.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/themes/homi/framework/js/jquery.visualNav.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/themes/homi/framework/js/ResizeSensor.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/themes/homi/framework/js/theia-sticky-sidebar.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/js_composer/assets/lib/bower/isotope/dist/isotope.pkgd.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/themes/homi/framework/js/cookieconsent.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/themes/homi/framework/js/magnific/jquery.magnific-popup.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/themes/homi/framework/js/custom.js')}}" ></script>
    <script type='text/javascript' src="{{ url('wp-content/themes/homi/framework/js/jquery.cookie.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/themes/homi/framework/js/controlpanel.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/Ultimate_VC_Addons/assets/min-js/content-box.min.js')}}" ></script>
    <script type='text/javascript' src="{{ url('wp-includes/js/wp-embed.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/js_composer/assets/js/dist/js_composer_front.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/Ultimate_VC_Addons/assets/min-js/ultimate_bg.min.js')}}"></script>
    <script type='text/javascript' src="{{ url('wp-content/plugins/Ultimate_VC_Addons/assets/min-js/vhparallax.min.js')}}" ></script>
    <script type='text/javascript' src="{{ url('js/streamline.js')}}" ></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly"defer
    ></script>
    <script type="text/javascript">
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    </script>
    <script>
        /* Initialize and add the map */
        function initMap() 
        {
          /* The location of Uluru*/
          const uluru = { lat: -25.344, lng: 131.031 };
          const map = new google.maps.Map(document.getElementById("map"), 
          {
            zoom: 4,
            center: uluru,
          });

          /* Set The position marker*/
          const marker = new google.maps.Marker(
          {
            position: uluru,
            map: map,
          });
        }
        window.initMap = initMap;
    </script>
</body>
</html>