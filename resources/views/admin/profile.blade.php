@extends('admin.base')
@section('title') {{Auth::user()->name}} @endsection
@section('content')
 <div class="container-fluid">
    <div class="row">
        <div class="col-md-12 m-b-30">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Edit Profile</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a  href="{{ url('management/dashboard') }}"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ url('management/dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Edit Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end page title -->
        </div>
    </div>
   <div class="row account-contant">
        <div class="col-12">
            <div class="card card-statistics">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                      <div class="col-xl-3 pb-xl-0 pb-5 border-right">
                          <div class="page-account-profil">
                            <div class="form-titel border-bottom p-3">
                                    <h5 class="mb-0 py-2">Edit Your Profile Picture</h5>
                                </div>
                              <div class="profile-img text-center rounded-circle">
                                  <div class="pt-5 imagecard">
                                      <div class="bg-img m-auto" >
                                          <img src="/profiles/{{Auth::user()->profile}}" class="img-fluid user-image user-imager" alt="{{Auth::user()->name}}">
                                      </div>
                                      <div class="profile pt-4">
                                          <h4 class="mb-1">{{Auth::user()->name}}</h4>
                                          <p>{{Auth::user()->role}}</p>
                                      </div>
                                  </div>
                              </div>
                              <div class="mt-3 profile-btn text-center">
                                <form class="SubmitForm" action="/management/profile/image" method="post" enctype="multipart/form-data">
                                  <input type="file" class="profile" name="profilepic" accept="image/*" hidden>
                                  <a href="javascript:void(0)"  onclick="$('.profile').click();" class="mr-2 btn btn-icon btn-outline-primary btn-round"><i class="fe fe-upload" data-toggle="tooltip" data-placement="top" title="Select  profile picture" data-original-title="Edit"></i></a>
                                  <button  style="display:none" class="showthis mr-2 btn btn-icon btn-outline-success btn-round"><i class="fe fe-check" data-toggle="tooltip" data-placement="top" title="Upload profile picture" data-original-title="Edit"></i></button>
                                    @if (Auth::user()->profile == 'placeholder.jpg')
                                    <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger btn-round"><i class="ti ti-close" data-toggle="tooltip" data-placement="top" title="delete profile picture" data-original-title="Edit"></i></a>
                                    @else
                                    <a href="#" class="btn btn-icon btn-outline-danger btn-round"><i class="ti ti-close" data-toggle="tooltip" data-placement="top" title="delete profile picture" data-original-title="Edit"></i></a>
                                    @endif
                                </form>
                              </div>
                          </div>
                      </div>
                        <div class="col-xl-5 col-md-6 col-12 border-t border-right">
                            <div class="page-account-form">
                                <div class="form-titel border-bottom p-3">
                                    <h5 class="mb-0 py-2">Edit Your Personal Settings</h5>
                                </div>
                                <div class="p-4">
                            <form class="SubmitForm" method="post" action="/management/{{Auth::user()->username}}" novalidate>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="id_first_name">Name</label>
                                                <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                                                <div class="feedback"></div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="id_email">Email</label>
                                                <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                                                <div class="feedback"></div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="id_email">Username</label>
                                                <input type="text" class="form-control" name="username" value="{{Auth::user()->username}}">
                                                <div class="feedback"></div>
                                            </div>

                                            <label for="">Phone Number</label>
                                            <div class="form-group col-md-12">
                                              <input type="tel" class="form-control" name="phone" value="{{Auth::user()->phone}}">
                                                <div class="feedback"></div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                          <button type="submit" class="btn btn-primary" style="margin-top:50px;">
                                            <span></span><span>submit</span>
                                          </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 border-t col-12">
                            <div class="page-account-form">
                                <div class="form-titel border-bottom p-3">
                                    <h5 class="mb-0 py-2">Edit Your Security Details</h5>
                                </div>
                                <div class="p-4">
                                    <form class="SubmitForm" method="post" action="/management/changepassword" novalidate>
                                        <div class="form-group">
                                            <label for="fb">Old Password:</label>
                                            <input type="password" class="form-control" name="oldpassword">
                                            <div class="feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="fb">New Password:</label>
                                             <input type="password" class="form-control" name="newpassword">
                                            <div class="feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="fb">Confirm New Password:</label>
                                             <input type="password" class="form-control" name="cnewpassword">
                                            <div class="feedback"></div>
                                        </div>
                                        <div class="text-center">
                                          <button class="btn btn-primary">
                                            <span></span><span>submit</span>
                                          </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection