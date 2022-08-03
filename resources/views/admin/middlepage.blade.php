@extends('admin.base')
@section('title') {{$title}} @endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>{{$title}}</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a  href="/management/dashboard"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="/management/dashboard">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="/home/settings">View Home settings</a>
                            </li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">{{$title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end page title -->
        </div>
    </div>
    <div class="row">

        <div class="col-xl-6 mx-auto">
            <div class="card card-statistics">
                <div class="card-header">
                    <div class="card-heading">
                        <h4 class="card-title">{{$title}}</h4>
                    </div>
                </div>
                <div class="card-body"> 
                    <form class="SubmitForm" method="post" action="{{isset($home)? '/edit/setting/'.$home->id:''}}" enctype="multipart/form-data" novalidate>
                        <div class="form-group">
                            <label for="id_category">Item name(name of your choice)</label>
                            <input type="text" id="id_category" class="form-control" name="item_name" value="{{isset($home->item_name) ? $home->item_name :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">               
                            <label for="id_theme_color">Image (image_420x420)</label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="image_420x420" class="custom-file-input" id="customFileInput11">
                                <label for="customFileInput1" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">
                            <label for="id_category">Image  text </label>
                            <input type="text" id="id_category" class="form-control" name="item_name" value="{{isset($home->item_name) ? $home->item_name :''}}">
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
        <div class="col-xl-6 mx-auto">
            <div class="card card-statistics">
                <div class="card-header">
                    <div class="card-heading">
                        <h4 class="card-title">Home Page Slider Banner Details</h4>
                    </div>
                </div>
                <div class="card-body"> 
                    <form class="SubmitForm" method="post" action="{{isset($home)? '/edit/setting/'.$home->id:''}}" enctype="multipart/form-data" novalidate>
                        <div class="form-group">
                            <label for="id_category">Item name(name of your choice)</label>
                            <input type="text" id="id_category" class="form-control" name="item_name" value="{{isset($home->item_name) ? $home->item_name :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">               
                            <label for="id_theme_color">Slider (100x50)</label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="slider_100x50" class="custom-file-input" id="customFileInput11">
                                <label for="customFileInput1" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">               
                            <label for="id_theme_color">Slider (1920x950)</label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="slider_1920x950" class="custom-file-input" id="customFileInput2">
                                <label for="customFileInput2" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="id_category">Slider Heading <code>plain</code></label>
                            <input type="text" id="id_category" class="form-control" name="heading_plain" value="{{isset($home->heading_plain) ? $home->heading_plain :''}}">
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">
                            <label for="id_category">Slider Heading <code>strong</code></label>
                            <input type="text" id="id_category" class="form-control" name="heading_strong" value="{{isset($home->heading_strong) ? $home->heading_strong :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="id_category">Slider description text </label>
                            <textarea name="text" cols="30" rows="10" class="form-control" name="tagname" >{{isset($home->text) ? $home->text :''}}</textarea>
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