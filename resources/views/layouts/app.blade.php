<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Magang')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @include('layouts.styles')
    @yield('styles')
</head>

<body>
    <!-- Navbar -->
    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <button id="sidebarToggle" class="btn btn-primary me-3">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('dashboard.index') }}">
                <img src="{{ asset('images/logoremove.png') }}" alt="Logo Diskominfo Kubu Raya" class="logo-small">
            </a>

        </div>
    </nav> --}}
    @include('layouts.navbar')

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
