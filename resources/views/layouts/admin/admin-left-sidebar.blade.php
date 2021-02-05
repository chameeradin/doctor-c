<!-- expand-hover push -->
<!-- Sidebar -->
<div class="adminx-sidebar expand-hover push">
    <ul class="sidebar-nav">
        <li class="sidebar-nav-item">
            <a href="{{route('admin.dashboard')}}"
               class="sidebar-nav-link {{!empty(Request::segment(2)) == '' ? 'active': ''}}">
              <span class="sidebar-nav-icon">
                <i data-feather="home"></i>
              </span>
                <span class="sidebar-nav-name">
                Dashboard
              </span>
                <span class="sidebar-nav-end">

              </span>
            </a>
        </li>
        @if(!checkRoleForBlade([ROLE_GUEST]))
        @if(checkRoleForBlade([ROLE_ADMIN]))
            <li class="sidebar-nav-item">
                <a href="{{route('admin.doctor.list')}}"
                   class="sidebar-nav-link {{Request::segment(2) == 'doctors' ? 'active': ''}}">
              <span class="sidebar-nav-icon">
                <i data-feather="user"></i>
              </span>
                    <span class="sidebar-nav-name">
                Doctor Manage
              </span>
                    <span class="sidebar-nav-end">

              </span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{route('admin.patient.list')}}"
                   class="sidebar-nav-link {{Request::segment(2) == 'patients' ? 'active': ''}}">
              <span class="sidebar-nav-icon">
                <i data-feather="users"></i>
              </span>
                    <span class="sidebar-nav-name">
                {{checkRoleForBlade([ROLE_DOCTOR]) ? 'My' : ''}} Patient Manage
              </span>
                    <span class="sidebar-nav-end">

              </span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{route('admin.user.list')}}"
                   class="sidebar-nav-link {{Request::segment(2) == 'users' ? 'active': ''}}">
              <span class="sidebar-nav-icon">
                <i data-feather="user"></i>
              </span>
                    <span class="sidebar-nav-name">
                Manage Users
              </span>
                    <span class="sidebar-nav-end">

              </span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="{{route('admin.inquiry.list')}}"
                   class="sidebar-nav-link {{Request::segment(2) == 'inquiries' ? 'active': ''}}">
              <span class="sidebar-nav-icon">
                <i data-feather="help-circle"></i>
              </span>
                    <span class="sidebar-nav-name">
                Website Inquiries
              </span>
                    <span class="sidebar-nav-end">

              </span>
                </a>
            </li>
        @endif
        @if(checkRoleForBlade([ROLE_ADMIN]))
        <li class="sidebar-nav-item">
            <a href="{{route('admin.category.list')}}"
               class="sidebar-nav-link {{Request::segment(2) == 'category' ? 'active': ''}}">
              <span class="sidebar-nav-icon">
                <i data-feather="list"></i>
              </span>
                <span class="sidebar-nav-name">
                Category
              </span>
                <span class="sidebar-nav-end">

              </span>
            </a>
        </li>

        @if(checkRoleForBlade([ROLE_DOCTOR]))
        <li class="sidebar-nav-item">
            <a href="{{route('admin.record.list')}}"
               class="sidebar-nav-link {{Request::segment(2) == 'records' ? 'active': ''}}">
              <span class="sidebar-nav-icon">
                <i data-feather="monitor"></i>
              </span>
                <span class="sidebar-nav-name">
                Records
              </span>
                <span class="sidebar-nav-end">

              </span>
            </a>
        </li>
        @endif
        @endif
        <li class="sidebar-nav-item">
            <a href="{{route('appointments.list')}}"
               class="sidebar-nav-link {{Request::segment(2) == 'appointments-list' ? 'active': ''}}">
              <span class="sidebar-nav-icon">
                <i data-feather="calendar"></i>
              </span>
                <span class="sidebar-nav-name">
                Appointments
              </span>
                <span class="sidebar-nav-end">

              </span>
            </a>
        </li>

        <li class="sidebar-nav-item">
            <a href="{{route('admin.prescription.list')}}"
               class="sidebar-nav-link {{Request::segment(2) == 'prescriptions' ? 'active': ''}}">
              <span class="sidebar-nav-icon">
                <i data-feather="file"></i>
              </span>
                <span class="sidebar-nav-name">
                Prescriptions
              </span>
                <span class="sidebar-nav-end">

              </span>
            </a>
        </li>
        @endif
    </ul>
</div><!-- Sidebar End -->
