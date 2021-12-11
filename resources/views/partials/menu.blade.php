<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    Dashboard
                </a>
            </li>
                <li class="nav-item">
                    <a href="{{ route('admin.locations.index') }}" class="nav-link {{ request()->is('admin/locations') || request()->is('admin/locations/*') ? 'active' : '' }}">
                        <i class="fas fa-gift nav-icon"></i>
                        Locations
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.event_types.index') }}" class="nav-link {{ request()->is('admin/event-types') || request()->is('admin/event-types/*') ? 'active' : '' }}">
                        <i class="fas fa-gift  nav-icon"></i>
                        Event Types
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.venues.index') }}" class="nav-link {{ request()->is('admin/venues') || request()->is('admin/venues/*') ? 'active' : '' }}">
                        <i class="fas fa-gift  nav-icon"></i>
                        Venues
                    </a>
                </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="post">
                    @csrf 
                </form>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>