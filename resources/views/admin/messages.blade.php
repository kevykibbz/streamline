@extends('admin.base')
@section('title') Contact messages @endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>View customers messages</h1>
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
                            <li class="breadcrumb-item active text-primary" aria-current="page"> View customers messages</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end page title -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-12 mx-auto border-md-t">
            <div class="mail-content  border-right border-n h-100">
                <div class="mail-search border-bottom">
                    <div class="row align-items-center mx-0">
                        <div class="col-12">
                            <div class="form-group pt-3">
                                <input type="text" class="form-control" id="search" placeholder="Search..">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mail-msg scrollbar scroll_dark">
                    @if ($messages)
                    @php
                        $counter=0;
                    @endphp
                    @foreach($messages as $message)
                        <div class="mail-msg-item" id="id_{{$message->id}}">
                            <a href="javascript:void(0)">
                                <div class="media align-items-center">
                                    <div class="mr-3">
                                        <div class="bg-img">
                                            <img data-src="/profiles/placeholder.jpg" class="img-fluid" alt="{{$message->name}}">
                                        </div>
                                    </div>
                                    <div class="w-100">
                                        <div class="mail-msg-item-titel justify-content-between">
                                            <p>{{$message->name}}</p>
                                            <p class="d-none d-xl-block">{{Carbon::parse($message->created_at)->diffForHumans()}}</p>
                                        </div>
                                        <h5 class="mb-0 my-2">{{$message->email}}</h5>
                                        <p>{{$message->message}}</p>
                                        <p class="d-xl-none">{{Carbon::parse($message->created_at)->diffForHumans()}}</span></p>
                                        <p class="float-right">
                                            <a href="{{ url('/view/message/'.$message->id) }}" class="mr-2 btn btn-icon btn-outline-primary btn-round"><i class="ti ti-pencil" data-toggle="tooltip" data-placement="top" title="view message" data-original-title="view message"></i></a>
                                            @if ($message->is_read)
                                            <a href="javascript:void(0)" class="btn btn-icon btn-outline-success btn-round"><i class="dripicons dripicons-checkmark" data-toggle="tooltip" data-placement="top" title="Answered message" data-original-title="Answered message"></i></a>
                                            @endif
                                            <a href="{{ url('/delete/message/'.$message->id) }}" class="btn btn-icon btn-outline-danger btn-round"><i class="ti ti-close" data-toggle="tooltip" data-placement="top" title="Delete message" data-original-title="Delete message"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                     @endforeach
                    @else
                    <div class="mail-msg-item text-center">
                        <p class="text-info"><i class="dripicons dripicons-information"></i> No new messages</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
      </div>
</div>
@endsection