<!-- Desktop Sidebar -->
<div class="sidebar d-none d-lg-block">
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
            <i class="fas fa-archive me-2"></i> Data Berkas
        </a>
        <hr>
        <a href="{{ route('readonly') }}" class="nav-link {{ request()->routeIs('readonly.*') ? 'active' : '' }}">
            <i class="fa-solid fa-house me-2"></i> Home
        </a>
        @auth('admin')
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-link text-dark text-decoration-none nav-link">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </button>
            </form>
        @endauth
    </nav>
</div>

<!-- Mobile Sidebar -->
<div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="sidebar">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
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
                <i class="fas fa-archive me-2"></i> Data Berkas
            </a>
            <hr>
            <a href="{{ route('readonly') }}" class="nav-link {{ request()->routeIs('readonly.*') ? 'active' : '' }}">
                <i class="fa-solid fa-house me-2"></i> Home
            </a>
            @auth('admin')
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-link text-dark text-decoration-none nav-link">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </button>
                </form>
            @endauth
        </nav>
    </div>
</div>

<style>
    /* Sidebar Styling */
    .nav-link {
        display: flex;
        align-items: center;
        padding: 0.75rem 1rem;
        text-align: left;
        font-size: 1rem;
        color: #333;
        text-decoration: none;
        transition: background-color 0.2s ease;
    }

    .nav-link i {
        width: 20px; /* Membuat ikon sejajar */
        text-align: center;
        margin-right: 10px;
    }

    .nav-link.active {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
    }

    .nav-link:hover {
        background-color: #f0f0f0;
        color: #000;
    }

    @media (max-width: 991.98px) {
        .sidebar {
            display: none;
        }
    }
</style>
