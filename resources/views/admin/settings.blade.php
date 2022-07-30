@extends('admin.base')
@section('title') Site  Settings @endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Site Settings</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a  href="{{ url('management/dashboard') }}"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ url('management/dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Site Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end page title -->
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card card-statistics">
                <div class="card-header">
                    <div class="card-heading">
                        <h4 class="card-title">Site Details</h4>
                    </div>
                </div>
                <div class="card-body"> 
                    <form class="SubmitForm" method="post" action="" novalidate>
                        <div class="form-group">
                            <label for="id_site_name">Site Name</label>
                            <input type="text" name="name" class="form-control" value="{{$site->site_name}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="selects-contant-boots">
                            <div class="form-group bs-select-1">               
                                <label for="id_key_words">Site Key Words</label>
                                <input data-role="tagsinput" type="text" name="keywords" class="bs-input form-control" value="{{$site->site_keywords}}">
                                <div class="feedback"></div>
                            </div>
                        </div>
                        <div class="form-group">               
                            <label for="id_site_url">Site URL</label>
                           <input type="url" name="site_url" class="form-control" value="{{$site->site_url}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">               
                            <label for="id_theme_color">Site Theme Color</label>
                            <input type="text" name="theme_color" class="form-control" value="{{$site->theme_color}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">               
                            <label for="id_theme_color">Favicon</label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="favicon" class="custom-file-input" id="customFileInput">
                                <label for="customFileInput" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="id_description">Description</label>
                            <textarea name="site_descreption" id="id_site_descreption" class="form-control" cols="30" rows="10" value="{{$site->site_descreption}}">{{$site->site_descreption}}</textarea>
                            <div class="feedback"></div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                <span></span><span>submit</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card card-statistics">
                <div class="card-header">
                    <div class="card-heading">
                        <h4 class="card-title">Contact information</h4>
                    </div>
                </div>
                <div class="card-body"> 
                    <form class="SubmitForm" method="post" action="/management/contactinfo" novalidate>
                        <div class="form-group">
                            <label for="id_site_name">Site Email Address</label>
                             <input type="Email" name="email" class="form-control" value="{{$site->email}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="selects-contant-boots">
                            <div class="form-group bs-select-1">               
                                <label for="id_key_words">Additional Site Email Address</label>
                                <input type="text" name="email_two" class="form-control" value="{{$site->email_two}}">
                                <div class="feedback"></div>
                            </div>
                        </div>
                        <div class="form-group">               
                            <label for="id_location">Site location</label>
                           <input type="text" name="location" class="form-control" value="{{$site->site_location}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">               
                            <label for="id_address">Site Address</label>
                            <input type="text" name="site_address" class="form-control" value="{{$site->site_address}}">
                            <div class="feedback"></div>
                        </div>

                        <label for="id_phone">Site Phone</label>
                        <div class="form-group">               
                            <input type="tel" name="phone" class="form-control" value="{{$site->phone}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="text-center" style="margin-top:67px">
                            <button type="submit" class="btn btn-primary">
                                <span></span><span>submit</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card card-statistics">
                <div class="card-header">
                    <div class="card-heading">
                        <h4 class="card-title">Working Days And Hours</h4>
                    </div>
                </div>
                <div class="card-body"> 
                    <form class="SubmitForm" method="post" action="{{ url('working/days') }}" novalidate>
                        <div class="form-group">
                            <label for="id_working_days">Site Working Days</label>
                            <input type="text" name="working_days" class="form-control" value="{{$site->working_days}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">               
                            <label for="id_working_hours">Site Working Hours</label>
                           <input type="text" name="working_hours" class="form-control" value="{{$site->working_hours}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                <span></span><span>submit</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card card-statistics">
                <div class="card-header">
                    <div class="card-heading">
                        <h4 class="card-title">Site Social Links</h4>
                    </div>
                </div>
                <div class="card-body"> 
                    <form class="SubmitForm" method="post" action="{{ url('social/links') }}" novalidate>
                        <div class="form-group">
                            <label for="id_facebook">Facebook</label>
                            <input type="url" name="facebook" class="form-control" value="{{$site->facebook}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">               
                            <label for="id_twitter">Twitter</label>
                            <input type="url" name="twitter" class="form-control" value="{{$site->twitter}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">               
                            <label for="id_instagram">Instagram</label>
                            <input type="url" name="instagram" class="form-control" value="{{$site->instagram}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">               
                            <label for="id_linkedin">Linkedin</label>
                             <input type="url" name="linkedin" class="form-control" value="{{$site->linkedin}}">
                            <div class="feedback"></div>
                        </div>
                         <div class="form-group">               
                            <label for="id_whatsapp">Whatsapp</label>
                             <input type="url" name="whatsapp" class="form-control" value="{{$site->whatsapp}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">               
                            <label for="id_youtube">Youtube</label>
                            <input type="url" name="youtube" class="form-control" value="{{$site->youtube}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                <span></span><span>submit</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection