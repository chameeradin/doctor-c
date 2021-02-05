@extends('layouts.app_admin')

@section('content')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('layouts.admin.admin-breadcrumb',['breadcrumbs' => [['name' => 'Record', 'url' =>route('admin.record.list')],['name' => 'Create', 'url' =>'']]])

        <div class="pb-3">
            <h1>Record</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-grid">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">New Record</div>
                    </div>
                    <div class="card-body collapse show" id="card1">

                        <form method="POST" action="{{route('admin.record.store')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="name">Record Name<span class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{old('name')}}">
                                                @if(isset($errors) && $errors->first('name'))
                                                    <span class="text-danger">
                                                      {{$errors->first('name')}}
                                                    </span>
                                                @endif
                                            </div>
                                            @if(checkRoleForBlade([ROLE_ADMIN]))
                                            <div class="col-md-6 form-group">
                                                <label for="doctor_id" class="control-label">Doctor Name<span class="text-danger"> *</span></label>
                                                <select class="form-control m-bot15" name="doctor_id">
                                                    <option value=""> Please select</option>
                                                    @if ($doctorList->count())
                                                        @foreach($doctorList as $doctor)
                                                            <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected="selected"' : '' }}>{{ ($doctor->first_name) }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @if(isset($errors) && $errors->first('doctor_id'))
                                                    <span class="text-danger">
                                                      {{$errors->first('doctor_id')}}
                                                    </span>
                                                @endif
                                            </div>
                                            @endif
                                        @if(checkRoleForBlade([ROLE_DOCTOR]))
                                                <input value="{{Auth::user()->doctor->id}}" type="hidden" name="doctor_id">
                                            @endif
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="date" class="control-label">Date<span class="text-danger"> *</span></label>
                                                <input class="form-control" id="date" type="text" name="date" value="{{ Request::get('date')}}" readonly/>
                                                @if(isset($errors) && $errors->first('date'))
                                                    <span class="text-danger">
                                                {{$errors->first('date')}}
                                              </span>
                                                @endif
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="time">Time<span class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" id="time" name="time" placeholder="" value="{{old('time')}}">
                                                @if(isset($errors) && $errors->first('time'))
                                                    <span class="text-danger">
                                                  {{$errors->first('time')}}
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-md-4 form-group">
                                              <label for="limit" class="control-label">Limit<span class="text-danger"> *</span></label>
                                              <input  type="text" name="limit" id="limit" class="form-control" placeholder="" value="{{old('limit')}}">
                                              @if(isset($errors) && $errors->first('limit'))
                                                  <span class="text-danger">
                                                    {{$errors->first('limit')}}
                                                  </span>
                                              @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <input class="btn btn-lg btn-success" type="submit" value="{{ 'Save' }}">
                                        <a class="btn btn-lg btn-danger" href="{{route('admin.record.list')}}" >Cancel</a>
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
