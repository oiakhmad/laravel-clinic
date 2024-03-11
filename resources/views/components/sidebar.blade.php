<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Akhmad Zulkarnain Clinic</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Clinic</a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dashboard ') }}"><i class="fas fas fa-fire">
                    </i> <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Master Data</li>
            <li class="{{ Request::is('users') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('users ') }}"><i class="fas fas fa-user">
                    </i> <span>Users</span>
                </a>
            </li>
            <li class="{{ Request::is('doctors') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('doctors ') }}"><i class="fas fas fa-users">
                    </i> <span>Doctors</span>
                </a>
            </li>
    </aside>
</div>
