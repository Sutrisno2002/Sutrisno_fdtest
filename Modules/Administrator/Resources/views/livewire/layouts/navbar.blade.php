<header class="app-header flex items-center px-4 gap-3">
    <!-- Sidenav Menu Toggle Button -->
    <button id="button-toggle-menu" class="nav-link p-2 me-auto">
        <span class="sr-only">Menu Toggle Button</span>
        <span class="flex items-center justify-center h-6 w-6">
            <i class="mgc_menu_line text-xl"></i>
        </span>
    </button>

    {{-- @hasanyrole(['Developer', 'Super Admin'])
        <div class="md:flex hidden">
            @if (request()->routeIs('core.*'))
                <a href="{{ route('administrator.index') }}"
                   class="btn btn-sm rounded-full border border-dark text-dark hover:bg-dark hover:text-white"
                   title="Ke halaman adminitrator">
                    Administrator
                </a>
            @endif
            @if (request()->routeIs('administrator.*'))
                <a href="{{ route('core.index') }}"
                   class="btn btn-sm rounded-full border border-dark text-dark hover:bg-dark hover:text-white"
                   title="Ke halaman system">
                    System
                </a>
            @endif
        </div>
    @endhasanyrole --}}

    <!-- Fullscreen Toggle Button -->
    <div class="md:flex hidden">
        <button data-toggle="fullscreen" type="button" class="nav-link p-2">
            <span class="sr-only">Fullscreen Mode</span>
            <span class="flex items-center justify-center h-6 w-6">
                <i class="mgc_fullscreen_line text-2xl"></i>
            </span>
        </button>
    </div>

    <!-- Notification Bell Button -->
    {{-- <livewire:administrator::layouts.navbar.notification /> --}}

    <!-- Light/Dark Toggle Button -->
    {{-- <div class="flex">
        <button id="light-dark-mode" type="button" class="nav-link p-2">
            <span class="sr-only">Light/Dark Mode</span>
            <span class="flex items-center justify-center h-6 w-6">
                <i class="mgc_moon_line text-2xl"></i>
            </span>
        </button>
    </div> --}}

    @auth
        <livewire:administrator::layouts.navbar.user-dropdown :user="$user" />
    @endauth
</header>
