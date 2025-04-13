<div class="secondary-sidebar">
    <div class="secondary-sidebar-bar">
        <a href="{{ route('core.index') }}" class="logo-box">{{ cache('app_name') }}</a>
    </div>
    <div class="secondary-sidebar-menu">
        <ul class="accordion-menu">
            {{-- Dashboard --}}
            <li class="{{ activeRouteIs('core.index', 'active-page') }}">
                <a href="{{ route('core.index') }}">
                    <i class="menu-icon bx bx-line-chart"></i><span>Dashboard</span>
                </a>
            </li>

            <li class="menu-divider"></li>
            <li>
                <a class="text-uppercase" style="letter-spacing: 2px"><span>Access Level</span></a>
            </li>

            {{-- Users --}}
            @can('read.user')
                <li class="{{ activeRouteIs('core.user.*', 'active-page') }}">
                    <a href="{{ route('core.user.index') }}">
                        <i class="menu-icon bx bx-user"></i><span>User</span>
                    </a>
                </li>
            @endcan

            {{-- Roles --}}
            @can('read.role')
                <li class="{{ activeRouteIs('core.role.*', 'active-page') }}">
                    <a href="{{ route('core.role.index') }}">
                        <i class="menu-icon bx bx-check-shield"></i><span>Role</span>
                    </a>
                </li>
            @endcan

            {{-- Permissions --}}
            @can('read.permission')
                <li class="{{ activeRouteIs('core.permission.*', 'active-page') }}">
                    <a href="{{ route('core.permission.index') }}">
                        <i class="menu-icon bx bx-lock"></i><span>Permission</span>
                    </a>
                </li>
            @endcan


            <li class="menu-divider"></li>
            <li>
                <a class="text-uppercase" style="letter-spacing: 2px"><span>Lainnya</span></a>
            </li>
            {{-- Website Settings --}}
            <li
                class="{{ activeRouteIs(['core.app-setting.*', 'core.app-setting.create', 'core.app-setting.edit'], 'active-page') }}">
                <a href="{{ route('core.app-setting.index') }}">
                    <i class="menu-icon bx bx-cog"></i><span>Web Settings</span>
                </a>
            </li>

            {{-- Logs --}}
            @can('read.log')
                <li class="{{ activeRouteIs('core.log', 'active-page') }}">
                    <a href="{{ route('core.log') }}">
                        <i class="menu-icon bx bx-info-circle"></i><span>Logs</span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</div>
