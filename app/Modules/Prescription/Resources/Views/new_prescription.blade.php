@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('layouts.admin.admin-breadcrumb',['breadcrumbs' => [['name' => 'Prescription', 'url' =>route('admin.prescription.list')],['name' => 'Create', 'url' =>'']]])

        <div class="pb-3">
            <h1>Prescription</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-grid">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">New Prescription</div>
                    </div>
                    <div class="card-body collapse show" id="card1">
                            <form method="POST" action="{{route('admin.prescription.store')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="col-md-10">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="appointment_id" class="control-label">Appointment No</label>
                                                    <select name="appointment_id" class="form-control" id="appointment_id">
                                                        <option value=""></option>
                                                        @if ($appointmentList->count())
                                                            @foreach($appointmentList as $appointment)
                                                                <option value="{{ $appointment->id }}" {{ old('appointment_id') == $appointment->id ? 'selected="selected"' : '' }}>{{ $appointment->id }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @if(isset($errors) && $errors->first('appointment_id'))
                                                        <span class="text-danger">
                                                            {{$errors->first('appointment_id')}}
                                                        </span>
                                                    @endif
                                                </div>
                                                @if(!checkRoleForBlade([ROLE_DOCTOR]))
                                                <div class="form-group col-md-4">
                                                    <label for="doctor" class="control-label">Doctor Name<span class="text-danger"> *</span></label>
                                                    <select class="form-control m-bot15" name="doctor_id">
                                                        <option value=""> Please Select</option>
                                                        @if ($doctorList->count())
                                                            @foreach($doctorList as $doctor)
                                                                <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected="selected"' : '' }}>{{ $doctor->first_name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @if(isset($errors) && $errors->first('doctor_id'))
                                                        <span class="text-danger">
                                                  {{$errors->first('doctor_id')}}
                                                </span>
                                                    @endif
                                                </div>
                                                @else
                                                    <input type="hidden" name="doctor_id" value="{{Auth::user()->doctor->id}}">
                                                @endif

                                                <div class="form-group col-md-4">
                                                    <label for="patient_id" class="control-label">Patient Name</label>
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
                                                    {{--<script>--}}
                                                        {{--$('select[name="id]').on('change',function()--}}
                                                        {{--{--}}
                                                            {{--var selectedAppointmentId=$(this).val();--}}
                                                            {{--$.ajax({--}}
                                                                {{--url:'/prescription/appointment-details'+selectedAppointmentId,--}}
                                                                {{--type:'GET',--}}
                                                                {{--dataType:'json',--}}
                                                                {{--success: function (response) {--}}
                                                                    {{--if(response.status == true){--}}
                                                                        {{--$("#patient_id").val(response.data.patient_id);--}}
                                                                    {{--}--}}
                                                                {{--},--}}
                                                                {{--error:function () {--}}

                                                                {{--}--}}

                                                            {{--});--}}
                                                        {{--});--}}
                                                    {{--</script>--}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="medicine" class="control-label">Medicine<span class="text-danger"> *</span></label>
                                                    <textarea class="form-control" id="medicine" name="medicine" placeholder="" value="{{old('medicine')}}" rows="8"></textarea>
                                                    @if(isset($errors) && $errors->first('medicine'))
                                                        <span class="text-danger">
                                                            {{$errors->first('medicine')}}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <input class="btn btn-lg btn-success" type="submit" value="{{ 'Save' }}">
                                            <a class="btn btn-lg btn-danger" href="{{route('admin.prescription.list')}}" >Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
