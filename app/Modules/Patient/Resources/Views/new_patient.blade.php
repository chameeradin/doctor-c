@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('layouts.admin.admin-breadcrumb',['breadcrumbs' => [['name' => 'Patient', 'url' =>route('admin.patient.list')],['name' => 'Create', 'url' =>'']]])

        <div class="pb-3">
            <h1>Patient</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-grid">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">New Patient</div>
                    </div>
                    <div class="card-body collapse show" id="card1">
                        @if(!$userList->isEmpty())
                        <form method="POST" action="{{route('admin.patient.store')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="user_id" class="control-label">User List<span class="text-danger"> *</span></label>
                                                <select class="form-control m-bot15" name="user_id">
                                                    <option value=""> Please select</option>
                                                    @if ($userList->count())
                                                        @foreach($userList as $user)
                                                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected="selected"' : '' }}>{{ $user->first_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="title" class="control-label">Title </label>
                                                <select name="title" class="custom-select form-control" id="title">
                                                    <option value="">--Please select--</option>
                                                    <option value="Mr" {{ old('title') == 'Mr' ? 'selected="selected"' : '' }}>Mr</option>
                                                    <option value="Mrs" {{ old('title') == 'Mrs' ? 'selected="selected"' : '' }}>Mrs</option>
                                                    <option value="Miss" {{ old('title') == 'Miss' ? 'selected="selected"' : '' }}>Miss</option>
                                                    <option value="Ms" {{ old('title') == 'Ms' ? 'selected="selected"' : '' }}>Ms</option>
                                                </select>
                                                @if ($errors->has('title'))
                                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="first_name" class="control-label">First Name<span class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" value="{{old('first_name')}}">
                                                @if(isset($errors) && $errors->first('first_name'))
                                                    <span class="text-danger">
                                              {{$errors->first('first_name')}}
                                          </span>
                                                @endif
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="last_name" class="control-label">Last Name</label>
                                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="" value="{{old('first_name')}}">
                                                @if(isset($errors) && $errors->first('last_name'))
                                                    <span class="text-danger">
                                              {{$errors->first('last_name')}}
                                          </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="p_phone" class="control-label">Phone</label>
                                                <input type="text" class="form-control" id="p_phone" name="p_phone" value="{{old('p_phone')}}">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="p_gender" class="control-label">Gender<span class="text-danger"> *</span></label>
                                                <select name="p_gender" id="p_gender" class="form-control select2">
                                                    <option value="">---Select---</option>
                                                    <option value="male" {{ old('p_gender') =='male' ? 'selected="selected"' : '' }}>Male</option>
                                                    <option value="female" {{ old('p_gender') =='female' ? 'selected="selected"' : ''}}>Female</option>
                                                </select>
                                                @if(isset($errors) && $errors->first('p_gender'))
                                                    <span class="text-danger">
                                            {{$errors->first('p_gender')}}
                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="age" class="control-label">Age<span class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" id="age" name="age" placeholder="" value="{{old('age')}}">
                                                @if(isset($errors) && $errors->first('age'))
                                                    <span class="text-danger">
                                          {{$errors->first('age')}}
                                      </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <input class="btn btn-lg btn-success" type="submit" value="{{ 'Save' }}">
                                        <a class="btn btn-lg btn-danger" href="{{route('admin.patient.list')}}" >Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @else
                            <p class="text-danger">There are no any guest users on system. Please create one first.</p>
                            <a href="{{route('admin.user.create', ['redirect=patient'])}}" class="btn btn-success">Create User</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
