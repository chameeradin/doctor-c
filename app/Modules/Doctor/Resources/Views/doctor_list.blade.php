@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('layouts.admin.admin-breadcrumb',['breadcrumbs' => [['name' => 'Doctor', 'url' =>'']]])

        <div class="pb-3">
            <h1>Manage Doctors</h1>
        </div>
        @if (checkRoleForBlade([ROLE_ADMIN]))
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
                                            <label for="category" class="control-label">Category</label>
                                            <select name="category" class="form-control" id="category">
                                                <option value=""></option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ Request::get('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="submit" class="btn btn-primary" value="" id="btn-search"><span
                                            class="fa fa-search"></span> Search
                                </button>
                                <a href="{{route('admin.doctor.list')}}" class="btn btn-link">Clear search</a>
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
                        <div class="card-header-title">Doctors</div>
                        @if (checkRoleForBlade([ROLE_ADMIN]))
                            <nav class="card-header-actions">
                                <a href="{{ route('admin.doctor.create') }}"
                                   class="btn btn-success">{{'Add a new Doctor'}}</a>
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
                                    <th scope="col">Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if ($doctors->count() > 0)
                                    @foreach ($doctors as $doctor)
                                        <tr>
                                            <td>{{ $doctor->ref_no}}</td>
                                            <td>{{ $doctor->first_name }}</td>
                                            <td>{{ $doctor->last_name }}</td>
                                            <td>{{ $doctor->phone }}</td>
                                            <td>{{ $doctor->gender }}</td>
                                            <td>{{ \App\Category::getCategoryNameById($doctor->category_id)}}</td>
                                            <td>
                                                <a href="{{ route('admin.doctor.edit',[$doctor->id]) }}"
                                                   class="btn btn-sm btn-primary">{{'Edit'}}</a>
                                                @if(!count($doctor->record))
                                                <form method="POST"
                                                      action="{{route("admin.doctor.destroy", $doctor->id)}}"
                                                      accept-charset="UTF-8" style="display: inline-block;"
                                                      onsubmit="return confirm('Are You sure you want to delete the doctor {{ '"'.$doctor->first_name.'"'}}?');">
                                                    {{method_field("DELETE")}}
                                                    {{csrf_field()}}
                                                    <input class="btn btn-sm btn-danger" type="submit"
                                                           value="Delete">
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
                                    @include('layouts.partials.admin-pagination', ['result' => $doctors])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop

@section('javascript')
@endsection
