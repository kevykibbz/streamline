@extends('admin.base')
@section('title') View site Employees @endsection
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
                            <li class="breadcrumb-item active text-primary" aria-current="page">View Employees</li>
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
                        <h4 class="card-title">View all employees</h4>
                     </div>
                     <div class="col-6 text-right">
                        <a href="/add/employees" class="btn btn-primary">Add employee</a>
                     </div>
                  </div>
               </div>
                  <div class="card-body pt-2 scrollbar scroll_dark" style="height:600px">
                     <div class="table-responsive table-results">
                        <table id="datatable-buttons" class="table table-striped">
                           <thead>
                               <tr>
                                   <th class="border-top-0">No.</th>
                                   <th class="border-top-0">Name</th>
                                   <th class="border-top-0">User Name</th>
                                   <th class="border-top-0">Email</th>
                                   <th class="border-top-0">Status</th>
                                   <th class="border-top-0">Date</th>
                                   <th class="border-top-0">Action</th>
                               </tr>
                           </thead>
                           <tbody class="text-muted">
                           	@php
                           	  $counter=0;
                           	@endphp
                            @if(count($employees) > 0)
                                @foreach($employees as $employee) 
                                  <tr id="id_{{$employee->id}}">
                                      <td>@php echo $counter+=1;@endphp</td>
                                      <td>
                                          <div class="bg-img">
                                              <img class="img-fluid small-image"  src="/profiles/{{$employee->profile}}" alt="{{$employee->name}}" data-toggle="tooltip" title="{{$employee->name}}">
                                          </div>
                                          <p>{{$employee->name}}</p>
                                      </td>
                                      <td>{{$employee->username}}</td>
                                      <td>{{$employee->email}}</td>
                                      <td>
                                          @if ($employee->role == 'superuser')
                                          <label class="badge mb-0 badge-success-inverse">Superemployee</label>
                                          @elseif ($employee->role == 'employee')
                                          <label class="badge mb-0 badge-primary-inverse">employee</label>
                                          @else 
                                          <label class="badge mb-0 badge-info-inverse">Employee</label>
                                          @endif
                                      </td>
                                      <td>{{Carbon::parse($employee->created_at)->diffForHumans()}}</td>
                                      <td>
                                          @if ($employee->is_superuser)
                                             @if ($employee->is_superuser and Auth::user()->is_superuser)
                                             <a href="/profile/{{$employee->username}}" class="mr-2 btn btn-icon btn-outline-primary btn-round"><i class="ti ti-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                                             @else
                                             <a href="javascript:void(0)" class="mr-2 btn btn-icon btn-outline-primary btn-round"><i class="ti ti-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                                             @endif
                                          @else
                                          <a href="/edit/employee/{{$employee->id}}" class="mr-2 btn btn-icon btn-outline-primary btn-round"><i class="ti ti-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                                          @endif

                                          @if ($employee->is_superuser)
                                          <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger btn-round"><i class="ti ti-close" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
                                          @else
                                          <a class="del-data btn btn-icon btn-outline-danger btn-round" data-host="/employees" href="/delete/employee/{{$employee->id}}"><i class="ti ti-close" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
                                          @endif
                                      </td>
                                  </tr>
                                @endforeach
                              @else
                              <tr>
                                 <td colspan="7" class="text-center text-info">
                                    <i class="fa fa-exclamation-circle"></i> no employees data found
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