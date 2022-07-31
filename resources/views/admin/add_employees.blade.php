@extends('admin.base')
@section('title') {{$title}} @endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Add employee</h1>
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
                                <a href="/employees">View employees</a>
                            </li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Add employee</li>
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
                        <h4 class="card-title">employee Details</h4>
                    </div>
                </div>
                <div class="card-body"> 
                    <form class="SubmitForm" method="post" action="{{isset($employee)? '/edit/employee/'.$employee->id:''}}" enctype="multipart/form-data" novalidate>
                        <div class="form-group">               
                            <label for="id_theme_color">Profile pic</label>
                            <div class="custom-file" style="cursor:pointer">
                            	<input type="file" name="profilepic" id="customFileInput" class="custom-file-input">
                                <label for="customFileInput" class="custom-file-label">Browse files</label>
                            </div>
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="id_first_name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{isset($employee->name) ? $employee->name :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">               
                            <label for="id_email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{isset($employee->email) ? $employee->email :''}}">
                            <div class="feedback"></div>
                        </div>
                        <div class="form-group">               
                            <label for="id_username">Username</label>
                            <input type="text" class="form-control" name="username" value="{{isset($employee->username) ? $employee->username :''}}">
                            <div class="feedback"></div>
                        </div>
                        <label for="id_phone">Phone</label>
                        <div class="form-group">               
                            <input type=tel class="form-control" name="phone" value="{{isset($employee->phone) ? $employee->phone :''}}">
                            <div class="feedback"></div>
                        </div>
                        @if(!isset($employee))
                        <div class="form-group" style="margin-top:50px;">               
                            <label for="id_password1">Password</label>
                            <input type="password" class="form-control" name="password">
                            <div class="feedback"></div>
                        </div><div class="form-group">               
                            <label for="id_password2">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password">
                            <div class="feedback"></div>
                        </div>
                    	@endif
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