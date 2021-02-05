@if (Session::has('error_message'))
    <div class="alert alert-danger">
        {{ Session::get('error_message')  }}
    </div>
@endif

@if (Session::has('success_message'))
<div class="alert alert-success">
    {{ Session::get('success_message')  }}
</div>
@endif

@if (Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message')  }}
    </div>
@endif

@if (Session::has('info_message'))
    <div class="alert alert-info">
        {{ Session::get('info_message')  }}
    </div>
@endif
