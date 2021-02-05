@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('layouts.admin.admin-breadcrumb', ['breadcrumbs' => [['name' => 'Appointment', 'url' =>'']]])

        <div class="pb-3">
            <h1>Manage Appointment</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="alert alert-warning" role="alert">
                    <form method="get">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label for="ref_no" class="control-label">Ref No</label>
                                        <input class="form-control" id="epf_no" type="text" name="ref_no"
                                               value="{{ Request::get('ref_no')}}"/>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label for="created_date" class="control-label">Created Date</label>
                                        <div class="calender-picker-wrap">


                                            <div class="input-group calender-picker">
                                                <input readonly="" type="text" name="date" maxlength="50"
                                                       class="form-control datepicker admin flex-column"
                                                       id="created_date" value="{{ Request::get('date') }}">
                                                <button type="button" class="clear-datepickr" id="clearDate"
                                                        style="display: none" onclick="ClearFields();">x
                                                </button>
                                                <div class="input-group-append">
                                                    <button type="button" class="calender-btn"
                                                            onclick="$('#created_date').click()">
                                                        <img src="/assets/images/calendar-reversed.svg"
                                                             alt="Datepicker">
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <script>
                                        var future = new Date();

                                        var picker = new Pikaday(
                                            {
                                                field: document.getElementById('created_date'),
                                                firstDay: 1,
                                                maxDate: new Date(),
                                                format: 'YYYY-MM-DD',
                                            });

                                        function ClearFields() {
                                            document.getElementById("created_date").value = "";
                                            $("#clearDate").hide();
                                        }

                                        if (!$('#created_date').val()) {
                                            $('#clearDate').hide();
                                        }
                                        else {
                                            $('#clearDate').show();
                                        }

                                        $("#created_date").change(function () {
                                            if ($(this).val()) {
                                                $("#clearDate").show();
                                            }
                                            else {
                                                $("#clearDate").hide();
                                            }
                                        });

                                    </script>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label for="time" class="control-label">Time</label>
                                        <input class="form-control" id="time" type="text" name="time"
                                               value="{{ Request::get('time')}}"/>
                                    </div>
                                </div>
                                @if(!checkRoleForBlade([ROLE_DOCTOR, ROLE_PATIENT]))
                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label for="doctor" class="control-label">Doctor</label>
                                        <select name="doctor_id" class="form-control" id="doctor_id">
                                            <option value=""></option>
                                            @foreach($doctors as $doctor)
                                                <option value="{{ $doctor->id }}" {{ Request::get('doctor_id') == $doctor->id ? 'selected' : '' }}>{{ $doctor->first_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label for="patient" class="control-label">Patient</label>
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
                            <button type="submit" class="btn btn-primary" value="" id="btn-search">
                                <span class="fa fa-search"></span> Search
                            </button>
                            <a href="{{route('appointments.list')}}" class="btn btn-link">Clear search</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-grid">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">Appointments</div>
                          @if (checkRoleForBlade([ROLE_ADMIN, ROLE_PATIENT]))
                            <nav class="card-header-actions">
                                <a href="{{ route('appointments.create') }}" class="btn btn-success">{{'Add a new Appointment'}}</a>
                            </nav>
                          @endif
                    </div>
                    <div class="card-body collapse show" id="card1">
                        <div class="table-responsive-md">
                        <table class="table table-actions table-striped table-hover mb-0" data-table>
                            <thead>
                            <tr>
                                <th scope="col">Reference No</th>
                                @if(!checkRoleForBlade([ROLE_PATIENT]))<th scope="col">Patient Name</th>@endif
                                @if(!checkRoleForBlade([ROLE_DOCTOR]))<th scope="col">Doctor Name</th>@endif
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($appointments->count() > 0)
                                @foreach ($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->ref_no}}</td>
                                        @if(!checkRoleForBlade([ROLE_PATIENT]))<td>{{ getPatientNameById($appointment->patient_id) }}</td>@endif
                                        @if(!checkRoleForBlade([ROLE_DOCTOR]))<td>{{ getDoctorNameById($appointment->doctor_id)}}</td>@endif
                                        <td>{{ $appointment->date}}</td>
                                        <td>{{ $appointment->time}}</td>
                                        <td>
                                            <a href="{{ route("download.appointment", [$appointment->id]) }}"
                                               class="btn btn-sm btn-primary">{{'Download'}} </a>

                                            <form method="POST" action="{{route("appointments.destroy", $appointment->id)}}" accept-charset="UTF-8" style="display: inline-block;" onsubmit="return confirm('Are You sure you want to delete the appointment {{ '"'.$appointment->id.'"'}}?');">
                                                {{method_field("DELETE")}}
                                                {{csrf_field()}}
                                                <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td scope="col" colspan="12" class="text-center">{{trans('No entries in table.')}}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-12">
                                @include('layouts.partials.admin-pagination', ['result' => $appointments])
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var dt = new Date();
            var time = dt.getHours();

            jQuery('#time').timepicker({
                timeFormat: 'h:mm p',
                interval: 15,
                minTime: '10',
                maxTime: '11:00pm',
                defaultTime: time,
                startTime: '8:00',
                dynamic: true,
                dropdown: true,
                scrollbar: true
            });
        </script>
    </div>
@stop

@section('javascript')
@endsection
