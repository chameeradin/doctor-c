<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>


<body class="hold-transition skin-blue sidebar-mini">

@include('partials.topbar')

<!-- Content Wrapper. Contains page content -->
<div class="d-flex" id="wrapper">
    <div class="container-fluid main-container">
        <div class="col-md-2 sidebar">
            <div class="row">
                <!-- uncomment code for absolute positioning tweek see top comment in css -->
                <div class="absolute-wrapper"></div>
                <!-- Menu -->
                @include('partials.sidebar')
            </div>
        </div>
        <div class="col-md-10 content">
            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> {{ Session::get('message') }}
                </div>
            @endif
            @yield('content')
        </div>
    </div>

</div>

@include('partials.javascripts')
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
</body>
</html>
