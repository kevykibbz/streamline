@extends('admin.base')
@section('title') Dashboard @endsection
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
                            <li class="breadcrumb-item active text-primary" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end page title -->
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xxl-3 m-b-30">
            <a href="#" class="card card-statistics h-100 mb-0">
                <div class="card-body">
                    <div class="d-flex h-100">
                        <div class="align-self-center">
                            <div class="apexchart-wrapper">
                                <div id="datingdemo5"></div>
                            </div>
                        </div>
                        <div class="align-self-center ml-auto">
                            <h3 class="f-26 mb-0"><span class="count">34</span></h3>
                            <p class="text-muted mb-0">Total products</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 col-xxl-3 m-b-30">
            <a href="/messages"class="card card-statistics h-100 mb-0">
                <div class="card-body">
                    <div class="d-flex h-100">
                        <div class="align-self-center">
                            <div class="apexchart-wrapper">
                                <div id="datingdemo6"></div>
                            </div>
                        </div>
                        <div class="align-self-center ml-auto">
                            <h3 class="f-26 mb-0"><span class="count">{{number_format($messages)}}</span></h3>
                            <p class="text-muted mb-0">Total messages</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 col-xxl-3 m-b-30">
            <a href="#" class="card card-statistics h-100 mb-0">
                <div class="card-body">
                    <div class="d-flex h-100">
                        <div class="align-self-center">
                            <div class="apexchart-wrapper">
                                <div id="datingdemo7"></div>
                            </div>
                        </div>
                        <div class="align-self-center ml-auto">
                            <h3 class="f-26 mb-0"><span class="count">{{number_format($admins)}}</span></h3>
                            <p class="text-muted mb-0">Site Admins</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 col-xxl-3 m-b-30">
            <a href="#" class="card card-statistics h-100 mb-0">
                <div class="card-body">
                    <div class="d-flex h-100">
                        <div class="apexchart-wrapper">
                            <div id="datingdemo8"></div>
                        </div>
                        <div class="align-self-center ml-auto">
                            <h3 class="f-26 mb-0"><span class="count">{{number_format($employees)}}</span></h3>
                            <p class="text-muted mb-0">Site Employees</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12">
            <div class="card card-statistics">
                <div class="card-header border-0">
                    <h4 class="card-title">Quick stats</h4>
                </div>
                <div class="card-body datting-upload-image">
                    <div class="tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="successed-tab" data-toggle="tab" href="#successed" role="tab" aria-controls="successed" aria-selected="true">Queries</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Suggestions</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show p-0 border-top" id="successed" role="tabpanel" aria-labelledby="successed-tab">
                                <div class="d-flex align-items-center justify-content-between row">
                                    <a href="{% url 'customers queries' %}" class="upload-image d-flex align-items-center col">
                                        <div class="icon-container m-r-10 img-icon img-icon-sm">
                                            <i class="fa fa-male"></i>
                                        </div>
                                        <div class="report-details">
                                            <h4 class="m-b-0">{{number_format($read)}}</h4>
                                            <p>Answered</p>
                                        </div>
                                    </a>
                                    <a href="{% url 'customers queries' %}" class="upload-image d-flex align-items-center col">
                                        <div class="icon-container m-r-10 img-icon img-icon-sm">
                                            <i class="fa fa-female"></i>
                                        </div>
                                        <div class="report-details">
                                            <h4 class="m-b-0">{{number_format($unread)}}</h4>
                                            <p>Unaswered</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="tab-pane fade p-0 border-top" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                                <div class=" d-flex align-items-center justify-content-between row">
                                    <a href="{% url 'customer suggestions' %}" class="upload-image d-flex align-items-center col">
                                        <div class="icon-container m-r-10 img-icon img-icon-sm">
                                            <i class="fa fa-male"></i>
                                        </div>
                                        <div class="report-details">
                                            <h4 class="m-b-0">34</h4>
                                            <p>Total suggestions</p>
                                        </div>
                                    </a>
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