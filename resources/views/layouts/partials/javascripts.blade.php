<script src="{{ asset('js/admin.js')}}"></script>

<script>
    window._token = '{{ csrf_token() }}';
</script>

<script src="{{ asset('assets/js/custom.js')}}"></script>

<link rel="stylesheet" href="/assets/plugins/Pikaday-master/css/pikaday.css">
<script src="/assets/plugins/moment.js"></script>
<script src="/assets/plugins/Pikaday-master/pikaday.js"></script>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

@yield('javascript')