<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Magang</title><!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .sidebar {
            min-height: calc(100vh - 56px);
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        .sidebar .nav-link {
            color: #333;
            padding: 0.5rem 1rem;
        }

        .sidebar .nav-link:hover {
            color: #0d6efd;
        }

        .sidebar .nav-link.active {
            color: #0d6efd;
            background-color: #f8f9fa;
        }

        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
            }
        }
    </style>
</head>

<body><!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container"><a class="navbar-brand" href="{{ route('magang.index') }}">SI Magang</a><button
                class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    @auth('admin')
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('magang.*') ? 'active' : '' }}"
                                href="{{ route('magang.index') }}">Data Magang</a></li>
                    @endauth
                </ul>
                <ul class="navbar-nav">
                    @auth('admin')
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">@csrf<button type="submit"
                                    class="btn btn-link text-white text-decoration-none"><i class="fas fa-sign-out-alt"></i>
                                    Logout</button></form>
                    </li>@else<li class="nav-item"><a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}"
                                href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav> <!-- Main Content -->
    <main class="py-4">@yield('content')</main><!-- Footer -->
    <footer class="bg-light py-3 mt-auto">
        <div class="container text-center"><span class="text-muted">&copy; {{ date('Y') }} Sistem Informasi Magang.
                All rights reserved.</span> </div>
    </footer><!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script><!-- jQuery (jika diperlukan) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><!-- Sweet Alert untuk notifikasi yang lebih baik -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Fungsi untuk menampilkan Sweet Alert untuk konfirmasi 
        deletefunction confirmDelete(event) {
            event.preventDefault();
            const form = event.target.closest('form');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        } // Fungsi untuk menampilkan notifikasi sukses
        @if (session('success'))Swal.fire({icon: 'success',title: 'Berhasil!',text: '{{ session('success') }}',timer: 3000,showConfirmButton: false});@endif
        // Fungsi untuk menampilkan notifikasi error
        @if (session('error'))Swal.fire({icon: 'error',title: 'Error!',text: '{{ session('error') }}',timer: 3000,showConfirmButton: false});@endif
    </script><!-- Tempat untuk script tambahan -->@stack('scripts')
</body>

</html>
