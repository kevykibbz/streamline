@extends('admin.base')
@section('title')  {{$title}} @endsection
@section('content')
<div class="container-fluid">
  <div class="row ">
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
                            <li class="breadcrumb-item active text-primary" aria-current="page">{{$title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end page title -->
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-statistics dating-contant  mb-0">
               <div class="card-header">
                  <div class="row">
                     <div class="col-6">
                        <h4 class="card-title">About page memory Slider</h4>
                     </div>
                     <div class="col-6 text-right">
                      @if($brochure)
                        <a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Brochure</a>
                      @else
                       <a href="/add/brochure" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Brochure</a>
                      @endif
                     </div>
                  </div>
               </div>
                  <div class="card-body pt-2 scrollbar scroll_dark" style="height:600px">
                     <div class="table-responsive table-results">
                        <table id="datatable-buttons" class="table table-striped">
                           <thead>
                               <tr>
                                   <th class="border-top-0">No.</th>
                                    <th class="border-top-0">Item name</th>
                                   <th class="border-top-0">pdf</th>
                                   <th class="border-top-0">Action</th>
                               </tr>
                           </thead>
                           <tbody class="text-muted">
                            @php
                              $counter=0;
                            @endphp
                            @if($brochure)
                                <tr>
                                   <td>1</td>
                                   <td>{{$brochure->item_name}}</td>
                                    <td>
                                          <a  target="_self" href="/brochure/{{$brochure->preview}}" class="bg-img">
                                             view pdf
                                          </a>
                                    </td>
                                    <td>
                                        <a href="/edit/brochure/{{$brochure->id}}" class="mr-2 btn btn-icon btn-outline-primary btn-round">
                                          <i class="ti ti-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                        </a>
                                    </td>
                                 </tr>
                              @else
                              <tr>
                                 <td colspan="4" class="text-center text-info">
                                    <i class="fa fa-exclamation-circle"></i> no data found
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
