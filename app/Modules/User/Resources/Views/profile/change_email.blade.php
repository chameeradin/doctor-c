@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <!-- BreadCrumb -->
        @include('layouts.admin.admin-breadcrumb',['breadcrumbs' => [['name' => 'Profile', 'url' =>route('profile')],['name' => 'Email', 'url' =>'']]])

        <div class="pb-3">
            <h1>My profile</h1>
        </div>

        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link" href="{{route('profile')}}"><span class="icon profile"></span> <span>Profile</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('change.password')}}"><span class="icon email"></span> <span>Password</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#email"><span class="icon email"></span> <span>Email</span></a>
            </li>
        </ul>

        <div class="tab-content">
        <div class="row tab-pane active" id="email" role="tabpanel">
            <div class="col">
                <div class="card mb-grid">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-header-title">Change your email</div>
                    </div>
                    <div class="card-body collapse show" id="card1">
                        <form method="POST" action="{{route('email.update')}}"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{ method_field('PUT') }}

                            <div class="card shadow-sm mb-4" style="max-width: 40em">
                                <div class="card-body">


                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="current_email" class="control-label">Current Email</label>
                                            <input type="email" name="current_email" class="form-control" id="current_email" value="{{ $user->email }}" readonly>
                                            @if ($errors->has('current_email'))
                                                <span class="text-danger">{{ $errors->first('current_email') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="email" class="control-label">New Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" maxlength="50">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
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