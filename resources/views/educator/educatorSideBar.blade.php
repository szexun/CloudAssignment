<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        {{-- <li class="nav-item">
            <a class="nav-link" href="teacher_homepage.php?tid=">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Homepage</span>
            </a>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link w-full" href="{{ route('dashboard') }}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Teacher Dashboard</span>
            </a>
        </li>

        <li class="nav-item flex">
            <a class="nav-link w-full"href="{{ route('educator.module.index') }}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Module</span>
            </a>
        </li>

        <li class="nav-item flex">
            <a class="nav-link w-full"href="{{ route('educator.module.index') }}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Student Progress</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link w-full" href="{{ route('profile.edit') }}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Account Setting</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link w-full" href="{{ route('logout') }}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>



    </ul>
</nav>
