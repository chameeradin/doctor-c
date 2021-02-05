@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('layouts.admin.admin-breadcrumb',['breadcrumbs' => [['name' => 'Prescription', 'url' =>'']]])

        <div class="pb-3">
            <h1>Prescription List</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="alert alert-warning" role="alert">
                    <form method="get">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label for="id" class="control-label">Prescription Number</label>
                                        <input class="form-control" id="id" type="text" name="id"
                                               value="{{ Request::get('id')}}"/>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label for="appointment_id" class="control-label">Appointment No</label>
                                        <select name="appointment_id" class="form-control" id="appointment_id">
                                            <option value=""></option>
                                            @foreach($prescriptions as $prescription)
                                                <option value="{{ $prescription->appointment_id }}" {{ Request::get('appointment_id') == $prescription->appointment_id ? 'selected' : '' }}>{{ $prescription->appointment_id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                @if (checkRoleForBlade([ROLE_ADMIN, ROLE_PATIENT]))
                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label for="doctor_id" class="control-label">Doctor Name</label>
                                        <select name="doctor_id" class="form-control" id="doctor_id">
                                            <option value=""></option>
                                            @foreach($doctors as $doctor)
                                                <option value="{{ $doctor->id }}" {{ Request::get('doctor_id') == $doctor->id ? 'selected' : '' }}>{{ $doctor->first_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                @if (checkRoleForBlade([ROLE_ADMIN, ROLE_DOCTOR]))
                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label for="patient_id" class="control-label">Patient Name</label>
                                        <select name="patient_id" class="form-control" id="patient_id">
                                            <option value=""></option>
                                            @foreach($patients as $patient)
                                                <option value="{{ $patient->id }}" {{ Request::get('patient_id') == $patient->id ? 'selected' : '' }}>{{ $patient->first_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary" value="" id="btn-search"><span
                                        class="fa fa-search"></span> Search
                            </button>
                            <a href="{{route('admin.prescription.list')}}" class="btn btn-link">Clear search</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-grid">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">Prescriptions</div>
                        @if (checkRoleForBlade([ROLE_DOCTOR]))
                            <nav class="card-header-actions">
                                <a href="{{ route('admin.prescription.new') }}" class="btn btn-success">{{'Add a new Prescription'}}</a>
                            </nav>
                        @endif
                    </div>
                    <div class="card-body collapse show" id="card1">
                        <div class="table-responsive-md">
                            <table class="table table-actions table-striped table-hover mb-0" data-table>
                                <thead>
                                <tr>
                                    <th scope="col" style="width: 5%">Prescription No</th>
                                    <th scope="col" style="width: 5%">Reference No</th>
                                    <th scope="col" style="width: 5%">Appointment No</th>
                                    @if(!checkRoleForBlade([ROLE_DOCTOR]))<th scope="col" style="width: 15%">Doctor</th>@endif
                                    @if(!checkRoleForBlade([ROLE_PATIENT]))<th scope="col" style="width: 15%">Patient</th>@endif
                                    <th scope="col">Medicine</th>
                                    <th scope="col" style="width: 5%">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if ($prescriptions->count() > 0)
                                    @foreach ($prescriptions as $prescription)
                                        <tr>
                                            <td>{{ $prescription->id}}</td>
                                            <td>{{ $prescription->ref_no}}</td>
                                            <td>{{ $prescription->appointment_id }}</td>
                                            @if(!checkRoleForBlade([ROLE_DOCTOR]))<td>{{ getDoctorNameById($prescription->doctor_id)}}</td>@endif
                                            @if(!checkRoleForBlade([ROLE_PATIENT]))<td>{{ getPatientNameById($prescription->patient_id)}}</td>@endif
                                            <td>{{ $prescription->medicine }}</td>
                                            {{--<td>--}}
                                                {{--<a href="{{ route("view.prescription", [$prescription->id]) }}"--}}
                                                   {{--class="btn btn-sm btn-primary">{{'Download'}}</a>--}}
                                            {{--</td>--}}
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td scope="col" colspan="12"
                                            class="text-center">{{trans('No entries in table.')}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-12">
                                    @include('layouts.partials.admin-pagination', ['result' => $prescriptions])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
