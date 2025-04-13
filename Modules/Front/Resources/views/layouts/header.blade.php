<!-- Start Generation Here -->
<header class="d-flex justify-content-between align-items-center p-3 bg-light">
    <h1 class="h4">Daftar Buku</h1>
    <div>
        @if (Auth::check())
            <span class="me-3">Selamat datang, {{ Auth::user()->name }}</span>
            <form class="form-inline" method="POST" action="{{ route('auth.logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        @else
            <form class="form-inline" method="GET" action="{{ route('auth.login') }}">
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        @endif
    </div>
</header>
<!-- End Generation Here -->
