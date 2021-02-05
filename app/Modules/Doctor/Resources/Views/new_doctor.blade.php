@extends('layouts.app_admin')

@section('content')

    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('layouts.admin.admin-breadcrumb',['breadcrumbs' => [['name' => 'Doctor', 'url' =>route('admin.doctor.list')],['name' => 'Create', 'url' =>'']]])

        <div class="pb-3">
            <h1>Doctor</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-grid">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">New Doctor</div>
                    </div>
                    <div class="card-body collapse show" id="card1">

                        @if(!$userList->isEmpty())
                        <form method="POST" action="{{route('admin.doctor.store')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label for="user_id" class="control-label">User List<span class="text-danger"> *</span></label>
                                                <select class="form-control m-bot15" name="user_id">
                                                    <option value="">--Please select--</option>
                                                    @if ($userList->count())
                                                        @foreach($userList as $user)
                                                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected="selected"' : '' }}>{{ $user->first_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @if(isset($errors) && $errors->first('user_id'))
                                                    <span class="text-danger">
                                                      {{$errors->first('user_id')}}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 form-group">
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
                                            <div class="form-group col-md-4">
                                                <label for="phone" class="control-label">Phone</label>
                                                <input  type="text" name="phone" id="phone" class="form-control" placeholder="" value="{{old('phone')}}">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="gender" class="control-label">Gender<span class="text-danger"> *</span></label>
                                                <select name="gender" id="gender" class="form-control select2">
                                                    <option value="">---Select---</option>
                                                    <option value="male" {{ old('gender') =='male' ? 'selected="selected"' : '' }}>Male</option>
                                                    <option value="female" {{ old('gender') =='female' ? 'selected="selected"' : ''}}>Female</option>
                                                </select>
                                                @if(isset($errors) && $errors->first('gender'))
                                                    <span class="text-danger">
                                                      {{$errors->first('gender')}}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="Category" class="control_label">Category<span class="text-danger"> *</span></label>
                                                <select class="form-control m-bot15" name="category">
                                                    <option value=""> Please select</option>
                                                    @if ($categoryList->count())
                                                        @foreach($categoryList as $category)
                                                            <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @if(isset($errors) && $errors->first('category'))
                                                    <span class="text-danger">
                                                      {{$errors->first('category')}}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                    </div>

                                    <div class="panel-footer">
                                        <input class="btn btn-lg btn-success" type="submit" value="{{ 'Save' }}">
                                        <a class="btn btn-lg btn-danger" href="{{route('admin.doctor.list')}}" >Cancel</a>
                                    </div>

                                </div>
                            </div>

                        </form>
                            @else
                            <p class="text-danger">There are no any guest users on system. Please create one first.</p>
                            <a href="{{route('admin.user.create', ['redirect=doctor'])}}" class="btn btn-success">Create User</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
