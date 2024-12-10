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

        body {
            min-height: 2000px;
            padding-top: var(--navbar-height);
        }

        .navbar {
            transition:
                transform 0.3s ease-in-out,
                position 0.3s ease-in-out,
                box-shadow 0.3s ease-in-out;
        }

        .navbar-hide {
            transform: translateY(-100%);
        }

        .navbar-relative {
            position: relative !important;
        }

        .navbar-brand img {
            max-height: 100px;
            width: auto;
            object-fit: contain;
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
                max-height: 100px;
            }
        }

        /* Improved scroll behavior */
        .navbar.scrolled {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
                <img src="{{ asset('images/1.png') }}" alt="Logo Diskominfo Kubu Raya" class="img-fluid" style="max-height: 70px; min-height: 30px; width: auto; object-fit: contain;">
            </a>

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
