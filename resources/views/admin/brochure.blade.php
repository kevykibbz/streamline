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
                                <a href="/brochure/settings">View brochure settings</a>
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
                        <h4 class="card-title">Brochure page  section Details</h4>
                    </div>
                </div>
                <div class="card-body"> 
                    <form class="SubmitForm" method="post" action="{{isset($brochure)? '/edit/brochure/'.$brochure->id:''}}" enctype="multipart/form-data" novalidate>
                        <div class="form-group">
                            <label for="id_category">Setting name(name of your choice)</label>
                            <input type="text" class="form-control" name="item_name" value="{{isset($brochure->item_name) ? $brochure->item_name :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="id_category">Title</label>
                            <input type="text" class="form-control" name="title" value="{{isset($brochure->title) ? $brochure->title :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="id_category">Text </label>
                            <textarea name="text" cols="30" rows="10" class="form-control" name="text" >{{isset($brochure->text) ? $brochure->text :''}}</textarea>
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">               
                            <label for="id_theme_color">PDF Upload</label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="pdf" class="custom-file-input" id="customFileInput11">
                                <label for="customFileInput1" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div> 
                        <div class="text-center">
                            @if($path == 'brochure')
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