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
                        <h4 class="card-title">Top Banner Slider</h4>
                     </div>
                     <div class="col-6 text-right">
                      @if(count($home) == 3)
                        <a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Banner slider</a>
                      @else
                       <a href="/home/page" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Banner slider</a>
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
                                   <th class="border-top-0">Image</th>
                                   <th class="border-top-0">Action</th>
                               </tr>
                           </thead>
                           <tbody class="text-muted">
                           	@php
                           	  $counter=0;
                           	@endphp
                            @if(count($home) > 0)
                                @foreach($home as $homedata) 
                                 <tr>
                                   <td>@php echo $counter+=1;@endphp</td>
                                   <td>{{$homedata->item_name}}</td>
                                    <td>
                                          <a  target="_self" href="/homepage/{{$homedata->preview}}" class="bg-img">
                                              <img class="img-fluid small-image"  src="/homepage/{{$homedata->preview}}" alt="{{$homedata->item_name}}" data-toggle="tooltip" title="{{$homedata->name}}">
                                          </a>
                                    </td>
                                    <td>
                                        <a href="/edit/setting/{{$homedata->id}}" class="mr-2 btn btn-icon btn-outline-primary btn-round">
                                          <i class="ti ti-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                        </a>
                                    </td>
                                 </tr>
                                 <tr></tr>
                                @endforeach
                              @else
                              <tr>
                                 <td colspan="4" class="text-center text-info">
                                    <i class="fa fa-exclamation-circle"></i> no Slider banner data found
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

      <div class="row">
        <div class="col-12 ">
            <div class="card card-statistics dating-contant  mb-0">
               <div class="card-header">
                  <div class="row">
                     <div class="col-6">
                        <h4 class="card-title">Middle section</h4>
                     </div>
                     <div class="col-6 text-right">
                      @if(count($middle) == 3)
                        <a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Middle setting</a>
                      @else
                        <a href="/middle/section" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Middle setting</a>
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
                                   <th class="border-top-0">Image</th>
                                   <th class="border-top-0">Action</th>
                               </tr>
                           </thead>
                           <tbody class="text-muted">
                            @php
                              $counter=0;
                            @endphp
                            @if(count($middle) > 0)
                                @foreach($middle as $homedata) 
                                 <tr>
                                   <td>@php echo $counter+=1;@endphp</td>
                                   <td>{{$homedata->item_name}}</td>
                                    <td>
                                          <a  target="_self" href="/homepage/{{$homedata->preview}}" class="bg-img">
                                              <img class="img-fluid small-image"  src="/homepage/{{$homedata->preview}}" alt="{{$homedata->item_name}}" data-toggle="tooltip" title="{{$homedata->name}}">
                                          </a>
                                    </td>
                                    <td>
                                        <a href="/edit/setting/{{$homedata->id}}" class="mr-2 btn btn-icon btn-outline-primary btn-round">
                                          <i class="ti ti-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                        </a>
                                    </td>
                                 </tr>
                                 <tr></tr>
                                @endforeach
                              @else
                              <tr>
                                 <td colspan="4" class="text-center text-info">
                                    <i class="fa fa-exclamation-circle"></i> no middle section  data found
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

       <div class="row">
        <div class="col-12 ">
            <div class="card card-statistics dating-contant  mb-0">
               <div class="card-header">
                  <div class="row">
                     <div class="col-6">
                        <h4 class="card-title">Middle part one section</h4>
                     </div>
                     <div class="col-6 text-right">
                      @if(count($middlepart) == 4)
                        <a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Middle part one section</a>
                      @else
                        <a href="/middle/part/one" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Middle part one section</a>
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
                                   <th class="border-top-0">Image</th>
                                   <th class="border-top-0">Action</th>
                               </tr>
                           </thead>
                           <tbody class="text-muted">
                            @php
                              $counter=0;
                            @endphp
                            @if(count($middlepart) > 0)
                                @foreach($middlepart as $homedata) 
                                 <tr>
                                   <td>@php echo $counter+=1;@endphp</td>
                                   <td>{{$homedata->item_name}}</td>
                                    <td>
                                          <a  target="_self" href="/homepage/{{$homedata->preview}}" class="bg-img">
                                              <img class="img-fluid small-image"  src="/homepage/{{$homedata->preview}}" alt="{{$homedata->item_name}}" data-toggle="tooltip" title="{{$homedata->name}}">
                                          </a>
                                    </td>
                                    <td>
                                        <a href="/edit/setting/{{$homedata->id}}" class="mr-2 btn btn-icon btn-outline-primary btn-round">
                                          <i class="ti ti-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                        </a>
                                    </td>
                                 </tr>
                                 <tr></tr>
                                @endforeach
                              @else
                              <tr>
                                 <td colspan="4" class="text-center text-info">
                                    <i class="fa fa-exclamation-circle"></i> no middle part one section  data found
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

      <div class="row">
        <div class="col-12 ">
            <div class="card card-statistics dating-contant  mb-0">
               <div class="card-header">
                  <div class="row">
                     <div class="col-6">
                        <h4 class="card-title">Middle part two section</h4>
                     </div>
                     <div class="col-6 text-right">
                      @if(count($middleparttwo) > 0)
                        <a href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Middle part two section</a>
                      @else
                        <a href="/middle/part/two" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Middle part two section</a>
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
                                   <th class="border-top-0">Image</th>
                                   <th class="border-top-0">Action</th>
                               </tr>
                           </thead>
                           <tbody class="text-muted">
                            @php
                              $counter=0;
                            @endphp
                            @if(count($middleparttwo) > 0)
                                @foreach($middleparttwo as $homedata) 
                                 <tr>
                                   <td>@php echo $counter+=1;@endphp</td>
                                   <td>{{$homedata->item_name}}</td>
                                    <td>No preview</td>
                                    <td>
                                        <a href="/edit/setting/{{$homedata->id}}" class="mr-2 btn btn-icon btn-outline-primary btn-round">
                                          <i class="ti ti-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                        </a>
                                    </td>
                                 </tr>
                                 <tr></tr>
                                @endforeach
                              @else
                              <tr>
                                 <td colspan="4" class="text-center text-info">
                                    <i class="fa fa-exclamation-circle"></i> no middle part two section  data found
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


       <div class="row">
        <div class="col-12 ">
            <div class="card card-statistics dating-contant  mb-0">
               <div class="card-header">
                  <div class="row">
                     <div class="col-6">
                        <h4 class="card-title">Middle part three section</h4>
                     </div>
                     <div class="col-6 text-right">
                      @if(count($middlepart3) > 0)
                        <a href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Middle part three section</a>
                      @else
                        <a href="/middle/part/three" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Middle part three section</a>
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
                                   <th class="border-top-0">Image</th>
                                   <th class="border-top-0">Action</th>
                               </tr>
                           </thead>
                           <tbody class="text-muted">
                            @php
                              $counter=0;
                            @endphp
                            @if(count($middlepart3) > 0)
                                @foreach($middlepart3 as $homedata) 
                                 <tr>
                                   <td>@php echo $counter+=1;@endphp</td>
                                   <td>{{$homedata->item_name}}</td>
                                    <td>No preview</td>
                                    <td>
                                        <a href="/edit/setting/{{$homedata->id}}" class="mr-2 btn btn-icon btn-outline-primary btn-round">
                                          <i class="ti ti-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                        </a>
                                    </td>
                                 </tr>
                                 <tr></tr>
                                @endforeach
                              @else
                              <tr>
                                 <td colspan="4" class="text-center text-info">
                                    <i class="fa fa-exclamation-circle"></i> no middle part three section  data found
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

       <div class="row">
        <div class="col-12 ">
            <div class="card card-statistics dating-contant  mb-0">
               <div class="card-header">
                  <div class="row">
                     <div class="col-6">
                        <h4 class="card-title">Developers</h4>
                     </div>
                     <div class="col-6 text-right">
                      @if(count($developers) ==4 )
                        <a href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Developers</a>
                      @else
                        <a href="/developers" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Developers</a>
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
                                   <th class="border-top-0">Image</th>
                                   <th class="border-top-0">Action</th>
                               </tr>
                           </thead>
                           <tbody class="text-muted">
                            @php
                              $counter=0;
                            @endphp
                            @if(count($developers) > 0)
                                @foreach($developers as $homedata) 
                                 <tr>
                                   <td>@php echo $counter+=1;@endphp</td>
                                   <td>{{$homedata->item_name}}</td>
                                    <td>
                                        <a  target="_self" href="/homepage/{{$homedata->preview}}" class="bg-img">
                                              <img class="img-fluid small-image"  src="/homepage/{{$homedata->preview}}" alt="{{$homedata->item_name}}" data-toggle="tooltip" title="{{$homedata->name}}">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/edit/setting/{{$homedata->id}}" class="mr-2 btn btn-icon btn-outline-primary btn-round">
                                          <i class="ti ti-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                        </a>
                                    </td>
                                 </tr>
                                 <tr></tr>
                                @endforeach
                              @else
                              <tr>
                                 <td colspan="4" class="text-center text-info">
                                    <i class="fa fa-exclamation-circle"></i> no developers  data found
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

       <div class="row">
        <div class="col-12 ">
            <div class="card card-statistics dating-contant  mb-0">
               <div class="card-header">
                  <div class="row">
                     <div class="col-6">
                        <h4 class="card-title">Customer reviews</h4>
                     </div>
                     <div class="col-6 text-right">
                      @if(count($reviews) == 3)
                        <a href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-plus-circle"></i> >Customer reviews</a>
                      @else
                        <a href="/add/reviews" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Customer reviews</a>
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
                                   <th class="border-top-0">Image</th>
                                   <th class="border-top-0">Action</th>
                               </tr>
                           </thead>
                           <tbody class="text-muted">
                            @php
                              $counter=0;
                            @endphp
                            @if(count($reviews) > 0)
                                @foreach($reviews as $homedata) 
                                 <tr>
                                   <td>@php echo $counter+=1;@endphp</td>
                                   <td>{{$homedata->item_name}}</td>
                                    <td>
                                        <a  target="_self" href="/homepage/{{$homedata->preview}}" class="bg-img">
                                              <img class="img-fluid small-image"  src="/homepage/{{$homedata->preview}}" alt="{{$homedata->item_name}}" data-toggle="tooltip" title="{{$homedata->name}}">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/edit/setting/{{$homedata->id}}" class="mr-2 btn btn-icon btn-outline-primary btn-round">
                                          <i class="ti ti-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                        </a>
                                    </td>
                                 </tr>
                                 <tr></tr>
                                @endforeach
                              @else
                              <tr>
                                 <td colspan="4" class="text-center text-info">
                                    <i class="fa fa-exclamation-circle"></i> no customer reviews  data found
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


       <div class="row">
        <div class="col-12 ">
            <div class="card card-statistics dating-contant  mb-0">
               <div class="card-header">
                  <div class="row">
                     <div class="col-6">
                        <h4 class="card-title">Home page product gallary</h4>
                     </div>
                     <div class="col-6 text-right">
                      <a href="/add/gallery" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add gallary</a>
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
                                   <th class="border-top-0">Image</th>
                                   <th class="border-top-0">Action</th>
                               </tr>
                           </thead>
                           <tbody class="text-muted">
                            @php
                              $counter=0;
                            @endphp
                            @if(count($product) > 0)
                                @foreach($product as $homedata) 
                                 <tr>
                                   <td>@php echo $counter+=1;@endphp</td>
                                   <td>{{$homedata->item_name}}</td>
                                    <td>
                                        <a  target="_self" href="/homepage/{{$homedata->preview}}" class="bg-img">
                                              <img class="img-fluid small-image"  src="/homepage/{{$homedata->preview}}" alt="{{$homedata->item_name}}" data-toggle="tooltip" title="{{$homedata->name}}">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/edit/setting/{{$homedata->id}}" class="mr-2 btn btn-icon btn-outline-primary btn-round">
                                          <i class="ti ti-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                        </a>
                                    </td>
                                 </tr>
                                 <tr></tr>
                                @endforeach
                              @else
                              <tr>
                                 <td colspan="4" class="text-center text-info">
                                    <i class="fa fa-exclamation-circle"></i> no gallary data found
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
