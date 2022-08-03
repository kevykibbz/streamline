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
                        <h4 class="card-title">Home Page Slider Banner Details</h4>
                    </div>
                </div>
                <div class="card-body"> 
                    <form class="SubmitForm" method="post" action="{{isset($home)? '/edit/banner/setting/'.$home->id:''}}" enctype="multipart/form-data" novalidate>
                        <div class="form-group">
                            <label for="id_category">Setting name(name of your choice)</label>
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
                            @if($path == 'banner')
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
                        <h4 class="card-title">Home middle top section Details</h4>
                    </div>
                </div>
                <div class="card-body"> 
                     <form class="SubmitForm" method="post" action="{{isset($middle)? '/edit/middle/setting/'.$middle->id:''}}" enctype="multipart/form-data" novalidate>
                        <div class="form-group">
                            <label for="id_category">Setting name(name of your choice)</label>
                            <input type="text" id="id_category" class="form-control" name="item_name" value="{{isset($middle->item_name) ? $middle->item_name :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">               
                            <label for="id_theme_color">Image (420x420)</label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="image_420x420" class="custom-file-input" id="customFileInput11">
                                <label for="customFileInput1" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">
                            <label for="id_category">Image  text </label>
                            <input type="text" id="id_category" class="form-control" name="image_text" value="{{isset($middle->image_text) ? $middle->image_text :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="text-center">
                            @if($path == 'middle')
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
                        <h4 class="card-title">Home middle part one section Details</h4>
                    </div>
                </div>
                <div class="card-body"> 
                     <form class="SubmitForm" method="post" action="{{isset($middlepart)? '/edit/partone/setting/'.$middlepart->id:''}}" enctype="multipart/form-data" novalidate>
                        <div class="form-group">
                            <label for="id_category">Setting name(name of your choice)</label>
                            <input type="text" id="id_category" class="form-control" name="item_name" value="{{isset($middlepart->item_name) ? $middlepart->item_name :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">               
                            <label for="id_theme_color">Image icon (70x70)</label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="image_70x70" class="custom-file-input" id="customFileInput11">
                                <label for="customFileInput1" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">
                            <label for="id_category">Heading text </label>
                            <input type="text" id="id_category" class="form-control" name="image_heading" value="{{isset($middlepart->image_heading) ? $middlepart->image_text :''}}">
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">
                            <label for="id_category">text </label>
                            <input type="text" id="id_category" class="form-control" name="image_text" value="{{isset($middlepart->image_text) ? $middlepart->image_text :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="text-center">
                            @if($path == 'middlepartone')
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
                        <h4 class="card-title">Home middle part two section Details</h4>
                    </div>
                </div>
                <div class="card-body"> 
                     <form class="SubmitForm" method="post" action="{{isset($middlepartb)? '/edit/parttwo/setting/'.$middlepartb->id:''}}" enctype="multipart/form-data" novalidate>
                        <div class="form-group">
                            <label for="id_category">Setting name(name of your choice)</label>
                            <input type="text" id="id_category" class="form-control" name="item_name" value="{{isset($middlepartb->item_name) ? $middlepartb->item_name :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="id_category">Heading text </label>
                            <input type="text" id="id_category" class="form-control" name="image_heading" value="{{isset($middlepartb->image_heading) ? $middlepartb->image_heading :''}}">
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">
                            <label for="id_category">text </label>
                            <input type="text" id="id_category" class="form-control" name="image_text" value="{{isset($middlepartb->image_text) ? $middlepartb->image_text :''}}">
                            <div class="feedback"></div>
                        </div>
                         <div class="form-group">
                            <label for="id_category">Video link </label>
                            <input type="url" id="id_category" class="form-control" name="video_link" value="{{isset($middlepartb->video_link) ? $middlepartb->video_link :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="text-center">
                            @if($path == 'middleparttwo')
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
                        <h4 class="card-title">Home middle part three section Details</h4>
                    </div>
                </div>
                <div class="card-body"> 
                     <form class="SubmitForm" method="post" action="{{isset($middlepartc)? '/edit/partthree/setting/'.$middlepartc->id:''}}" enctype="multipart/form-data" novalidate>
                        <div class="form-group">
                            <label for="id_category">Setting name(name of your choice)</label>
                            <input type="text" id="id_category" class="form-control" name="item_name" value="{{isset($middlepartc->item_name) ? $middlepartc->item_name :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="id_category">Small Heading text </label>
                            <input type="text" id="id_category" class="form-control" name="small_heading" value="{{isset($middlepartc->small_heading) ? $middlepartc->small_heading :''}}">
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">
                            <label for="id_category">Big Heading text </label>
                            <input type="text" id="id_category" class="form-control" name="big_heading" value="{{isset($middlepartc->big_heading) ? $middlepartc->big_heading :''}}">
                            <div class="feedback"></div>
                        </div>
                         <div class="form-group">
                            <label for="id_category">Text </label>
                            <input type="url" id="id_category" class="form-control" name="text" value="{{isset($middlepartc->text) ? $middlepartc->text :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="text-center">
                            @if($path == 'middlepart3')
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
                        <h4 class="card-title">Developers Section Details</h4>
                    </div>
                </div>
                <div class="card-body"> 
                     <form class="SubmitForm" method="post" action="{{isset($developers)? '/edit/developers/setting/'.$developers->id:''}}" enctype="multipart/form-data" novalidate>
                        <div class="form-group">
                            <label for="id_category">Setting name(name of your choice)</label>
                            <input type="text" id="id_category" class="form-control" name="item_name" value="{{isset($developers->item_name) ? $developers->item_name :''}}">
                            <div class="feedback"></div>
                        </div>
                         <div class="form-group">               
                            <label for="id_theme_color">Developer profile (420x466)</label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="image_420x466" class="custom-file-input" id="customFileInput11">
                                <label for="customFileInput1" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="id_category">Developers name </label>
                            <input type="text" id="id_category" class="form-control" name="name" value="{{isset($developers->name) ? $developers->name :''}}">
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">
                            <label for="id_category">Developers title </label>
                            <input type="text" id="id_category" class="form-control" name="title" value="{{isset($developers->title) ? $developers->title :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="text-center">
                            @if($path == 'developer')
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
                        <h4 class="card-title">Customer review Section Details</h4>
                    </div>
                </div>
                <div class="card-body"> 
                     <form class="SubmitForm" method="post" action="{{isset($reviews)? '/edit/review/setting/'.$reviews->id:''}}" enctype="multipart/form-data" novalidate>
                        <div class="form-group">
                            <label for="id_category">Setting name(name of your choice)</label>
                            <input type="text" id="id_category" class="form-control" name="item_name" value="{{isset($reviews->item_name) ? $reviews->item_name :''}}">
                            <div class="feedback"></div>
                        </div>
                         <div class="form-group">               
                            <label for="id_theme_color">Customer profile (300x300)</label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="profile_300x300" class="custom-file-input" id="customFileInput11">
                                <label for="customFileInput1" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="id_category">Customer name </label>
                            <input type="text" id="id_category" class="form-control" name="name" value="{{isset($reviews->name) ? $reviews->name :''}}">
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">
                            <label for="id_category">Customer title </label>
                            <input type="text" id="id_category" class="form-control" name="title" value="{{isset($reviews->title) ? $reviews->title :''}}">
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">
                            <label for="id_category">Customer review </label>
                            <textarea name="review"  cols="30" rows="10" class="form-control">{{isset($reviews->review) ? $reviews->review :''}}</textarea>
                            <div class="feedback"></div>
                        </div>
                        <div class="text-center">
                            @if($path == 'review')
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
                        <h4 class="card-title">Home product gallary section Details</h4>
                    </div>
                </div>
                <div class="card-body"> 
                     <form class="SubmitForm" method="post" action="{{isset($product)? '/edit/home/product/setting/'.$product->id:''}}" enctype="multipart/form-data" novalidate>
                        <div class="form-group">
                            <label for="id_category">Setting name(name of your choice)</label>
                            <input type="text" id="id_category" class="form-control" name="item_name" value="{{isset($product->item_name) ? $product->item_name :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">               
                            <label for="id_theme_color">Image (1200x810)</label>
                            <div class="custom-file" style="cursor:pointer">
                                <input type="file" name="image_1200x810" class="custom-file-input" id="customFileInput11">
                                <label for="customFileInput1" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">
                            <label for="id_category">Image category </label>
                            <select name="category" id="" class="form-control">
                                @if (isset($categories) and count($categories)> 0)
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
                        </div> 
                        <div class="form-group">
                            <label for="id_category">Title </label>
                            <input type="text" id="id_category" class="form-control" name="title" value="{{isset($product->title) ? $product->title :''}}">
                            <div class="feedback"></div>
                        </div> 
                        <div class="form-group">
                            <label for="id_category">Description </label>
                            <textarea name="text" class="form-control" cols="30" rows="10">{{isset($product->text) ? $product->text :''}}</textarea>
                            <div class="feedback"></div>
                        </div>
                        <div class="text-center">
                            @if($path == 'product')
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