@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('layouts.admin.admin-breadcrumb',['breadcrumbs' => [['name' => 'Patient', 'url' =>'']]])

        <div class="pb-3">
            <h1>Manage Patient</h1>
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
                                        <input class="form-control" id="ref_no" type="text" name="ref_no"
                                               value="{{ Request::get('ref_no')}}"/>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label for="first_name" class="control-label">First Name</label>
                                        <input class="form-control" id="first_name" type="text" name="first_name"
                                               value="{{ Request::get('first_name')}}"/>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label for="last_name" class="control-label">Last Name</label>
                                        <input class="form-control" id="last_name" type="text" name="last_name"
                                               value="{{ Request::get('last_name')}}"/>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label for="phone" class="control-label">Phone</label>
                                        <input class="form-control" id="phone" type="text" name="phone"
                                               value="{{ Request::get('phone')}}"/>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label for="gender" class="control-label">Gender</label>
                                        <select name="gender" id="gender" class="form-control select2">
                                            <option value=""></option>
                                            <option value="male" {{ Request::get('gender') =='male' ? 'selected="selected"' : '' }}>
                                                Male
                                            </option>
                                            <option value="female" {{  Request::get('gender') =='female' ? 'selected="selected"' : ''}}>
                                                Female
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="form-group">
                                        <label for="age" class="control-label">Age</label>
                                        <input class="form-control" id="age" type="text" name="age"
                                               value="{{ Request::get('age')}}"/>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary" value="" id="btn-search"><span
                                        class="fa fa-search"></span> Search
                            </button>
                            <a href="{{route('admin.patient.list')}}" class="btn btn-link">Clear search</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-grid">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">Patients</div>
                        @if (checkRoleForBlade([ROLE_ADMIN,ROLE_DOCTOR]))
                            <nav class="card-header-actions">
                                <a href="{{ route('admin.patient.create') }}"
                                   class="btn btn-success">{{'Add a new Patient'}}</a>
                            </nav>
                        @endif
                    </div>
                    <div class="card-body collapse show" id="card1">
                        <div class="table-responsive-md">
                            <table class="table table-actions table-striped table-hover mb-0" data-table>
                                <thead>
                                <tr>
                                    <th scope="col">Reference No</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if ($patients->count() > 0)
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td>{{ $patient->ref_no}}</td>
                                            <td>{{ $patient->first_name }}</td>
                                            <td>{{ $patient->last_name }}</td>
                                            <td>{{ $patient->phone}}</td>
                                            <td>{{ $patient->gender}}</td>
                                            <td>{{ $patient->age}}</td>
                                            <td>
                                                <a href="{{ route('admin.patient.edit',[$patient->id]) }}"
                                                   class="btn btn-sm btn-primary">{{'Edit'}}</a>
                                                @if(!count($patient->appointment))
                                                <form method="POST"
                                                      action="{{route("admin.patient.destroy", $patient->id)}}"
                                                      accept-charset="UTF-8" style="display: inline-block;"
                                                      onsubmit="return confirm('Are You sure you want to delete the patient {{ '"'.$patient->first_name.'"'}}?');">
                                                    {{method_field("DELETE")}}
                                                    {{csrf_field()}}
                                                    <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                                </form>
                                                    @endif
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
                                    @include('layouts.partials.admin-pagination', ['result' => $patients])
                                </div>
                            </div>
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

        </script>
@endsection
