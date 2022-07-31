
<!DOCType html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">
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
    <meta property="og:title" content="{{$site->site_name ? $site->site_name : env('SITE_NAME') }} | @yield('title')">
    <meta property="og:locale" content="en_US">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta property="og:description" content="{{$site->site_descreption ? $site->site_descreption : env('SITE_DESCRIPTION') }}">
    <meta property="og:image" content="/logos/{{$site->favicon}}">
    <meta name="apple-mobile-web-app-title" content="{{$site->site_name ? $site->site_name : env('SITE_NAME') }}">
    <meta name="application-name" content="{{$site->site_name ? $site->site_name : env('SITE_NAME') }}">
    <meta name="msapplication-TileColor" content="{{$site->theme_color ? $site->theme_color : env('THEME_COLOR') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" href="/logos/{{$site->favicon}}" type="image/x-icon">
    <link rel="mask-icon" href="{{ url ('images/logos/safari-pinned-tab.svg')}}" color="#666666">
    <link rel="stylesheet" href="{{ url ('plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ url ('css/font-awesome.min.css')}}">
    <link href="//fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url ('css/animate.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{ url ('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url ('panel/assets/css/custom.css')}}"> 
    <link href="//fonts.googleapis.com/css?family=Muli:300,300i,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="{{ url ('panel/assets/css/vendors.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ url ('panel/assets/css/style.css')}}" />
    <style>
        #id_phone_0
        {
            width: 30%;
            float:left;
        }
        #id_phone_1
        {
            width:68%;
            float:right;
        }
        .top-bar .navbar .navbar-header .logo-desktop 
        {
            width: 50px;
            height: auto;
            visibility: visible;
            opacity: 1;
            position: relative;
            z-index: 0;
            transition: all ease-in-out .2s;
        }
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
                  <img src="{{ url ('panel/assets/img/loader/loader.svg')}}" alt="{{$site->site_name ? $site->site_name : env('SITE_NAME') }} loader">
              </div>
          </div>
      </div>
      <!-- end pre-loader -->
      <!-- begin app-header -->
      <header class="app-header top-bar">
        <!-- begin navbar -->
        <nav class="navbar navbar-expand-md">

            <!-- begin navbar-header -->
            <div class="navbar-header d-flex align-items-center">
                <a href="javascript:void:(0)" class="mobile-toggle"><i class="ti ti-align-right"></i></a>
                <a class="navbar-brand" href="{{ url('/management/dashboard') }}">
                    <img width="30" src="{{ url ('images/loader.gif')}}" data-src="/logos/{{$site->favicon}}" class="img-fluid logo-desktop" alt="{{$site->site_name ? $site->site_name : env('SITE_NAME') }} logo" /> {{$site->site_name ? $site->site_name : env('SITE_NAME') }}
                    <img width="30" src="{{ url ('images/icon/loader.gif')}}" data-src="{{ url ('images/logos/favicon.ico')}}" class="img-fluid logo-mobile" alt="{{$site->site_name ? $site->site_name : env('SITE_NAME') }} logo" />
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti ti-align-left"></i>
            </button>
            <!-- end navbar-header -->
            <!-- begin navigation -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navigation d-flex">
                    <ul class="navbar-nav nav-left">
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link sidebar-toggle">
                                <i class="ti ti-align-right"></i>
                            </a>
                        </li>
                        <li class="nav-item full-screen d-none d-lg-block" id="btnFullscreen">
                            <a href="javascript:void(0)" class="nav-link expand">
                                <i class="icon-size-fullscreen"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav nav-right ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti ti-email"></i>
                            </a>
                            <div class="dropdown-menu extended animated fadeIn" aria-labelledby="navbarDropdown">
                                <ul>
                                    <li class="dropdown-header bg-gradient p-4 text-white text-left">Messages
                                        <label class="label label-info label-round">6</label>
                                        <a href="#" class="float-right btn btn-square btn-inverse-light btn-xs m-0">
                                            <span class="font-13"> Mark all as read</span></a>
                                    </li>
                                    <li class="dropdown-body">
                                        <ul class="scrollbar scroll_dark max-h-240">
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <div class="notification d-flex flex-row align-items-center">
                                                        <div class="notify-icon bg-img align-self-center">
                                                            <img class="img-fluid" src="{{ url ('images/icon/loader.gif')}}" data-src="{{ url ('panel/assets/img/avtar/03.jpg')}}" alt="user3">
                                                        </div>
                                                        <div class="notify-message">
                                                            <p class="font-weight-bold">Brianing Leyon</p>
                                                            <small>You will sail along until you...</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <div class="notification d-flex flex-row align-items-center">
                                                        <div class="notify-icon bg-img align-self-center">
                                                            <img class="img-fluid" src="{{ url ('images/icon/loader.gif')}}" data-src="{{ url ('panel/assets/img/avtar/01.jpg')}}" alt="user">
                                                        </div>
                                                        <div class="notify-message">
                                                            <p class="font-weight-bold">Jimmyimg Leyon</p>
                                                            <small>Okay</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <div class="notification d-flex flex-row align-items-center">
                                                        <div class="notify-icon bg-img align-self-center">
                                                            <img class="img-fluid" src="{{ url ('images/icon/loader.gif')}}" data-src="{{ url ('panel/assets/img/avtar/02.jpg')}}" alt="user2">
                                                        </div>
                                                        <div class="notify-message">
                                                            <p class="font-weight-bold">Brainjon Leyon</p>
                                                            <small>So, make the decision...</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <div class="notification d-flex flex-row align-items-center">
                                                        <div class="notify-icon bg-img align-self-center">
                                                            <img class="img-fluid" src="{{ url ('images/icon/loader.gif')}}" data-src="{{ url ('panel/assets/img/avtar/04.jpg')}}" alt="user4">
                                                        </div>
                                                        <div class="notify-message">
                                                            <p class="font-weight-bold">Smithmin Leyon</p>
                                                            <small>Thanks</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <div class="notification d-flex flex-row align-items-center">
                                                        <div class="notify-icon bg-img align-self-center">
                                                            <img class="img-fluid" src="{{ url ('images/icon/loader.gif')}}" data-src="{{ url ('panel/assets/img/avtar/05.jpg')}}" alt="user5">
                                                        </div>
                                                        <div class="notify-message">
                                                            <p class="font-weight-bold">Jennyns Leyon</p>
                                                            <small>How are you</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <div class="notification d-flex flex-row align-items-center">
                                                        <div class="notify-icon bg-img align-self-center">
                                                            <img class="img-fluid" src="{{ url ('images/icon/loader.gif')}}" data-src="{{ url ('panel/assets/img/avtar/06.jpg')}}" alt="user6">
                                                        </div>
                                                        <div class="notify-message">
                                                            <p class="font-weight-bold">Demian Leyon</p>
                                                            <small>I like your themes</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-footer">
                                        <a class="font-13" href="javascript:void(0)"> View All messages </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fe fe-bell"></i>
                                <span class="notify">
                                            <span class="blink"></span>
                                <span class="dot"></span>
                                </span>
                            </a>
                            <div class="dropdown-menu extended animated fadeIn" aria-labelledby="navbarDropdown">
                                <ul>
                                    <li class="dropdown-header bg-gradient p-4 text-white text-left">Notifications
                                        <a href="#" class="float-right btn btn-square btn-inverse-light btn-xs m-0">
                                            <span class="font-13"> Clear all</span></a>
                                    </li>
                                    <li class="dropdown-body min-h-240 nicescroll">
                                        <ul class="scrollbar scroll_dark max-h-240">
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <div class="notification d-flex flex-row align-items-center">
                                                        <div class="notify-icon bg-img align-self-center">
                                                            <div class="bg-type bg-type-md">
                                                                <span>HY</span>
                                                            </div>
                                                        </div>
                                                        <div class="notify-message">
                                                            <p class="font-weight-bold">New registered user</p>
                                                            <small>Just now</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <div class="notification d-flex flex-row align-items-center">
                                                        <div class="notify-icon bg-img align-self-center">
                                                            <div class="bg-type bg-type-md bg-success">
                                                                <span>GM</span>
                                                            </div>
                                                        </div>
                                                        <div class="notify-message">
                                                            <p class="font-weight-bold">New invoice received</p>
                                                            <small>22 min</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <div class="notification d-flex flex-row align-items-center">
                                                        <div class="notify-icon bg-img align-self-center">
                                                            <div class="bg-type bg-type-md bg-danger">
                                                                <span>FR</span>
                                                            </div>
                                                        </div>
                                                        <div class="notify-message">
                                                            <p class="font-weight-bold">Server error report</p>
                                                            <small>7 min</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <div class="notification d-flex flex-row align-items-center">
                                                        <div class="notify-icon bg-img align-self-center">
                                                            <div class="bg-type bg-type-md bg-info">
                                                                <span>HT</span>
                                                            </div>
                                                        </div>
                                                        <div class="notify-message">
                                                            <p class="font-weight-bold">Database report</p>
                                                            <small>1 day</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                    <div class="notification d-flex flex-row align-items-center">
                                                        <div class="notify-icon bg-img align-self-center">
                                                            <div class="bg-type bg-type-md">
                                                                <span>DE</span>
                                                            </div>
                                                        </div>
                                                        <div class="notify-message">
                                                            <p class="font-weight-bold">Order confirmation</p>
                                                            <small>2 day</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-footer">
                                        <a class="font-13" href="javascript:void(0)"> View All Notifications
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link search" href="javascript:void(0)">
                                <i class="ti ti-search"></i>
                            </a>
                            <div class="search-wrapper">
                                <div class="close-btn">
                                    <i class="ti ti-close"></i>
                                </div>
                                <div class="search-content">
                                    <form>
                                        <div class="form-group">
                                            <i class="ti ti-search magnifier"></i>
                                            <input type="text" class="form-control autocomplete" placeholder="Search Here" id="autocomplete-ajax" autofocus="autofocus">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown user-profile">
                            <a href="javascript:void(0)" class="nav-link dropdown-toggle " id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="user-imager" src="/profiles/{{Auth::user()->profile}}" alt="avtar-img">
                                <span class="bg-success user-status"></span>
                            </a>
                            <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
                                <div class="bg-gradient px-4 py-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="mr-1">
                                            <h4 class="text-white mb-0">{{Auth::user()->name}}</h4>
                                            <small class="text-white">{{Auth::user()->email}}</small>
                                        </div>
                                        <a href="{{ url('logout')}}" class="text-white font-20 tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout"> <i
                                                        class="zmdi zmdi-power"></i></a>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <a class="dropdown-item d-flex nav-link" href="{{ url('/management')}}/{{Auth::user()->username}}">
                                        <i class="fa fa-user pr-2 text-success"></i> Profile</a>
                                    <a class="dropdown-item d-flex nav-link" href="/management/site/settings">
                                        <i class="ti ti-settings pr-2 text-info"></i> Settings
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end navigation -->
        </nav>
        <!-- end navbar -->
    </header>
    <!-- end app-header -->

    <!-- begin app-container -->
    <div class="app-container">
        <!-- begin app-nabar -->
        <aside class="app-navbar">
            <!-- begin sidebar-nav -->
            <div class="sidebar-nav scrollbar scroll_light">
                <ul class="metismenu " id="sidebarNav">
                    <li class="nav-static-title">Personal</li>
                    <li class="active">
                        <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <i class="nav-icon ti ti-rocket"></i>
                            <span class="nav-title">Home</span>
                            <span class="nav-label label label-info">2</span>
                        </a>
                        <ul aria-expanded="false">
                            <li class="active"> <a href="{{ url('management/dashboard') }}">Dashboard</a> </li>
                            <li> <a href="/management/site/settings">Site Settings</a> </li>
                        </ul>
                    </li>
                    <li><a href="/admins" aria-expanded="false"><i class="nav-icon ti ti-shield"></i><span class="nav-title">Admins </span></a> </li>
                    <li><a href="/employees" aria-expanded="false"><i class="nav-icon ti ti-user"></i><span class="nav-title">Employees </span></a> </li>
                    <li><a href="/categories" aria-expanded="false"><i class="nav-icon ti ti-shopping-cart"></i><span class="nav-title">Product categories </span></a> </li>
                    <li><a href="#" aria-expanded="false"><i class="nav-icon ti ti-email"></i><span class="nav-title">Add products </span></a> </li>
                    <li>
                        <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <i class="nav-icon dripicons dripicons-archive"></i>
                            <span class="nav-title">Contacts</span>
                            <span class="nav-label label label-info">{{number_format($unread)}}</span>
                        </a>
                        <ul aria-expanded="false">
                            <li class="active"> <a href="{{ url('/messages')}}">View customer  messages</a> </li>
                        </ul>
                    </li>
                    <li class="sidebar-banner p-4 bg-gradient text-center m-3 d-block rounded">
                        <h3 class="text-white mb-1"><?php echo date('l'); ?></h3>
                        <h4 class="text-white mb-1"><i class="dripicons dripicons-clock"></i>
                            <script>
                                var time=new Date(),
                                output=time.toLocaleString('en-US',{hour:'numeric',minute:'numeric',hour12:true,timeZone:'Asia/Kolkata'});
                                document.write(output);
                            </script>
                        </h4>
                        <h4 class="text-white mb-1"><?php echo date('Y-m-d'); ?></h4>
                        <a class="btn btn-square btn-inverse-success btn-xs d-inline-block mt-2 mb-0" href="{{ url('/management')}}/{{Auth::user()->username}}"><i class="dripicons dripicons-brush"></i> Edit Profile</a>
                    </li>
                </ul>
            </div>
            <!-- end sidebar-nav -->
        </aside>
        <!-- end app-navbar -->
        <div class="app-main" id="main">
           @yield('content')
        </div>
    </div>
        <!-- begin footer -->
        <footer class="footer">
            <div class="row">
                <div class="col-12 col-sm-6 text-center text-sm-left">
                    <p>&copy; Copyright <?php echo date('Y'); ?>. {{$site->site_name ? $site->site_name : env('SITE_NAME') }}.All rights reserved.</p>
                </div>
                <div class="col  col-sm-6 ml-sm-auto text-center text-sm-right">
                    <p><a target="_blank" href="{{Config::get('constants.designer_link')}}">{{Config::get('constants.designer_name')}}</a></p>
                </div>
            </div>
        </footer>
        <!-- end footer -->


        <div class="modal fade small-model bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">Success</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        user added successfully
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade large-model bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title text-center" id="mySmallModalLabel">Success</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        user added successfully
                    </div>
                </div>
            </div>
        </div>

        <!-- delete Modal -->
         <div class="modal fade delete-model bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="mySmallModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                   
                </div>
            </div>
            </div>
        </div>
      </div>
    </div>

    <script src="{{ url ('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ url ('panel/assets/js/vendors.js')}}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="{{ url ('panel/assets/js/app.js')}}"></script> 
    <script src="{{ url ('panel/assets/js/custom.js')}}"></script> 
    <script type="text/javascript">
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    </script>
    <script type="text/javascript">
        $(function()
        {

            var start = moment().subtract(29, 'days'),
            end = moment();

            function cb(start, end)
            {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('input[name="datefilter"]').daterangepicker(
            {
                autoUpdateInput: false,
                locale: 
                {
                    cancelLabel: 'Clear'
                },
                startDate: start,
                endDate: end,
                ranges: {
                   'Today': [moment(), moment()],
                   'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                   'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                   'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                   'This Month': [moment().startOf('month'), moment().endOf('month')],
                   'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);
            cb(start, end);
        

            $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker)
            {
                 $(this).val(picker.startDate.format('YYYY-MM-DD') +'to'+ picker.endDate.format('YYYY-MM-DD'));
            });

            $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker)
            {
              $(this).val('');
            });
        });
    </script>
  </body>
  </html>