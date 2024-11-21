<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('magang.index') }}">SI Magang</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                @auth('admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('magang.*') ? 'active' : '' }}"
                           href="{{ route('magang.index') }}">Data Magang</a>
                    </li>
                @endauth
            </ul>
            <ul class="navbar-nav">
                @auth('admin')
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">@csrf
                            <button type="submit" class="btn btn-link text-white text-decoration-none">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}"
                           href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
