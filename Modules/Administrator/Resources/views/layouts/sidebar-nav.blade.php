<div class="secondary-sidebar">
    <div class="secondary-sidebar-bar">
        <a href="{{ route('administrator.index') }}" class="logo-box">{{ cache('app_name') }}</a>
    </div>
    <div class="secondary-sidebar-menu">
        <ul class="accordion-menu">

            {{-- Dashboard --}}
            <li class="{{ activeRouteIs('administrator.index', 'active-page') }}">
                <a href="{{ route('administrator.index') }}">
                    <i class="menu-icon bx bx-line-chart"></i><span>Dashboard</span>
                </a>
            </li>

            <li class="menu-divider"></li>
            <li>
                <a class="text-uppercase" style="letter-spacing: 2px"><span>Pesanan</span></a>
            </li>

            {{-- Order --}}
            <li class="{{ activeRouteIs('administrator.order.index', 'active-page') }}">
                <a href="{{ route('administrator.order.index') }}">
                    <i class='menu-icon bx bx-spreadsheet'></i><span>Daftar Pesanan</span>
                </a>
            </li>

            <li class="menu-divider"></li>
            <li>
                <a class="text-uppercase" style="letter-spacing: 2px"><span>Website</span></a>
            </li>

            {{-- Marketing --}}
            <li class="{{ activeRouteIs(['administrator.setting.*'], 'open') }}">
                <a href="javascript:void(0)">
                    <i class="menu-icon bx bx-bell"></i><span>Marketing</span>
                    <i class="accordion-icon fas fa-angle-left"></i>
                </a>
                <ul
                    class="sub-menu"style="display: {{ activeRouteIs(['administrator.setting.*'], 'open') == 'open' ? 'block' : 'none' }}">
                    {{-- Sliders --}}
                    <li class="{{ activeRouteIs('administrator.slider.*', 'active-page') }}">
                        <a href="{{ route('administrator.slider.index') }}">Slider</a>
                    </li>
                    {{-- Coupon --}}
                    <li class="{{ activeRouteIs('administrator.setting.coupon.*', 'active-page') }}">
                        <a href="{{ route('administrator.setting.coupon.index') }}">Kupon</a>
                    </li>
                </ul>
            </li>

            {{-- Post --}}
            <li class="{{ activeRouteIs(['administrator.post.*'], 'open') }}">
                <a href="javascript:void(0)">
                    <i class="menu-icon bx bx-news"></i><span>Artikel</span>
                    <i class="accordion-icon fas fa-angle-left"></i>
                </a>
                <ul
                    class="sub-menu"style="display: {{ activeRouteIs(['administrator.post.*'], 'open') == 'open' ? 'block' : 'none' }}">
                    {{-- Create Article --}}
                    <li class="{{ activeRouteIs('administrator.post.article.create', 'active-page') }}">
                        <a href="{{ route('administrator.post.article.create') }}">Tambah Artikel</a>
                    </li>
                    {{-- Article --}}
                    <li
                        class="{{ activeRouteIs(['administrator.post.article.index', 'administrator.post.article.edit'], 'active-page') }}">
                        <a href="{{ route('administrator.post.article.index') }}">Semua Artikel</a>
                    </li>
                    {{-- Category --}}
                    <li class="{{ activeRouteIs('administrator.post.category.*', 'active-page') }}">
                        <a href="{{ route('administrator.post.category.index') }}">Kategori</a>
                    </li>
                </ul>
            </li>

            {{-- Pages --}}

            <li class="{{ activeRouteIs('administrator.page.*', 'active-page') }}">
                <a href="{{ route('administrator.page.index') }}">
                    <i class="menu-icon bx bx-book-content"></i><span>Halaman</span>
                    <i class="accordion-icon fas fa-angle-left"></i>
                </a>
                <ul
                    class="sub-menu"style="display: {{ activeRouteIs(['administrator.customer.*'], 'open') == 'open' ? 'block' : 'none' }}">
                    {{-- Create Article --}}
                    <li class="{{ activeRouteIs('administrator.customer.index', 'active-page') }}">
                        <a href="{{ route('administrator.customer.create') }}">Customer</a>
                    </li>
                </ul>
            </li>

            {{-- Contents --}}
            <li class="{{ activeRouteIs('administrator.content.*', 'active-page') }}">
                <a href="{{ route('administrator.content.index') }}">
                    <i class="menu-icon bx bx-paragraph"></i><span>Konten Website</span>
                </a>
            </li>

            {{-- Settings --}}
            <li class="{{ activeRouteIs(['administrator.setting.*'], 'open') }}">
                <a href="javascript:void(0)">
                    <i class="menu-icon bx bx-cog"></i><span>Pengaturan Utama</span>
                    <i class="accordion-icon fas fa-angle-left"></i>
                </a>
                <ul
                    class="sub-menu"style="display: {{ activeRouteIs(['administrator.setting.*'], 'open') == 'open' ? 'block' : 'none' }}">
                    {{-- Navigation --}}
                    <li class="{{ activeRouteIs('administrator.setting.navigation.*', 'active-page') }}">
                        <a href="{{ route('administrator.setting.navigation.index') }}">Navigasi</a>
                    </li>

                    {{-- SEO --}}
                    <li class="{{ activeRouteIs('administrator.setting.seo.*', 'active-page') }}">
                        <a href="{{ route('administrator.setting.seo.index') }}">SEO</a>
                    </li>
                </ul>
            </li>

            <li class="menu-divider"></li>

            <li>
                <a class="text-uppercase" style="letter-spacing: 2px"><span>Lainnya</span></a>
            </li>

            {{-- Users --}}
            @can('read.user')
                <li class="{{ activeRouteIs('administrator.user.*', 'active-page') }}">
                    <a href="{{ route('administrator.user.index') }}">
                        <i class="menu-icon bx bx-user"></i><span>User</span>
                    </a>
                </li>
            @endcan

            {{-- Website Settings --}}
            <li
                class="{{ activeRouteIs(['administrator.setting.main.*', 'administrator.setting.main.create', 'administrator.setting.main.edit'], 'active-page') }}">
                <a href="{{ route('administrator.setting.main.index') }}">
                    <i class="menu-icon bx bx-cog"></i><span>Pengaturan Web</span>
                </a>
            </li>
        </ul>
    </div>
</div>
