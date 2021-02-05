<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="top_menu row m0">
        <div class="container">
            <div class="float-left">
                <a class="dn_btn" href="mailto:info@arogya.lk"><i class="ti-email"></i>info@arogya.lk</a>
            </div>
            <div class="float-right">
                <ul class="list header_social">
                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                    <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                    <li><a href="#"><i class="ti-linkedin"></i></a></li>
                    <li><a href="#"><i class="ti-skype"></i></a></li>
                    <li><a href="#"><i class="ti-vimeo-alt"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="/">Aro<span>gya</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-5">
                        <li class="nav-item {{Request::segment(1) == '' ? 'active': ''}}"><a href="/" class="nav-link pl-0">Home</a></li>
                        <li class="nav-item {{Request::segment(1) == 'about-us' ? 'active': ''}}"><a href="{{route('aboutUs')}}" class="nav-link">About</a></li>
                        <li class="nav-item {{Request::segment(1) == 'our-doctors' ? 'active': ''}}"><a href="{{route('doctors')}}" class="nav-link">Doctor</a></li>
                        <li class="nav-item {{Request::segment(1) == 'our-departments' ? 'active': ''}}"><a href="{{route('departments')}}" class="nav-link">Departments</a></li>
                        <li class="nav-item {{Request::segment(1) == 'contact-us' ? 'active': ''}}"><a href="{{route('contactUs')}}" class="nav-link">Contact</a></li>
                        @guest
                            <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
                            <li class="nav-item"><a href="{{route('register')}}" class="nav-link">Register</a></li>
                        @endguest
                        @auth
                            <li class="nav-item"><a href="{{route('admin.dashboard')}}" class="nav-link">Dashboard</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->