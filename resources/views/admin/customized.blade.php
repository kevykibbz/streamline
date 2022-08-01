@extends('admin.base')
@section('title') {{$title}} @endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Add Product  customized images</h1>
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
                                <a href="/site/products">View products</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="/edit/product/{{$product->product_id}}">Edit product</a>
                            </li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Add product  customized images</li>
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
                        <h4 class="card-title">Product image Details</h4>
                    </div>
                </div>
                <div class="card-body"> 
                    <form class="SubmitForm" method="post" action="" enctype="multipart/form-data" novalidate>
                        <div class="form-group">               
                            <label for="id_theme_color">Image(1000x1000)  <span class="text-danger">*</span></label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="image_1000" id="customFileInput1" class="custom-file-input">
                                <label for="customFileInput1" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">               
                            <label for="id_theme_color">Image(768x768)  <span class="text-danger">*</span></label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="image_768" id="customFileInput2" class="custom-file-input">
                                <label for="customFileInput2" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">               
                            <label for="id_theme_color">Image(600x600)  <span class="text-danger">*</span></label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="image_600" id="customFileInput3" class="custom-file-input">
                                <label for="customFileInput3" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">               
                            <label for="id_theme_color">Image(300x300)  <span class="text-danger">*</span></label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="image_300" id="customFileInput4" class="custom-file-input">
                                <label for="customFileInput4" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">               
                            <label for="id_theme_color">Image(150x150)  <span class="text-danger">*</span></label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="image_150" id="customFileInput5" class="custom-file-input">
                                <label for="customFileInput5" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">               
                            <label for="id_theme_color">Image(100x100)  <span class="text-danger">*</span></label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="image_100" id="customFileInput6" class="custom-file-input">
                                <label for="customFileInput6" class="custom-file-label">Browse files</label>
                            </div>
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