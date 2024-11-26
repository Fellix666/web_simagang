<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Magang')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
            padding: 20px;
        }

        .sidebar .nav-link {
            color: #333;
            padding: 10px 15px;
            display: block;
            border-radius: 5px;
        }

        .sidebar .nav-link:hover {
            background-color: #e9ecef;
        }

        .sidebar .nav-link.active {
            background-color: #007bff;
            color: white;
        }

        .content-wrapper {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .content-wrapper-full {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
            width: 100%;
        }

        /* Modifikasi styling untuk logo */
        .navbar-brand {
            display: flex;
            align-items: center;
            padding: 0;
        }

        .logo-small {
            height: 130px; /* Ukuran logo yang lebih kecil */
            width: auto;
            margin-right: 10px;
            margin-left: 40px /* Jarak antara logo dan teks/elemen lain */
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: static;
            }

            .logo-small {
                height: 25px; /* Sedikit lebih kecil untuk tampilan mobile */
            }
        }
    </style>
    @yield('styles')
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard.index') }}">
                <img src="{{ asset('images/logoremove.png') }}" alt="Logo Diskominfo Kubu Raya" class="logo-small">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <a href="{{ route('readonly') }}" class="nav-link">
                        <i class="fas fa-home me-2"></i>
                    </a>
                    @auth('admin')
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link text-white text-decoration-none">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
=======
@include('layouts/head')
<body>
    <!-- Navbar -->
    @include('layouts/navbar')
>>>>>>> mc

    <!-- Main Content -->
    <main>
        @auth('admin')
<<<<<<< HEAD
            @if (!request()->routeIs('login'))
                <!-- Sidebar -->
                <div class="sidebar">
                    <nav class="nav flex-column">
                        <a href="{{ route('dashboard.index') }}"
                            class="nav-link {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
                            <i class="fas fa-dashboard me-2"></i> Dashboard
                        </a>
                        <a href="{{ route('magang.index') }}"
                            class="nav-link {{ request()->routeIs('magang.*') ? 'active' : '' }}">
                            <i class="fas fa-users me-2"></i> Data Magang
                        </a>
                        <a href="{{ route('institusi.index') }}"
                            class="nav-link {{ request()->routeIs('institusi.*') ? 'active' : '' }}">
                            <i class="fas fa-building me-2"></i> Data Institusi
                        </a>
                        <a href="{{ route('divisi.index') }}"
                            class="nav-link {{ request()->routeIs('divisi.*') ? 'active' : '' }}">
                            <i class="fas fa-briefcase me-2"></i> Data Divisi
                        </a>
                        <a href="{{ route('berkas.index') }}"
                            class="nav-link {{ request()->routeIs('berkas.*') ? 'active' : '' }}">
                            <i class="fas fa-archive me-2"></i> Data berkas
                        </a>
                    </nav>
                </div>
=======
            @if(!request()->routeIs('login'))
            @include('layouts/main')
>>>>>>> mc
            @endif
        @endauth

        <!-- Content Wrapper -->
<<<<<<< HEAD
        <div class="{{ request()->routeIs('login') ? 'content-wrapper-full' : 'content-wrapper' }}">
            @yield('content')
        </div>
=======
        @include('layouts/wrapper')
>>>>>>> mc
    </main>

    <!-- Footer -->
    @include('layouts/footer')

    <!-- Scripts -->
    @include('layouts/scripts')
    @stack('scripts')
    
</body>
<<<<<<< HEAD

</html>
=======
</html>
>>>>>>> mc
