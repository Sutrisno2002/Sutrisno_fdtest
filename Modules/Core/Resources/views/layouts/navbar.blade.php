<div class="page-header">
    <div class="search-form">
        <form action="javascript:void(0)" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control search-input" placeholder="Type something...">
                <span class="input-group-btn">
                    <button class="btn bg-default" id="close-search" type="button"><i class="icon-close"></i></button>
                </span>
            </div>
        </form>
    </div>
    <nav class="navbar navbar-default navbar-expand-md">
        <div class="container-fluid">

            <div class="navbar-header">
                <div class="logo-sm">
                    <a href="javascript:void(0)" id="sidebar-toggle-button"><i class="fas fa-bars"></i></a>
                    <a class="logo-box" href="{{ route('core.index') }}"><span>{{ cache('app_name') }}</span></a>
                </div>
            </div>

            <div class="collapse navbar-collapse justify-content-between" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav mr-auto">
                    <li class="collapsed-sidebar-toggle-inv"><a href="javascript:void(0)"
                           id="collapsed-sidebar-toggle-button"><i class="fas fa-bars"></i></a></li>
                    <li><a href="javascript:void(0)" id="toggle-fullscreen"><i class="fas fa-expand"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav mr-5 mr-md-0">
                @hasanyrole(['Developer', 'Super Admin'])
                    <li class="nav-item d-md-block align-self-center">
                        @if (request()->routeIs('core.*'))
                            <a href="{{ route('administrator.index') }}" class="btn bg-primary d-inline"
                               title="Ke halaman adminitrator">Administrator</a>
                        @endif
                        @if (request()->routeIs('administrator.*'))
                            <a href="{{ route('core.index') }}"
                               class="btn bg-primary d-inline"title="Ke halaman system">System</a>
                        @endif
                    </li>
                @endhasanyrole
                <li class="dropdown nav-item d-md-block">
                    <a href="javascript:void(0)" class="nav-link dropdown-toggle" id="navbarDropdown"
                       data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ user() ? (user()->getAvatar() ? url(user()->getAvatar()) : 'https://avatars.dicebear.com/api/avataaars/' . user('name') . '.svg?mood[]=happy&mood[]=sad&background=%23e2e2e2') : null }}"
                             alt="" class="rounded-circle border border-secondary mr-2">
                        {{ user() ? user()->fullname() : null }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <li><a href="{{ route('administrator.profile') }}">Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <form method="POST" action="{{ route('auth.logout') }}">
                                @csrf
                                <a href="{{ route('auth.logout') }}"
                                   onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    Keluar
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>
