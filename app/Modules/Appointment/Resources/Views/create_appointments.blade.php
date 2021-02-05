@extends('layouts.app_admin')

@section('content')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<div class="container-fluid">
    <!-- BreadCrumb -->
    @include('layouts.admin.admin-breadcrumb',['breadcrumbs' => [['name' => 'Appointment', 'url' =>route('appointments.list')],['name' => 'Create', 'url' =>'']]])

    <div class="pb-3">
        <h1>Appointments</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="card mb-grid">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-header-title">New Appointment</div>
                </div>
                <div class="card-body collapse show" id="card1">
                    <form method="POST" action="{{route('appointments.store')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="col-md-10">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        @if(!checkRoleForBlade([ROLE_PATIENT]))
                                            <div class="form-group col-md-6">
                                                <label for="patient" class="control-label">Patient Name<span class="text-danger"> *</span></label>
                                                <select class="form-control m-bot15" name="patient_id">
                                                    <option value=""> Please Select</option>
                                                    @if ($patientList->count())
                                                        @foreach($patientList as $patient)
                                                            <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected="selected"' : '' }}>{{ $patient->first_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @if(isset($errors) && $errors->first('patient_id'))
                                                    <span class="text-danger">
                                                  {{$errors->first('patient_id')}}
                                                </span>
                                                @endif
                                            </div>
                                        @else
                                            <input type="hidden" name="patient_id" value="{{Auth::user()->patient->id}}">
                                        @endif
                                        <div class="form-group col-md-6">
                                              <label for="date" class="control-label">Date<span class="text-danger"> *</span></label>
                                              <input class="form-control" id="date" type="text" name="date" value="{{ Request::get('date')}}" readonly/>
                                            <span class="text-danger" id="date_error"></span>
                                          @if(isset($errors) && $errors->first('date'))
                                              <span class="text-danger">
                                                {{$errors->first('date')}}
                                              </span>
                                          @endif
                                        </div>
                                    </div>

                                    <div class="row">


                                        <div class="form-group col-md-6">
                                            <label for="doctor" class="control-label">Doctor Name<span class="text-danger"> *</span></label>
                                            <select class="form-control m-bot15" name="doctor_id">
                                                <option value=""> Please Select</option>
                                                @if ($doctorList->count())
                                                    @foreach($doctorList as $doctor)
                                                        <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected="selected"' : '' }}>{{ $doctor->first_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <span class="text-danger" id="doctor_error"></span>
                                            @if(isset($errors) && $errors->first('doctor_id'))
                                                <span class="text-danger">
                                                {{$errors->first('doctor_id')}}
                                              </span>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="time">Time<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="time" name="time" placeholder="" value="{{old('time')}}">
                                            @if(isset($errors) && $errors->first('time'))
                                                <span class="text-danger">
                                                  {{$errors->first('time')}}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="record" class="control-label">Records<span class="text-danger"> *</span></label>
                                            <select class="form-control m-bot15" name="record_id">
                                                <option value=""> Please Select</option>

                                            </select>
                                            @if(isset($errors) && $errors->first('record_id'))
                                                <span class="text-danger">
                                                {{$errors->first('record_id')}}
                                              </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-footer">
                                    <input class="btn btn-lg btn-success" type="submit" value="{{ 'Create' }}">
                                    <a class="btn btn-lg btn-danger" href="{{route('appointments.list')}}" >Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
      var picker = new Pikaday(
          {
              field: document.getElementById('date'),
              firstDay: 1,
              format: 'YYYY-MM-DD',
          });
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
@stop
