@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('layouts.admin.admin-breadcrumb',['breadcrumbs' => [['name' => 'Patient', 'url' =>route('admin.patient.list')],['name' => 'Edit', 'url' =>'']]])

        <div class="pb-3">
            <h1>Patient</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-grid">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">Edit Patient</div>
                    </div>
                    <div class="card-body collapse show" id="card1">
                        <form method="POST" action="{{route('admin.patient.update', ['id' => $patient->id])}}"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{ method_field('PUT') }}
                            <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="title" class="control-label">Title </label>
                                                    <select name="title" class="custom-select form-control" id="title">
                                                        <option value="">--Please select--</option>
                                                        <option value="Mr" {{ old('title') == 'Mr' ? 'selected': $patient->title == 'Mr' ? 'selected': '' }}>Mr</option>
                                                        <option value="Mrs" {{ old('title') == 'Mrs' ? 'selected': $patient->title == 'Mrs' ? 'selected': '' }}>Mrs</option>
                                                        <option value="Miss" {{ old('title') == 'Miss' ? 'selected': $patient->title == 'Miss' ? 'selected': '' }}>Miss</option>
                                                        <option value="Ms" {{ old('title') == 'Ms' ? 'selected': $patient->title == 'Ms' ? 'selected': '' }}>Ms</option>

                                                    </select>
                                                    @if ($errors->has('title'))
                                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="first_name" class="control-label">First Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="first_name" class="form-control" id="first_name" value="{{ old('first_name', $patient->first_name) }}" maxlength="50">
                                                    @if ($errors->has('first_name'))
                                                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="last_name" class="control-label">Last Name </label>
                                                    <input type="text" name="last_name" class="form-control" id="last_name" value="{{ old('last_name', $patient->last_name) }}" maxlength="50">
                                                    @if ($errors->has('last_name'))
                                                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="p_phone" class="control-label">Phone</label>
                                                <input type="text" class="form-control" id="p_phone" name="p_phone"
                                                       value="{{old('p_phone', $patient->phone)}}">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="p_gender" class="control-label">Gender<span
                                                            class="text-danger"> *</span></label>
                                                <select name="p_gender" id="p_gender" class="form-control select2">
                                                    <option value="">---Select---</option>
                                                    <option value="male" {{ old('p_gender', $patient->gender) =='male' ? 'selected="selected"' : '' }}>
                                                        Male
                                                    </option>
                                                    <option value="female" {{ old('p_gender', $patient->gender) == 'female' ? 'selected="selected"' : ''}}>
                                                        Female
                                                    </option>
                                                </select>
                                                @if(isset($errors) && $errors->first('p_gender'))
                                                    <span class="text-danger">
                                            {{$errors->first('p_gender')}}
                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="age" class="control-label">Age<span
                                                            class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" id="age" name="age"
                                                       placeholder="" value="{{old('age', $patient->age)}}">
                                                @if(isset($errors) && $errors->first('age'))
                                                    <span class="text-danger">
                                          {{$errors->first('age')}}
                                      </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="user_id" value="{{$patient->user_id}}">
                                    <div class="panel-footer">
                                        <input class="btn btn-lg btn-success" type="submit" value="{{ 'Save' }}">
                                        <a class="btn btn-lg btn-danger" href="/admin/patients">Cancel</a>
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
