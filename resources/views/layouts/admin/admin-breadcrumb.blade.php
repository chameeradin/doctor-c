<!-- BreadCrumb -->
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb adminx-page-breadcrumb">
        <li class="breadcrumb-item"><a class="breadcrumb-item {{empty(Request::segment(2)) ? 'active' : ''}}" {{!empty(Request::segment(2)) ? 'href=/dashboard' : ''}}>Dashboard</a></li>
        @if(!empty($breadcrumbs) && isset($breadcrumbs))
            @foreach($breadcrumbs as $breadcrumb)
                @if(!$loop->last)
                <li class="breadcrumb-item">
                    <a class="breadcrumb-item" href="{{ $breadcrumb['url'] }}">{{ucfirst($breadcrumb['name'])}}</a>
                </li>
                @else
                    <a class="breadcrumb-item active" {{!empty($breadcrumb['url']) ? 'href=""' : ''}}>{{ucfirst($breadcrumb['name'])}}</a>
                    @endif
            @endforeach
        @endif
    </ol>
</nav>