@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        @include('layouts.admin.admin-breadcrumb', ['breadcrumbs' => ''])

        <div class="pb-3">
            <h1>Dashboard</h1>
        </div>
        @if(checkRoleForBlade([ROLE_ADMIN]))
        <div class="row">
            <div class="col-md-6 col-lg-3 d-flex">
                <div class="card mb-grid w-100">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title mb-0">
                                Records
                            </h5>

                            <div class="card-title-sub">
                                $753.82
                            </div>
                        </div>

                        <div class="progress mt-auto">
                            <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">3/4</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex">
                <div class="card mb-grid w-100">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title mb-0">
                                Open Appointment
                            </h5>

                            <div class="card-title-sub">
                                18/30
                            </div>
                        </div>

                        <div class="progress mt-auto">
                            <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex">
                <div class="card border-0 bg-primary text-white text-center mb-grid w-100">
                    <div class="d-flex flex-row align-items-center h-100">
                        <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                            <i data-feather="shopping-cart"></i>
                        </div>
                        <div class="card-body">
                            <div class="card-info-title">Appointment</div>
                            <h3 class="card-title mb-0">
                                {{768}}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex">
                <div class="card border-0 bg-success text-white text-center mb-grid w-100">
                    <div class="d-flex flex-row align-items-center h-100">
                        <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                            <i data-feather="users"></i>
                        </div>
                        <div class="card-body">
                            <div class="card-info-title">Sign Ups (total)</div>
                            <h3 class="card-title mb-0">
                                {{123}}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">Doctors</div>

                        <nav class="card-header-actions">
                            <div class="dropdown">
                                <a class="card-header-action" href="#" role="button" id="card1Settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i data-feather="settings"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="card1Settings">
                                    <a class="dropdown-item" href="{{route('admin.doctor.create')}}">Add Doctor</a>
                                    <a class="dropdown-item" href="{{route('admin.doctor.list')}}">Doctor Manage</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="card-body collapse show" id="card1">
                        <h4 class="card-title">Doctors</h4>
                        <p class="card-text">Manage doctors with admin privilege.</p>
                        <a href="{{route('admin.doctor.list')}}" class="btn btn-primary">Manage Doctor</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">Patient</div>

                        <nav class="card-header-actions">
                            <div class="dropdown">
                                <a class="card-header-action" href="#" role="button" id="card2Settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i data-feather="settings"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="card2Settings">
                                    <a class="dropdown-item" href="{{route('admin.patient.create')}}">Add Patient</a>
                                    <a class="dropdown-item" href="{{route('admin.patient.list')}}">Patient Manage</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Patient</h4>
                        <p class="card-text">Manges patient with admin privilege</p>
                        <a href="{{route('admin.patient.list')}}" class="btn btn-primary">Manage Patient</a>
                    </div>
                </div>
            </div>
        </div>
            @endif
    </div>
@endsection
