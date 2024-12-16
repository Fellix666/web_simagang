<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Magang Diskominfo Kubu Raya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --background-gradient: linear-gradient(135deg, #ffffff, #6dd5fa);
            --card-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        body {
            background: var(--background-gradient);
            font-family: 'Roboto', sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main-container {
            width: 90%;
            max-width: 1200px;
            background: white;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            display: flex;
            overflow: hidden;
            transition: all 0.5s ease;
        }

        .left-panel, .right-panel {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .left-panel {
            background-color: #f8f9fa;
            text-align: center;
        }

        .right-panel {
            background-color: #ffffff;
        }

        .logo-container img {
            max-height: 100px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .logo-container img:hover {
            transform: scale(1.1);
        }

        .btn-primary, .btn-outline-secondary {
            margin: 10px 0;
            padding: 12px 20px;
            width: 100%;
            transition: all 0.3s ease;
            border-radius: 5px;
        }

        .btn-primary:hover, .btn-outline-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
            background-color: var(--secondary-color);
            color: white;
        }

        .carousel-item {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 300px;
            border-radius: 10px;
            color: white;
            text-align: center;
            opacity: 0;
            transition: opacity 1s ease, transform 1s ease;
            transform: scale(0.9);
        }

        .carousel-item.active {
            opacity: 1;
            transform: scale(1);
        }

        .carousel-item:nth-child(1) {
            background-color: #a29bfe;
        }

        .carousel-item:nth-child(2) {
            background-color: #81ecec;
        }

        .carousel-item:nth-child(3) {
            background-color: #fab1a0;
        }

        .contact-info {
            background-color: rgba(52, 152, 219, 0.1);
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            transition: transform 0.3s ease;
        }

        .contact-info:hover {
            transform: translateY(-5px);
        }

        .contact-info h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .carousel-control-prev, .carousel-control-next {
            width: 50px;
            height: 50px background-color: rgba(255,255,255,0.2);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }

        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Left Panel: Magang Data and Admin Login -->
        <div class="left-panel">
            <div class="logo-container">
                <img src="{{ asset('images/2.png') }}" alt="Logo Diskominfo Kubu Raya" class="img-fluid">
                <img src="{{ asset('images/logoKubu.png') }}" alt="Logo Kubu Raya" class="img-fluid">
            </div>

            <h2 class="mb-4">Sistem Magang Diskominfo</h2>

            <a href="{{ route('readonly') }}" class="btn btn-primary">
                <i class="bi bi-list-check"></i> Lihat Daftar Peserta Magang
            </a>

            <a href="{{ route('login') }}" class="btn btn-outline-secondary">
                <i class="bi bi-box-arrow-in-right"></i> Login Admin
            </a>

            <div class="contact-info">
                <h3>Total Peserta Magang</h3>
                <p class="h4">{{ $jumlahPesertaMagang }}</p>
            </div>
        </div>

        <!-- Right Panel: About Us and Contact Carousel -->
        <div class="right-panel">
            <div id="aboutCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="About Us"></button>
                    <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="1" aria-label="Contact"></button>
                    <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="2" aria-label="Location"></button>
                </div>
                <div class="carousel-inner">
                    <!-- About Us Slide -->
                    <div class="carousel-item active">
                        <div class="carousel-caption">
                            <h3><i class="bi bi-info-circle"></i> Tentang Kami</h3>
                            <p>Dinas Komunikasi dan Informatika (Diskominfo) Kubu Raya adalah institusi pemerintah yang bertanggung jawab dalam mengembangkan sistem komunikasi dan teknologi informasi.</p><br>
                        </div>
                    </div>

                    <!-- Contact Slide -->
                    <div class="carousel-item">
                        <div class="carousel-caption">
                            <h3><i class="bi bi-envelope-fill"></i> Hubungi Kami</h3>
                            <p><strong><i class="bi bi-telephone"></i> Telepon:</strong> (0561) 123456</p>
                            <p><strong><i class="bi bi-envelope"></i> Email:</strong> diskominfo@kuburaya.go.id</p>
                            <br>
                            <br>
                        </div>
                    </div>

                    <!-- Location Slide -->
                    <div class="carousel-item">
                        <div class="carousel-caption">
                            <h3><i class="bi bi-geo-alt"></i> Lokasi Kami</h3>
                            <p>Jalan Teuku Umar, Kompleks Perkantoran Kubu Raya</p>
                            <p><strong>Jam Kerja:</strong> Senin - Jumat, 08.00 - 16.00 WIB</p><br>
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#aboutCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#aboutCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div ```html
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.getElementById('aboutCarousel');
            const carouselItems = carousel.querySelectorAll('.carousel-item');

            // Custom smooth transition
            const smoothTransition = () => {
                carouselItems.forEach(item => {
                    if (item.classList.contains('active')) {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.9)';
                    }
                });
            };

            // Add custom event listeners for smooth transitions
            carousel.addEventListener('slide.bs.carousel', function() {
                carouselItems.forEach(item => {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.9)';
                });
            });

            carousel.addEventListener('slid.bs.carousel', smoothTransition);

            // Auto-rotate carousel every 5 seconds
            const carouselInstance = new bootstrap.Carousel(carousel, {
                interval: 5000,
                pause: 'hover'
            });

            // Pause on hover
            carousel.addEventListener('mouseenter', () => {
                carouselInstance.pause();
            });

            carousel.addEventListener('mouseleave', () => {
                carouselInstance.cycle();
            });
        });
    </script>
</body>
</html>
