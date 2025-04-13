<div class="app-menu">

    <!-- Sidenav Brand Logo -->
    <a href="{{ route('administrator.index') }}" class="logo-box">
        <!-- Light Brand Logo -->
        <div class="logo-light">
            <img src="{{ cache('logo') }}" class="logo-lg h-20" alt="Light logo">
            <img src="{{ cache('logo') }}" class="logo-sm" alt="Small logo">
        </div>

        <!-- Dark Brand Logo -->
        <div class="logo-dark">
            <img src="{{ cache('logo') }}" class="logo-lg h-20" alt="Dark logo">
            <img src="{{ cache('logo') }}" class="logo-sm" alt="Small logo">
        </div>
    </a>

    <!-- Sidenav Menu Toggle Button -->
    <button id="button-hover-toggle" class="absolute top-5 end-2 rounded-full p-1.5">
        <span class="sr-only">Menu Toggle Button</span>
        <i class="mgc_round_line text-xl"></i>
    </button>

    <!--- Menu -->
    <div class="srcollbar" data-simplebar>
        <ul class="menu" data-fc-type="accordion">
            @foreach ($menu as $item)
                @if ($item['is_separator'])
                    @canany($item['permissions'], 'web')
                        <li class="menu-title uppercase">{{ $item['name'] }}</li>
                    @endcanany
                @else
                    @canany($item['permissions'], 'web')
                        @if (empty($item['childs']))
                            <li class="menu-item">
                                <a href="{{ $item['link'] }}" class="menu-link {{ $item['active'] ? 'active' : '' }}">
                                    <span class="menu-icon"><i class="{{ $item['icon'] }}"></i></span>
                                    <span class="menu-text"> {{ $item['name'] }} </span>
                                </a>
                            </li>
                        @else
                            <li class="menu-item">
                                <a href="{{ $item['link'] }}" data-fc-type="collapse"
                                   class="menu-link {{ $item['active'] ? 'open' : '' }}">
                                    <span class="menu-icon"><i class="{{ $item['icon'] }}"></i></span>
                                    <span class="menu-text"> {{ $item['name'] }} </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="sub-menu {{ $item['active'] ? '' : 'hidden' }}">
                                    @foreach ($item['childs'] as $child)
                                        @can($child['permission'], 'web')
                                            <li class="menu-item">
                                                <a href="{{ $child['link'] }}"
                                                   class="menu-link {{ $child['active'] ? 'active' : '' }}">
                                                    <span class="menu-text">{{ $child['name'] }}</span>
                                                </a>
                                            </li>
                                        @endcan
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endcanany
                @endif
            @endforeach
        </ul>

        <!-- Help Box Widget -->
        {{-- <div class="my-10 mx-5">
            <div class="help-box p-6 bg-black/5 text-center rounded-md">
                <div class="flex justify-center mb-4">
                    <svg width="30" height="18" aria-hidden="true">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M15 0c-4 0-6.5 2-7.5 6 1.5-2 3.25-2.75 5.25-2.25 1.141.285 1.957 1.113 2.86 2.03C17.08 7.271 18.782 9 22.5 9c4 0 6.5-2 7.5-6-1.5 2-3.25 2.75-5.25 2.25-1.141-.285-1.957-1.113-2.86-2.03C20.42 1.728 18.718 0 15 0ZM7.5 9C3.5 9 1 11 0 15c1.5-2 3.25-2.75 5.25-2.25 1.141.285 1.957 1.113 2.86 2.03C9.58 16.271 11.282 18 15 18c4 0 6.5-2 7.5-6-1.5 2-3.25 2.75-5.25 2.25-1.141-.285-1.957-1.113-2.86-2.03C12.92 10.729 11.218 9 7.5 9Z"
                              fill="#38BDF8"></path>
                    </svg>
                </div>
                <h5 class="mb-2">Unlimited Access</h5>
                <p class="mb-3">Upgrade to plan to get access to unlimited reports</p>
                <a href="javascript: void(0);" class="btn btn-sm bg-secondary text-white">Upgrade</a>
            </div>
        </div> --}}
    </div>
</div>
