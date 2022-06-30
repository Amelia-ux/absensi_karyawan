@extends('layouts.app')

@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello,
                                    <span>Welcome Here</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Profile</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="user-profile">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="user-photo m-b-30">
                                                    <img class="img-fluid" width="250px"
                                                        src="{{ asset('storage/' . $user->foto) }}" alt="" />
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="user-profile-name">{{ $user->name }}</div>
                                                <div class="user-job-title">Product Designer</div>
                                                <div class="custom-tab user-profile-tab">
                                                    <div class="tab-content">
                                                        <div role="tabpanel" class="tab-pane active" id="1">
                                                            <div class="contact-information">
                                                                <h4>Contact information</h4>
                                                                <div class="email-content">
                                                                    <span class="contact-title">Email:</span>
                                                                    <span class="contact-email">{{ $user->email }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="link" class="btn btn-success">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endsection
