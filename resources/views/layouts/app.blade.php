<!DOCType html>
<html lang="en" class="no-js">
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
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta property="og:title" content="{{$site->site_name ? $site->site_name : env('SITE_NAME') }} |  @yield('title')">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:description" content="{{$site->site_descreption ? $site->site_descreption : env('SITE_DESCRIPTION') }}">
    <meta property="og:image" content="{{ url('images/icon/favicon.ico')}}">
    <meta name="apple-mobile-web-app-title" content="{{$site->site_name ? $site->site_name : env('SITE_NAME') }}">
    <meta name="application-name" content="{{$site->site_name ? $site->site_name : env('SITE_NAME') }}">
    <meta name="msapplication-TileColor" content="{{$site->theme_color ? $site->theme_color : env('THEME_COLOR') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" href="{{ url('images/icon/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ url('plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ url('css/font-awesome.min.css')}}">
    <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('css/animate.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('panel/assets/css/custom.css')}}"> 
    <link href="//fonts.googleapis.com/css?family=Muli:300,300i,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('panel/assets/css/vendors.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ url('panel/assets/css/style.css')}}" />
    <style>
      
    </style>
  </head>
  <body class="bg-white">
    <!-- begin app -->
    <div class="app">
      <!-- begin app-wrap -->
      <div class="app-wrap">
        <!-- begin pre-loader -->
        <div class="loader">
          <div class="h-100 d-flex justify-content-center">
              <div class="align-self-center">
                  <img src="{{ url('panel/assets/img/loader/loader.svg')}}" alt="{{$site->site_name ? $site->site_name : env('SITE_NAME') }} loader">
              </div>
          </div>
      </div>
      <!-- end pre-loader -->
      @yield('content')
      </div>
    </div>
     <!-- Small Modal -->
     <div class="modal fade small-model bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title text-light" id="mySmallModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body"></div>
      </div>
      </div>
  </div>
    <script src="{{ url('panel/assets/js/vendors.js')}}"></script>
    <script src="{{ url('panel/assets/js/app.js')}}"></script> 
    <script src="{{ url('panel/assets/js/custom.js')}}"></script> 
    <script type="text/javascript">
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    </script>
  </body>
  </html>