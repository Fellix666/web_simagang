<!DOCTYPE html>
<html lang="en">

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
            {{-- <button id="sidebarToggle" class="btn btn-primary me-3">
                <i class="fas fa-bars"></i>
            </button> --}}
            <a class="navbar-brand" href="{{ route('dashboard.index') }}">
                <img src="{{ asset('images/logoremove.png') }}" alt="Logo Diskominfo Kubu Raya" class="logo-small">
            </a>

        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @auth('admin')
            @if (!request()->routeIs('login'))
                @include('layouts.main')
            @endif
        @endauth

        <!-- Content Wrapper -->
        <div class="{{ request()->routeIs('login') ? 'content-wrapper-full' : 'content-wrapper' }}">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    @include('layouts/footer')

    <!-- Scripts -->
    @include('layouts/scripts')
    @stack('scripts')

</body>

</html>
