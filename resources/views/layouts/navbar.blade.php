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
            --navbar-bg: #007bff; /* Blue color for navbar */
            --navbar-bg-hover: #0056b3; /* Darker blue for hover */
            --navbar-shadow: 0 2px 10px rgba(0, 0, 0, 0.15); /* Shadow effect */
        }

        body {
            min-height: 2000px;
            padding-top: var(--navbar-height);
        }

        .navbar {
            background-color: var(--navbar-bg);
            transition:
                transform 0.3s ease-in-out,
                position 0.3s ease-in-out,
                box-shadow 0.3s ease-in-out;
            z-index: 20;
        }

        /* Navbar Hide on Scroll */
        .navbar-hide {
            transform: translateY(-100%);
        }

        .navbar-relative {
            position: relative !important;
        }

        /* Navbar Brand */
        .navbar-brand img {
            max-height: 80px;
            width: auto;
            object-fit: contain;
        }

        /* Navbar Links */
        .navbar-nav .nav-link {
            color: #fff;
            padding: 0.75rem 1.5rem;
            transition: background-color 0.3s ease;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            background-color: var(--navbar-bg-hover);
            border-radius: 0.25rem;
        }

        /* Enhanced responsiveness */
        @media (max-width: 991.98px) {
            .navbar-brand {
                margin-right: auto !important;
            }

            .navbar-toggler {
                order: -1;
            }

            .navbar-brand img {
                max-height: 60px;
            }
        }

        /* Scrolled navbar effect */
        .navbar.scrolled {
            box-shadow: var(--navbar-shadow);
            background-color: #0056b3;
        }

        /* Active navbar link styling */
        .navbar-nav .nav-link.active {
            background-color: var(--navbar-bg-hover);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav id="mainNavbar" class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <!-- Responsive Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Centered Logo -->
            <a class="navbar-brand mx-auto mx-lg-0 d-flex align-items-center" href="{{ route('dashboard.index') }}">
                <img src="{{ asset('images/1.png') }}" alt="Logo Diskominfo Kubu Raya" class="img-fluid width">
            </a>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('magang.index') }}">Data Magang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('institusi.index') }}">Data Instansi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('divisi.index') }}">Data Divisi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('berkas.index') }}">Data Berkas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('readonly') }}">Home</a>
                    </li>
                    @auth('admin')
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link text-white text-decoration-none nav-link">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

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
