<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.admin-head')
<body>
<div class="adminx-container d-flex justify-content-center align-items-center">
    <div class="page-login">
        <div class="text-center">
            <a class="navbar-brand mb-4 h1" href="/">
                <img src="/assets/images/logo.png" class="navbar-brand-image d-inline-block align-top mr-2" alt="">
                Arogya
            </a>
        </div>

        <div class="card mb-0">
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1" class="form-label">Name</label>
                        <input id="name" type="name" class="form-control" name="first_name" value="{{ old('first_name') }}">

                        @if ($errors->has('first_name'))
                            <span class="help-block text-danger">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleDropdownFormEmail1" class="form-label">Email address</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormPassword1" class="form-label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block text-danger">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-sm btn-block btn-primary">Register</button>
                </form>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-link" href="{{route('login')}}">
                    Already have account?
                </a>
            </div>
        </div>
    </div>
</div>

@include('layouts.admin.admin-footer')
</body>
</html>