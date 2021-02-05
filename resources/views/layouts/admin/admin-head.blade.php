<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="/dist/css/adminx.css" media="screen"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Arogya') }}</title>

    <link rel="icon" type="image/icon" href="{{ '/assets/images/favicon.png'}}" />

    <!-- Styles -->
{{--<link href="/css/app.css" rel="stylesheet">--}}

<!-- Bootstrap core CSS -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/sidebar.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>


    @include('layouts.partials.javascripts')
</head>