<div class="sidebar">
    <nav class="nav flex-column">
        

        <a href="{{ route('dashboard.index') }}" class="nav-link {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
            <i class="fas fa-dashboard me-2"></i> Dashboard
        </a>
        <a href="{{ route('magang.index') }}" class="nav-link {{ request()->routeIs('magang.*') ? 'active' : '' }}">
            <i class="fas fa-users me-2"></i> Data Magang
        </a>
        <a href="{{ route('institusi.index') }}" class="nav-link {{ request()->routeIs('institusi.*') ? 'active' : '' }}">
            <i class="fas fa-building me-2"></i> Data Institusi
        </a>
        <a href="{{ route('divisi.index') }}" class="nav-link {{ request()->routeIs('divisi.*') ? 'active' : '' }}">
            <i class="fas fa-briefcase me-2"></i> Data Divisi
        </a>
        <a href="{{ route('berkas.index') }}" class="nav-link {{ request()->routeIs('berkas.*') ? 'active' : '' }}">
            <i class="fas fa-archive me-2"></i> Data berkas
        </a>
        <hr>
        <a href="{{ route('readonly') }}" class="nav-link {{ request()->routeIs('readonly.*') ? 'active' : '' }}">
            <i class="fa-solid fa-house me-2"></i> Home
        </a>
        @auth('admin')
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-link text-dark text-decoration-none">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </button>
                </form>
            </li>
        @endauth
    </nav>
</div>
