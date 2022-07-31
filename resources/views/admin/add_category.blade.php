@extends('admin.base')
@section('title') {{$title}} @endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Add Product Category</h1>
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
                                <a href="/categories">View categories</a>
                            </li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Add category</li>
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
                        <h4 class="card-title">Category Details</h4>
                    </div>
                </div>
                <div class="card-body"> 
                    <form class="SubmitForm" method="post" action="{{isset($category)? '/edit/category/'.$category->id:''}}" enctype="multipart/form-data" novalidate>
                        <div class="form-group">
                            <label for="id_category">Catagory Name</label>
                            <input type="text" id="id_category" class="form-control" name="category" value="{{isset($category->category) ? $category->category :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">               
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