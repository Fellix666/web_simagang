<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Magang Diskominfo Kubu Raya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --background-color: #ecf0f1;
        }

        body {
            background-color: var(--background-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #f6f8f9 0%, #e5ebee 100%);
        }

        .welcome-container {
            max-width: 500px;
            width: 100%;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            padding: 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
            animation: fadeIn 0.8s ease-out;
            border: 1px solid rgba(255,255,255,0.1);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .logo-container {
            margin-bottom: 30px;
            filter: drop-shadow(0 5px 10px rgba(0,0,0,0.1));
        }

        .logo-container img {
            max-height: 120px;
            transition: transform 0.3s ease;
        }

        .logo-container img:hover {
            transform: scale(1.05);
        }

        .welcome-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 15px;
            letter-spacing: -1px;
        }

        .welcome-subtitle {
            color: var(--secondary-color);
            margin-bottom: 30px;
            font-weight: 500;
        }

        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            padding: 12px 20px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-primary:hover {
            background-color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 7px 14px rgba(50,50,93,.1), 0 3px 6px rgba(0,0,0,.08);
        }

        .btn-outline-secondary {
            margin-top: 15px;
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .info-section {
            background-color: rgba(52,152,219,0.05);
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
        }

        .footer-text {
            color: rgba(0,0,0,0.5);
            font-size: 0.9rem;
            margin-top: 20px;
        }

        .bi {
            font-size: 1.2rem;
        }

        @media (max-width: 576px) {
            .welcome-container {
                width: 95%;
                padding: 20px;
                margin: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
        <div class="welcome-container">
            <!-- Logo -->
            <div class="logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Diskominfo Kubu Raya" class="img-fluid">
                <img src="{{ asset('images/logoKubu.png') }}" alt="Kubu Raya">
            </div>

            <!-- Welcome Text -->
            <h1 class="welcome-title">Selamat Datang</h1>
            <p class="welcome-subtitle lead">Sistem Informasi Manajemen Magang Diskominfo Kubu Raya</p>

            <!-- Descriptive Button -->
            <a href="{{ route('magang.index') }}" class="btn btn-primary btn-lg w-100">
                <i class="bi bi-list-check"></i>
                <span>Lihat Daftar Peserta Magang</span>
            </a>

            <!-- Additional Button -->
            <a href="{{ route('login') }}" class="btn btn-outline-secondary w-100 mt-3">
                <i class="bi bi-box-arrow-in-right"></i>
                Login Admin
            </a>

            <!-- Data Peserta -->
            <div class="info-section">
                <h2 class="text-primary">{{ $jumlahPesertaMagang }}</h2>
                <p class="text-muted mb-0">Total Peserta Magang</p>
            </div>

            <!-- Footer -->
            <div class="footer-text">
                <p class="mb-1">&copy; 2024 Diskominfo Kubu Raya</p>
                <p class="small text-muted">Kelola data magang dengan mudah, efisien, dan terorganisir</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
