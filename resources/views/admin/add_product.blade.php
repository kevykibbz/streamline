@extends('admin.base')
@section('title') {{$title}} @endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Add Product</h1>
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
                                <a href="/site/products">View site products</a>
                            </li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Add product</li>
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
                        <h4 class="card-title">Product Details</h4>
                    </div>
                </div>
                <div class="card-body"> 
                    <form class="SubmitForm" method="post" action="{{isset($product)? '/edit/product/'.$product->product_id:''}}" enctype="multipart/form-data" novalidate>
                        <div class="form-group">
                            <label for="id_category">Product Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="product_name" value="{{isset($product->product_name) ? $product->product_name :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="id_category">Product category <span class="text-danger">*</span></label>
                             <select name="category" id="" class="form-control">
                                @if (count($categories)>0)
                                    @if (!isset($product))
                                        <option value="" selected disabled>Select Product category</option>
                                    @endif
                                @foreach ($categories as $category)
                                    @if (isset($product) and $category->category == $product->category)
                                        <option value="{{$category->category}}" selected>{{$category->category}}</option>
                                    @else
                                        <option value="{{$category->category}}">{{$category->category}}</option>
                                    @endif
                                @endforeach
                                @else
                                <option value="" selected="">No categories found</option>
                                @endif
                             </select>

                            @if(isset($product->category))
                                Current category:<span class="text-info">{{isset($product->category) ? $product->category :''}}</span>
                            @endif
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="id_category">Tag Name</label>
                             <select name="tagname" id="" class="form-control">
                                @if (count($categories)>0)
                                    @if (!isset($product))
                                        <option value="" selected disabled>Select Tagname</option>
                                    @endif
                                @foreach ($categories as $category)
                                    @if (isset($product) and $category->tagname == $product->tagname)
                                        <option value="{{$category->tagname}}" selected>{{$category->tagname}}</option>
                                    @else
                                        <option value="{{$category->tagname}}">{{$category->tagname}}</option>
                                    @endif
                                @endforeach
                                @else
                                <option value="" selected="">No tagnames found</option>
                                @endif
                             </select>
                            <div class="feedback"></div>
                        </div>   
                        <div class="form-group">
                            <label for="id_category">Weight</label>
                            <input type="text" class="form-control" name="weight" value="{{isset($product->weight) ? $product->weight :''}}">
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">
                            <label for="id_category">Dimension</label>
                            <input type="text" class="form-control" name="dimension" value="{{isset($product->dimension) ? $product->dimension :''}}">
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">
                            <label for="id_category">Color</label>
                            <input type="text" class="form-control" name="color" value="{{isset($product->color) ? $product->color :''}}">
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">               
                            <label for="id_theme_color">Logo</label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="logo" id="customFileInput1" class="custom-file-input">
                                <label for="customFileInput1" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">               
                            <label for="id_theme_color">Image(1000x1000)  <span class="text-danger">*</span></label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="image_1000" id="customFileInput1" class="custom-file-input">
                                <label for="customFileInput1" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">
                            <label for="id_category">Description</label>
                            <textarea name="description" id="id_description" cols="30" rows="10" class="form-control">{{isset($product->description) ? $product->description :''}}</textarea>
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