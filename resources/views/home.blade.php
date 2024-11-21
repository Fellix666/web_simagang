<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Magang Diskominfo Kubu Raya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
        }
        .welcome-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .logo-container {
            margin-bottom: 25px;
        }
        .btn-custom {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.2s;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            color: white;
        }
        .text-muted p {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome-container text-center">
            <!-- Logo -->
            <div class="logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Diskominfo Kubu Raya" class="img-fluid" style="max-height: 150px;">
            </div>

            <!-- Welcome Text -->
            <h1 class="mb-3 text-primary">Selamat Datang</h1>
            <p class="lead text-muted mb-4">Sistem Informasi Manajemen Magang Diskominfo Kubu Raya</p>

            <!-- Descriptive Button -->
            <a href="{{ route('magang.index') }}" class="btn btn-primary btn-lg btn-custom w-100">
                <i class="bi bi-list-check"></i>
                <span>Lihat Daftar Peserta Magang</span>
            </a>

            <!-- Additional Buttons -->
            <div class="mt-3">
                <a href="{{ route('login') }}" class="btn btn-outline-secondary w-100">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Login Admin
                </a>
            </div>

            <!-- Data Peserta -->
            <div class="mb-4">
                <h2>{{ $jumlahPesertaMagang }}</h2>
                <p class="text-muted">Jumlah Peserta Magang</p>
            </div>

            <!-- Additional Information -->
            <div class="mt-4 text-muted small">
                <p>Kelola data magang dengan mudah, efisien, dan terorganisir.</p>
                <p>&copy; 2024 Diskominfo Kubu Raya</p>
            </div>
        </div>
    </div>

    <!-- Optional: Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
