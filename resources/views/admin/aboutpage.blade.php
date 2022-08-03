@extends('admin.base')
@section('title') {{$title}} @endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0 text-center">
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
                                <a href="/about/settings">View About settings</a>
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
                        <h4 class="card-title">About page memory section Details</h4>
                    </div>
                </div>
                <div class="card-body"> 
                    <form class="SubmitForm" method="post" action="{{isset($memory)? '/edit/memory/setting/'.$memory->id:''}}" enctype="multipart/form-data" novalidate>
                        <div class="form-group">
                            <label for="id_category">Setting name(name of your choice)</label>
                            <input type="text" id="id_category" class="form-control" name="item_name" value="{{isset($memory->item_name) ? $memory->item_name :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">               
                            <label for="id_theme_color">Sign image (175x51)</label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="image_175x51" class="custom-file-input" id="customFileInput11">
                                <label for="customFileInput1" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">               
                            <label for="id_theme_color">Persons (494x702)</label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="image_494x702" class="custom-file-input" id="customFileInput2">
                                <label for="customFileInput2" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="id_category">Small Heading <code>plain</code></label>
                            <input type="text" id="id_category" class="form-control" name="small_heading" value="{{isset($memory->small_heading) ? $memory->small_heading :''}}">
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">
                            <label for="id_category">Big Heading <code>strong</code></label>
                            <input type="text" id="id_category" class="form-control" name="big_heading" value="{{isset($memory->big_heading) ? $memory->big_heading :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="id_category">Text </label>
                            <textarea name="text" cols="30" rows="10" class="form-control" name="text" >{{isset($memory->text) ? $memory->text :''}}</textarea>
                            <div class="feedback"></div>
                        </div>
                        <div class="text-center">
                            @if($path == 'memory')
                             <button type="submit" class="btn btn-primary" >
                                <span></span><span>submit</span>
                            </button> 
                            @else
                             <button type="submit" class="btn btn-primary" disabled>
                                <span></span><span>submit</span>
                            </button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div> 

         <div class="col-xl-6 mx-auto">
            <div class="card card-statistics">
                <div class="card-header">
                    <div class="card-heading">
                        <h4 class="card-title">About page products slider section Details</h4>
                    </div>
                </div>
                <div class="card-body"> 
                    <form class="SubmitForm" method="post" action="{{isset($feature)? '/edit/featured/setting/'.$feature->id:''}}" enctype="multipart/form-data" novalidate>
                        <div class="form-group">
                            <label for="id_category">Setting name(name of your choice)</label>
                            <input type="text" id="id_category" class="form-control" name="item_name" value="{{isset($feature->item_name) ? $feature->item_name :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">               
                            <label for="id_theme_color">Image (480x430)</label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="image_480x430" class="custom-file-input" id="customFileInput11">
                                <label for="customFileInput1" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">
                            <label for="id_category">Product name</label>
                            <input type="text" id="id_category" class="form-control" name="name" value="{{isset($feature->title) ? $feature->title :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="id_category">Heading </label>
                            <input type="text" id="id_category" class="form-control" name="heading" value="{{isset($feature->heading) ? $feature->heading :''}}">
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">
                            <label for="id_category">Text </label>
                            <textarea name="text" cols="30" rows="10" class="form-control" name="text" >{{isset($feature->text) ? $feature->text :''}}</textarea>
                            <div class="feedback"></div>
                        </div>
                        <div class="text-center">
                            @if($path == 'feature')
                             <button type="submit" class="btn btn-primary" >
                                <span></span><span>submit</span>
                            </button> 
                            @else
                             <button type="submit" class="btn btn-primary" disabled>
                                <span></span><span>submit</span>
                            </button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div> 

  
    </div>
 </div>
@endsection