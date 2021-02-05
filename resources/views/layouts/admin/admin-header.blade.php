<nav class="navbar navbar-expand justify-content-between fixed-top">
    <a class="navbar-brand mb-0 h1 d-none d-md-block" href="{{route('admin.dashboard')}}">
        <img src="/assets/images/logo.png" class="navbar-brand-image d-inline-block align-top mr-2" alt="">
        Arogya
    </a>

    <div class="d-flex flex-1 d-block d-md-none">
        <a href="#" class="sidebar-toggle ml-3">
            <i data-feather="menu"></i>
        </a>
    </div>

    <ul class="navbar-nav d-flex justify-content-end mr-2">
        <li class="nav-item dropdown">
            <a class="nav-link avatar-with-name" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#">
                <img src="/demo/img/user-icon.svg" class="d-inline-block align-top" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{route('profile')}}">My Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="{{ url('/logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    </ul>
</nav>