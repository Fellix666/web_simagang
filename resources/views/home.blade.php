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
            --background-gradient: linear-gradient(135deg, #ffffff, #6dd5fa);
            --card-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        body {
            background: var(--background-gradient);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            color: #ffffff;
            overflow: hidden;
        }

        .welcome-container {
            max-width: 500px;
            width: 100%;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            padding: 40px 30px;
            text-align: center;
            position: relative;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .logo-container {
            margin-bottom: 30px;
            filter: drop-shadow(0 5px 10px rgba(0, 0, 0, 0.2));
        }

        .logo-container img {
            max-height: 100px;
            transition: transform 0.3s ease, filter 0.3s ease;
        }

        .logo-container img:hover {
            transform: scale(1.1);
            filter: brightness(1.1);
        }

        .welcome-title {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 2rem;
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
            background-color: #1e6091;
            transform: translateY(-3px);
            box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
        }

        .btn-outline-secondary {
            margin-top: 15px;
            border-color: var(--primary-color);
            color: var(--primary-color);
            transition: all 0.3s ease;
        }

        .btn-outline-secondary:hover {
            background-color: var(--primary-color);
            color: #ffffff;
        }

        .info-section {
            background-color: rgba(52, 152, 219, 0.1);
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
        }

        .info-section h2 {
            font-size: 2rem;
            color: var(--primary-color);
        }

        .info-section p {
            color: rgba(0, 0, 0, 0.6);
        }

        .footer-text {
            color: rgba(0, 0, 0, 0.5);
            font-size: 0.9rem;
            margin-top: 20px;
        }

        .footer-text p {
            margin-bottom: 0;
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
    <div class="welcome-container">
        <!-- Logo -->
        <div class="logo-container">
            <img src="{{ asset('images/simagang.png') }}" alt="Logo Diskominfo Kubu Raya" class="img-fluid mb-3">
            <img src="{{ asset('images/logoKubu.png') }}" alt="Logo Kubu Raya" class="img-fluid">
        </div>

        <!-- Welcome Text -->
        <h1 class="welcome-title">Selamat Datang</h1>
        <p class="welcome-subtitle lead">Sistem Informasi Manajemen Magang Diskominfo Kubu Raya</p>

        <!-- Buttons -->
        <a href="{{ route('readonly') }}" class="btn btn-primary btn-lg w-100">
            <i class="bi bi-list-check"></i>
            <span>Lihat Daftar Peserta Magang</span>
        </a>

        <a href="{{ route('login') }}" class="btn btn-outline-secondary w-100 mt-3">
            <i class="bi bi-box-arrow-in-right"></i>
            Login Admin
        </a>

        <!-- Info Section -->
        <div class="info-section">
            <h2>{{ $jumlahPesertaMagang }}</h2>
            <p>Total Peserta Magang</p>
        </div>

        <!-- Footer -->
        <div class="footer-text">
            <p>&copy; 2024 Diskominfo Kubu Raya</p>
            <p>Kelola data magang dengan mudah, efisien, dan terorganisir</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
