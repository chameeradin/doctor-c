@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('layouts.admin.admin-breadcrumb',['breadcrumbs' => [['name' => 'Doctor', 'url' =>route('admin.doctor.list')],['name' => 'Edit', 'url' =>'']]])

        <div class="pb-3">
            <h1>Doctor</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-grid">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">Edit Doctor</div>

                    </div>
                    <div class="card-body collapse show" id="card1">
                        <form method="POST" action="{{route('admin.doctor.update', ['id' => $doctor->id])}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{ method_field('PUT') }}
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label for="title" class="control-label">Title </label>
                                                <select name="title" class="custom-select form-control" id="title">
                                                    <option value="">--Please select--</option>
                                                    <option value="Mr" {{ old('title') == 'Mr' ? 'selected': $doctor->title == 'Mr' ? 'selected': '' }}>Mr</option>
                                                    <option value="Mrs" {{ old('title') == 'Mrs' ? 'selected': $doctor->title == 'Mrs' ? 'selected': '' }}>Mrs</option>
                                                    <option value="Miss" {{ old('title') == 'Miss' ? 'selected': $doctor->title == 'Miss' ? 'selected': '' }}>Miss</option>
                                                    <option value="Ms" {{ old('title') == 'Ms' ? 'selected': $doctor->title == 'Ms' ? 'selected': '' }}>Ms</option>

                                                </select>
                                                @if ($errors->has('title'))
                                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label for="first_name" class="control-label">First Name<span class="text-danger"> *</span></label>
                                                <input  type="text" name="first_name" id="first_name" class="form-control" placeholder="" value="{{old('first_name', $doctor->first_name)}}">
                                                @if(isset($errors) && $errors->first('first_name'))
                                                    <span class="text-danger">
                                                      {{$errors->first('first_name')}}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label for="last_name" class="control-label">Last Name<span class="text-danger"> *</span></label>
                                                <input  type="text" name="last_name" id="last_name" class="form-control" placeholder="" value="{{old('last_name', $doctor->last_name)}}">
                                                @if(isset($errors) && $errors->first('last_name'))
                                                    <span class="text-danger">
                                                      {{$errors->first('last_name')}}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="Phone">Phone</label>
                                                <input type="text" class="form-control" id="Phone" placeholder="Phone" name="phone" value="{{old('phone', $doctor->phone)}}">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="gender" class="control-label">Gender<span class="text-danger"> *</span></label>
                                                <select name="gender" id="gender" class="form-control select2">
                                                    <option value="">---Select---</option>
                                                    <option value="male" {{ old('gender', $doctor->gender) =='male' ? 'selected="selected"' : '' }}>Male</option>
                                                    <option value="female" {{ old('gender') ==  $doctor->gender ? 'selected="selected"' : ''}}>Female</option>
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
                                                            <option value="{{ $category->id }}" {{ old('category', $doctor->category_id) == $category->id ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
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
                                    <input type="hidden" name="user_id" value="{{$doctor->user_id}}">
                                    <div class="panel-footer">
                                        <input class="btn btn-lg btn-success" type="submit" value="{{ 'Save' }}">
                                        <a class="btn btn-lg btn-danger" href="{{route('admin.doctor.list')}}" >Cancel</a>
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
