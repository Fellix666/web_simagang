<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard.index') }}">Ganti ke logo simagang</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form action="{{ route('readonly') }}" method="GET" class="d-inline">
                        <button type="submit" class="btn btn-link text-white text-decoration-none">
                            <i class="fa-solid fa-house"></i>
                        </button>
                    </form>
                </li>
                @auth('admin')
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link text-white text-decoration-none">
                            <i class="fas fa-sign-out-alt"></i></button>
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>