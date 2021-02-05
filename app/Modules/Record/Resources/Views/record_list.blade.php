@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('layouts.admin.admin-breadcrumb',['breadcrumbs' => [['name' => 'Record', 'url' => '']]])

        <div class="pb-3">
            <h1>Manage Record</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="alert alert-warning" role="alert">
                    <form method="get">
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
                                    <label for="record_name" class="control-label">Record Name</label>
                                    <input class="form-control" id="record_name" type="text" name="record_name"
                                           value="{{ Request::get('record_name')}}"/>
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
                            <div class="col-sm-auto">
                                <div class="form-group">
                                    <label for="limit" class="control-label">Limit</label>
                                    <input class="form-control" id="limit" type="text" name="limit"
                                           value="{{ Request::get('limit')}}"/>
                                </div>
                            </div>

                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary" value="" id="btn-search"><span
                                        class="fa fa-search"></span> Search
                            </button>
                            <a href="{{route('admin.record.list')}}" class="btn btn-link">Clear search</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-grid">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">Records</div>

                        <nav class="card-header-actions">
                            <a href="{{ route('admin.record.create') }}"
                               class="btn btn-success">{{'Add a new Record'}}</a>
                        </nav>
                    </div>
                    <div class="card-body collapse show" id="card1">
                        <div class="table-responsive-md">
                            <table class="table table-actions table-striped table-hover mb-0" data-table>
                                <thead>
                                <tr>
                                    <th scope="col">Reference No</th>
                                    <th scope="col">Record Name</th>
                                    <th scope="col">Doctor</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Limit</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if ($records->count() > 0)
                                    @foreach ($records as $record)
                                        <tr>
                                            <td>{{ $record->id}}</td>
                                            <td>{{ $record->name}}</td>
                                            <td>{{ \App\Doctor::getDoctorNameById($record->doctor_id)}}</td>
                                            <td>{{ $record->date }}</td>
                                            <td>{{ $record->time}}</td>
                                            <td>{{ $record->limit}}</td>
                                            <td>
                                                <a href="{{ route('admin.record.edit',[$record->id]) }}"
                                                   class="btn btn-sm btn-primary">{{'Edit'}}</a>
                                                <form method="POST"
                                                      action="{{route("admin.record.destroy", $record->id)}}"
                                                      accept-charset="UTF-8" style="display: inline-block;"
                                                      onsubmit="return confirm('Are You sure you want to delete the record {{ '"'.$record->id.'"'}}?');">
                                                    {{method_field("DELETE")}}
                                                    {{csrf_field()}}
                                                    <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                                </form>
                                            </td>
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
                                    @include('layouts.partials.admin-pagination', ['result' => $records])
                                </div>
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

@stop

@section('javascript')
@endsection
