@extends('layouts.app')
@section('title') Sign in @endsection
@section('content')
<!--start login contant-->
 <div class="app-contant">
    <div class="bg-white">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                    <div class="d-flex align-items-center h-100-vh">
                        <div class="login p-50">
                            <h1 class="mb-2 text-center text-capitalize">{{$site->site_name ? $site->site_name : env('SITE_NAME') }}</h1>
                            <p class="text-center">Welcome back, please login to your account.</p>
                            <form action="" class="mt-3 mt-sm-5 loginForm" method="post" novalidate>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="control-label">Email Address*</label>
                                            <input type="text" class="form-control" name="email" placeholder="Email Address" />
                                            <div class="feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="control-label">Password*</label>
                                            <input type="password" class="form-control" name="password" placeholder="Password" />
                                            <div class="feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-block d-sm-flex  align-items-center">
                                            <div class="form-check">
                                                <input name="remember_me" class="form-check-input" type="checkbox" id="gridCheck">
                                                <label class="form-check-label" for="gridCheck">
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>
                                        <div class="text-md-left text-center">
                                                <a href="{% url 'reset_password')}}" class="ml-auto">Forgot Password ?</a>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3 text-center">
                                        <button class="btn btn-primary text-uppercase">
                                            <span></span>
                                            <span>Sign in</span>
                                        </button>
                                    </div>
                                    <div class="col-12  mt-3 text-center">
                                        <p>&copy; <?php echo date('Y'); ?> Designed and coded by <a href="{{Config::get('constants.designer_link')}}" target="_blank">{{Config::get('constants.designer_name')}}</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2 text-center">
                    <div class="row align-items-center h-100">
                        <div class="col-7 mx-auto ">
                            <img class="img-fluid" src="{{ url('panel/assets/img/bg/login.svg')}}" alt="Login svg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection