@extends('admin.base')
@section('title') View message @endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>View  message</h1>
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
                                <a href="/messages">messages</a>
                            </li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">View {{$message->first_name}}'s message</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end page title -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-12 mx-auto border-t border-xxl-t">
            <div class="mail-chat py-5 px-5">
                <div class="media align-items-center">
                    <div class="bg-img mr-3">
                        <img src="/images/loader.gif" data-src="/profiles/placeholder.jpg" class="img-fluid" alt="{{$message->first_name}} {{$message->last_name}}">
                    </div>
                    <div>
                        <h4 class="mb-0">{{$message->first_name}} {{$message->last_name}}</h4>
                        <p>{{Carbon::parse($message->created_at)->diffForHumans()}}</p>
                    </div>
                </div>
                <div class="ml-4 mt-4 d-flex justify-content-between">
                    <div>
                        <h3>{{$message->subject ? $message->subject : 'No subject' }}</h3>
                    </div>
                </div>
                <div class="ml-4">
                   <p>{{$message->message}}</p>
                </div>
            </div>
            <div class="mb-4 bg-light mail-f px-4 py-3">
                <div class="py-2 bg-white px-4 py-3 d-flex justify-content-between">
                    <p>Click here to <a href="#editer" data-toggle="collapse" class="text-primary px-1">Reply</a></p>
                    <a href="javascript:void(0);" class="text-primary"><i class="fa fa-microphone"></i></a>
                </div>
                <form action="/reply/message/{{$message->id}}" method="post" class="SubmitForm" novalidate>
                    <div class="collapse" id="editer">
                        <div class="mt-2 form-group">
                            subject:<input type="text" name="subject" class="form-control" value="{{$message->subject ? $message->subject : 'No subject' }}" readonly>
                        </div><div class="mt-2 form-group">
                            To:<input type="email" name="email" class="form-control" value="{{$message->email}}" readonly>
                        </div>
                        <div class="form-group">
                        	<textarea name="reply" id="" cols="30" rows="10" class="form-control"></textarea>
                            <div class="feedback"></div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between py-2">
                        <div>
                            <ul class="nav">
                                <li class="nav-item pr-3"><a href="javascript:void(0)"><i class="ti ti-clip font-20"></i></a></li>
                                <li class="nav-item pr-3"><a href="javascript:void(0)"><i class="ti ti-face-smile font-20"></i></a></li>
                                <li class="nav-item"><a href="javascript:void(0)"><i class="ti ti-gallery font-20"></i></a></li>
                            </ul>
                        </div>
                        <div>
                            <button class="btn btn-primary"><span>Send</span> <i class="dripicons dripicons-direction"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection