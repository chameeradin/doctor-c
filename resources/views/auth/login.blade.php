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
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
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
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-block btn-primary">Login</button>
                </form>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-link" href="#">
                    Forgot Your Password?
                </a>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-link" href="{{route('register')}}">
                    Don't have account?
                </a>
            </div>
        </div>
    </div>
</div>

@include('layouts.admin.admin-footer')
</body>
</html>