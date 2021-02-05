@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('layouts.admin.admin-breadcrumb',['breadcrumbs' => [['name' => 'Inquiry', 'url' => '']]])
        <div class="pb-3">
            <h1>Manage Website Inquiries </h1>
        </div>
        @if (checkRoleForBlade([ROLE_ADMIN, ROLE_PATIENT]))
            <div class="row">
                <div class="col">
                    <div class="alert alert-warning" role="alert">
                        <form method="get">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-auto">
                                        <div class="form-group">
                                            <label for="name" class="control-label">Name</label>
                                            <input class="form-control" id="name" type="text" name="name"
                                                   value="{{ Request::get('name')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div class="form-group">
                                            <label for="email" class="control-label">Email</label>
                                            <input class="form-control" id="email" type="text" name="phone"
                                                   value="{{ Request::get('email')}}"/>
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
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group mt-2">
                                        <label for="status" class="control-label"><input class="ml-0 mt-1" type="checkbox" name="duplicate_contact" {{(Request::get('duplicate_contact')) ? 'checked' : ''}} value="1"> Remove duplicate contact</label>
                                    </div>
                                </div>

                            </div>
                            <div class="panel-footer">
                                <button type="submit" class="btn btn-primary" value="" id="btn-search"><span
                                            class="fa fa-search"></span> Search
                                </button>
                                <a href="{{route('admin.inquiry.list')}}" class="btn btn-link">Clear search</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card mb-grid">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">Inquiries</div>
                    </div>
                    @if (checkRoleForBlade([ROLE_ADMIN, ROLE_PATIENT]))
                        <div class="card-body collapse show" id="card1">
                            <div class="table-responsive-md">
                                <table class="table table-actions table-striped table-hover mb-0" data-table>
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Created Date</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if ($inquiries->count() > 0)
                                        @foreach ($inquiries as $inquiry)
                                            <tr>
                                                <td>{{ str_limit($inquiry->name, 20) }}</td>
                                                <td>{{ str_limit($inquiry->email,30)}}</td>
                                                <td>{{ str_limit($inquiry->message,20)}}</td>
                                                <td> {{ date('Y-m-d', strtotime($inquiry->created_at)) }}</td>
                                                <td>
                                                    <form method="POST"
                                                          action="{{route("admin.inquiry.destroy", $inquiry->id)}}"
                                                          accept-charset="UTF-8" style="display: inline-block;"
                                                          onsubmit="return confirm('Are You sure you want to delete the inquiry {{ '"'.$inquiry->id.'"'}}?');">
                                                        {{method_field("DELETE")}}
                                                        {{csrf_field()}}
                                                        <input class="btn btn-sm btn-danger" type="submit"
                                                               value="Delete">
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
                                        @include('layouts.partials.admin-pagination', ['result' => $inquiries])
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
@endsection
