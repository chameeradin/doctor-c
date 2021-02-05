@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('layouts.admin.admin-breadcrumb',['breadcrumbs' => [['name' => 'Profile', 'url' => '']]])

        <div class="pb-3">
            <h1>My profile</h1>
        </div>

        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#profile"><span class="icon profile"></span> <span>Profile</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('change.password')}}"><span class="icon password"></span> <span>Password</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('change.email')}}"><span class="icon email"></span> <span>Email Settings</span></a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="row tab-pane active" id="profile" role="tabpanel">
                <div class="col">
                    <div class="card mb-grid">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="card-header-title">Edit Prifile</div>
                        </div>
                        <div class="card-body collapse show" id="card1">
                            <form method="POST" action="{{route('profile.update', ['id' => $user->id])}}"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{ method_field('PUT') }}

                                <div class="card shadow-sm mb-4" style="max-width: 40em">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label for="title" class="control-label">Title</label>
                                                <select name="title" class="custom-select form-control"
                                                        id="title">
                                                    <option value="">--Please select--</option>
                                                    <option value="Mr" {{ old('title') == 'Mr' ? 'selected': $user->title == 'Mr' ? 'selected': '' }}>
                                                        Mr
                                                    </option>
                                                    <option value="Mrs" {{ old('title') == 'Mrs' ? 'selected': $user->title == 'Mrs' ? 'selected': '' }}>
                                                        Mrs
                                                    </option>
                                                    <option value="Miss" {{ old('title') == 'Miss' ? 'selected': $user->title == 'Miss' ? 'selected': '' }}>
                                                        Miss
                                                    </option>
                                                    <option value="Ms" {{ old('title') == 'Ms' ? 'selected': $user->title == 'Ms' ? 'selected': '' }}>
                                                        Ms
                                                    </option>

                                                </select>
                                                @if ($errors->has('title'))
                                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label for="first_name" class="control-label">First Name <span class="text-danger">*</span></label>
                                                <input type="text" name="first_name" class="form-control" id="first_name" value="{{ old('first_name', $user->first_name) }}" maxlength="50">
                                                @if ($errors->has('first_name'))
                                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label for="last_name" class="control-label">Last Name</label>
                                                <input type="text" name="last_name" class="form-control" id="last_name" value="{{ old('last_name', $user->last_name) }}" maxlength="50">
                                                @if ($errors->has('last_name'))
                                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        @if(!checkRoleForBlade([ROLE_ADMIN]))
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label for="phone" class="control-label">Phone Number <span class="text-danger">*</span></label>
                                                <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone', $userDetails->phone) }}" maxlength="50">
                                                @if ($errors->has('phone'))
                                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label for="gender" class="control-label">Gender <span class="text-danger">*</span></label>
                                                <select name="gender" id="gender" class="form-control select2">
                                                    <option value="">---Select---</option>
                                                    <option value="male" {{ old('gender', $userDetails->gender) =='male' ? 'selected="selected"' : '' }}>
                                                        Male
                                                    </option>
                                                    <option value="female" {{ old('gender', $userDetails->gender) == 'female' ? 'selected="selected"' : ''}}>
                                                        Female
                                                    </option>
                                                </select>
                                                @if ($errors->has('gender'))
                                                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        @if(checkRoleForBlade([ROLE_PATIENT]))
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label for="age" class="control-label">Age <span class="text-danger">*</span></label>
                                                <input type="text" name="age" class="form-control" id="age" value="{{ old('gender', $userDetails->age) }}" maxlength="50">
                                                @if ($errors->has('age'))
                                                    <span class="text-danger">{{ $errors->first('age') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                    </div>
                                    <div class="card-footer">
                                        <input class="btn btn-lg btn-success" type="submit" value="Save">
                                        <a class="btn btn-lg btn-danger" href="{{ route('profile') }}" >Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection