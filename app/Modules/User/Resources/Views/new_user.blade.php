@extends('layouts.app_admin')

@section('content')

    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('layouts.admin.admin-breadcrumb',['breadcrumbs' => [['name' => 'User', 'url' =>route('admin.user.list')],['name' => 'Create', 'url' =>'']]])

        <div class="pb-3">
            <h1>User</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-grid">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">New User</div>
                    </div>
                    <div class="card-body collapse show" id="card1">

                        <form method="POST" action="{{route('admin.user.store')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label for="title" class="control-label">Title </label>
                                                <select name="title" class="custom-select form-control" id="title">
                                                    <option value="">--Please select--</option>
                                                    <option value="Mr" {{ old('title') == 'Mr' ? 'selected="selected"' : '' }}>Mr</option>
                                                    <option value="Mrs" {{ old('title') == 'Mrs' ? 'selected="selectedemail_addresss"' : '' }}>Mrs</option>
                                                    <option value="Miss" {{ old('title') == 'Miss' ? 'selected="selected"' : '' }}>Miss</option>
                                                    <option value="Ms" {{ old('title') == 'Ms' ? 'selected="selected"' : '' }}>Ms</option>
                                                </select>
                                                @if ($errors->has('title'))
                                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label for="first_name" class="control-label">First Name<span class="text-danger"> *</span></label>
                                                <input  type="text" name="first_name" id="first_name" class="form-control" placeholder="" value="{{old('first_name')}}">
                                                @if(isset($errors) && $errors->first('first_name'))
                                                    <span class="text-danger">
                                                      {{$errors->first('first_name')}}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label for="last_name" class="control-label">Last Name</label>
                                                <input  type="text" name="last_name" id="last_name" class="form-control" placeholder="" value="{{old('last_name')}}">
                                                @if(isset($errors) && $errors->first('last_name'))
                                                    <span class="text-danger">
                                                      {{$errors->first('last_name')}}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="email" class="control-label">Email<span class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="" value="{{old('email')}}">
                                                @if(isset($errors) && $errors->first('email'))
                                                    <span class="text-danger">
                                                        {{$errors->first('email')}}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="password" class="control-label">Password<span class="text-danger"> *</span></label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="" value="{{old('password')}}">
                                                @if(isset($errors) && $errors->first('password'))
                                                    <span class="text-danger">
                                                    {{$errors->first('password')}}
                                                </span>
                                                @endif
                                            </div>
                                            <input type="hidden" name="role_id" value="{{GUEST_ROLE_ID}}">
                                            <input type="hidden" name="redirect" value="{{isset($redirectUrl) ? $redirectUrl : route('admin.user.list')}}">
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <input class="btn btn-lg btn-success" type="submit" value="{{ 'Save' }}">
                                        <a class="btn btn-lg btn-danger" href="{{route('admin.user.list')}}" >Cancel</a>
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
