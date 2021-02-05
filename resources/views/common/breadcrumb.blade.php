@if(isset($breadcrumbs) && !empty($breadcrumbs))

    @for($x=0; $x <sizeof($breadcrumbs); $x+=2)

        <a href="{{ $breadcrumbs[$x] }}" class="pull-left">/ &nbsp;{{ $breadcrumbs[$x+1] }} </a>

    @endfor

@else

    @if(!empty(session('breadcrumb1_link')))
        <a href="{{ session('breadcrumb1_link') }}" class="pull-left">/ &nbsp;{{ session('breadcrumb1_name') }} </a>
    @endif

    @if(!empty(session('breadcrumb2_link')))
        <a href="{{ session('breadcrumb2_link') }}" class="pull-left">/ &nbsp;{{ session('breadcrumb2_name') }} </a>
    @endif

    @if(!empty(session('breadcrumb3_link')))
        <a href="{{ session('breadcrumb3_link') }}" class="pull-left">/ &nbsp;{{ session('breadcrumb3_name') }} </a>
    @endif


@endif