@extends('admin.base')
@section('title') Product Categoies @endsection
@section('content')
<div class="container-fluid">
	<div class="row ">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Home</h1>
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
                            <li class="breadcrumb-item active text-primary" aria-current="page">View product categories</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end page title -->
        </div>
    </div>
    <div class="row">
        <div class="col-12 m-b-30">
            <div class="card card-statistics dating-contant h-100 mb-0">
               <div class="card-header">
                  <div class="row">
                     <div class="col-6">
                        <h4 class="card-title">View all product categories</h4>
                     </div>
                     <div class="col-6 text-right">
                        <a href="/add/category" class="btn btn-primary">add category</a>
                     </div>
                  </div>
               </div>
                  <div class="card-body pt-2 scrollbar scroll_dark" style="height:600px">
                     <div class="table-responsive table-results">
                        <table id="datatable-buttons" class="table table-striped">
                           <thead>
                               <tr>
                                   <th class="border-top-0">No.</th>
                                   <th class="border-top-0">category Name</th>
                                   <th class="border-top-0">Tag Names</th>
                                   <th class="border-top-0">No of Products</th>
                                   <th class="border-top-0">Date Created</th>
                                   <th class="border-top-0">Action</th>
                               </tr>
                           </thead>
                           <tbody class="text-muted">
                           	@php
                           	  $counter=0;
                           	@endphp
                            @if(count($categories) > 0)
                                @foreach($categories as $category) 
                                  <tr id="id_{{$category->id}}">
                                      <td>@php echo $counter+=1;@endphp</td>
                                      <td>{{$category->category}}</td>
                                      <td>{{$category->tagname}}</td>
                                      <td>{{number_format($category->items)}}</td>
                                      <td>{{Carbon::parse($category->created_at)->diffForHumans()}}</td>
                                      <td>
                                      	<a href="/edit/category/{{$category->id}}" class="mr-2 btn btn-icon btn-outline-primary btn-round">
                                      		<i class="ti ti-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                      	</a>
                                      	<a class="del-data btn btn-icon btn-outline-danger btn-round" data-host="/categories" href="/delete/category/{{$category->id}}">
                                      	 	<i class="ti ti-close" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
                                      	</a>
                                      </td>
                                  </tr>
                                @endforeach
                              @else
                              <tr>
                                 <td colspan="7" class="text-center text-info">
                                    <i class="fa fa-exclamation-circle"></i> no product category data found
                                 </td>
                              </tr>
                             @endif
                           </tbody>
                       </table>
                     </div>
                  </div>
               </div>
            </div>
      </div>
</div>
@endsection
