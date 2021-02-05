@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('layouts.admin.admin-breadcrumb',['breadcrumbs' => [['name' => 'Profile', 'url' =>route('profile')],['name' => 'Password', 'url' =>'']]])

        <div class="pb-3">
            <h1>My profile</h1>
        </div>

        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link" href="{{route('profile')}}"><span class="icon profile"></span> <span>Profile</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#password"><span class="icon password"></span> <span>Password</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('change.email')}}"><span class="icon email"></span> <span>Email Settings</span></a>
            </li>
        </ul>

        <div class="tab-content">
        <div class="row tab-pane active" id="password" role="tabpanel">
            <div class="col">
                <div class="card mb-grid">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">Change your password</div>
                    </div>
                    <div class="card-body collapse show" id="card1">
                        <form method="POST" action="{{route('password.update')}}">
                            {{csrf_field()}}
                            {{ method_field('PUT') }}

                            <div class="card shadow-sm mb-4" style="max-width: 40em">
                                <div class="card-body">


                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="current_password" class="control-label">Current Password <span class="text-danger">*</span></label>
                                            <input type="password" name="current_password" class="form-control" id="current_password" value="{{ old('current_password') }}" maxlength="50">
                                            @if ($errors->has('current_password'))
                                                <span class="text-danger">{{ $errors->first('current_password') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="password" class="control-label">New Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}" maxlength="50">
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="password_confirmation" class="control-label">Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="{{ old('password_confirmation') }}" maxlength="50">
                                            @if ($errors->has('password_confirmation'))
                                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer">
                                    <input class="btn btn-lg btn-success" type="submit" value="Save">
                                    <a class="btn btn-lg btn-danger" href="{{ route('admin.dashboard') }}" >Cancel</a>
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