<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Dynamic Navbar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --navbar-height: 60px;
        }

        /* Navbar Styling */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            height: var(--navbar-height);
            z-index: 20;
            background-color: #007bff;
            transition:
                transform 0.3s ease-in-out,
                position 0.3s ease-in-out,
                box-shadow 0.3s ease-in-out;
        }

        /* Navbar Hide on Scroll */
        .navbar-hide {
            transform: translateY(-100%);
        }

        .navbar-relative {
            position: relative !important;
        }

        /* Sidebar Styling */
        .sidebar {
            position: fixed;
            top: var(--navbar-height); /* Menempatkan sidebar di bawah navbar */
            left: 0;
            height: calc(100vh - var(--navbar-height)); /* Mengatur tinggi sidebar agar tidak tertutupi */
            width: 250px; /* Lebar sidebar */
            background-color: #f8f9fa;
            z-index: 10;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

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

        /* Konten utama */
        .main-content {
            margin-left: 250px; /* Memberikan margin kiri untuk menghindari sidebar */
            margin-top: var(--navbar-height); /* Memberikan margin atas untuk menghindari navbar */
            padding: 20px;
            min-height: calc(100vh - var(--navbar-height)); /* Mengatur tinggi konten utama */
            /* background-color: #ffffff; */
        }

        /* Atur tampilan sidebar pada layar kecil */
        @media (max-width: 991.98px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-left: 0;
                margin-top: var(--navbar-height); /* Memberikan ruang di atas konten */
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav id="mainNavbar" class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <!-- Responsive Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Centered Logo -->
            <a class="navbar-brand mx-auto mx-lg-0 d-flex align-items-center" href="{{ route('dashboard.index') }}">
                <img src="{{ asset('images/1.png') }}" alt="Logo Diskominfo Kubu Raya" class="img-fluid" style="max-height: 90px; min-height: 80px; width: auto; object-fit: contain;">
            </a>

        </div>
    </nav>

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
                <i class="fas fa-building me-2"></i> Data Instansi
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
                    <i class="fas fa-building me-2"></i> Data Instansi
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

    <!-- Main Content -->
    <div class="main-content">
        <!-- Main content goes here -->
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.getElementById('mainNavbar');
            let lastScrollTop = 0;
            let isHidden = false;

            window.addEventListener('scroll', function() {
                const currentScrollTop = window.pageYOffset || document.documentElement.scrollTop;

                // Add scrolled class for subtle shadow effect
                if (currentScrollTop > 10) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }

                // Determine scroll direction
                if (currentScrollTop > lastScrollTop) {
                    // Scrolling down
                    if (!isHidden) {
                        navbar.classList.add('navbar-hide');
                        isHidden = true;
                    }

                    // When scrolled past 200px, make navbar relative
                    if (currentScrollTop > 200) {
                        navbar.classList.remove('fixed-top');
                        navbar.classList.add('navbar-relative');
                    }
                } else {
                    // Scrolling up
                    if (isHidden) {
                        navbar.classList.remove('navbar-hide');
                        isHidden = false;
                    }

                    // When scrolling up, return to fixed top
                    if (currentScrollTop <= 200) {
                        navbar.classList.add('fixed-top');
                        navbar.classList.remove('navbar-relative');
                    }
                }

                lastScrollTop = currentScrollTop <= 0 ? 0 : currentScrollTop;
            });
        });
    </script>
</body>
</html>
