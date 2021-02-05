<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $metaTitle or config('app.name', 'DoctorChannel') }}</title>

    <link rel="icon" type="image/icon" href="{{ '/assets/images/favicon.png'}}" />

    <!-- Styles -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="dcare/css/bootstrap.css">
    <link rel="stylesheet" href="dcare/css/themify-icons.css">
    <link rel="stylesheet" href="dcare/css/flaticon.css">
    <link rel="stylesheet" href="dcare/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="dcare/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="dcare/vendors/animate-css/animate.css">
    <!-- main css -->
    <link rel="stylesheet" href="dcare/css/style.css">
    <link rel="stylesheet" href="dcare/css/responsive.css">

    <link href="/css/app.css" rel="stylesheet">
    <script src="/assets/js/jquery.min.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">
    @include('layouts.partials.header')
    @include('common.errors')
    @yield('content')
    @include('layouts.partials.footer')
</div>


<!-- Scripts -->
<script src="/js/app.js"></script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="dcare/js/jquery-2.2.4.min.js"></script>
<script src="dcare/js/popper.js"></script>
<script src="dcare/js/bootstrap.min.js"></script>
<script src="dcare/js/stellar.js"></script>
<script src="dcare/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="dcare/js/jquery.ajaxchimp.min.js"></script>
<script src="dcare/js/waypoints.min.js"></script>
<script src="dcare/js/mail-script.js"></script>
{{--<script src="dcare/js/contact.js"></script>--}}
<script src="dcare/js/jquery.form.js"></script>
<script src="dcare/js/jquery.validate.min.js"></script>
<script src="dcare/js/mail-script.js"></script>
<script src="dcare/js/theme.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>

</body>
</html>