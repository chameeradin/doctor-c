<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.admin-head')
<body>
<div class="adminx-container">
    <!-- Admin Header -->
@include('layouts.admin.admin-header')
<!-- Side bar -->
@include('layouts.admin.admin-left-sidebar')


<!-- adminx-content-aside -->
    <div class="adminx-content">
        <!-- <div class="adminx-aside">
        </div> -->
        <div class="adminx-main-content">
            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> {{ Session::get('message') }}
                </div>
            @endif
                @if (Session::has('error_message'))
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Warning!</strong> {{ Session::get('error_message') }}
                    </div>
                @endif
            @yield('content')
        </div>
    </div>
</div>
@include('layouts.admin.admin-footer')
</body>
</html>
