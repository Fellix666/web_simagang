<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Magang Diskominfo Kubu Raya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3185a7;
            /* Soft blue */
            --secondary-color: #3195a7;
            /* Teal blue */
            --accent-color: #57c5b6;
            /* Aqua/mint green */
            --background-color: #c2e9f7;
            /* Gradient from light green to light teal-blue */
            --card-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            --transition-speed: 0.4s;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            height: 100%;
            scroll-behavior: smooth;
        }

        body {
            background: var(--background-color);
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: #2c3e50;
            display: flex;
            align-items: center;
            justify-content: center;
            perspective: 1000px;
            overflow-x: hidden;
        }

        .main-container {
            width: 95%;
            max-width: 1400px;
            background: white;
            border-radius: 25px;
            box-shadow: var(--card-shadow);
            display: flex;
            overflow: hidden;
            transform-style: preserve-3d;
            transition: all var(--transition-speed) ease;
            overflow-y: auto;
            max-height: 90vh;
            scrollbar-width: thin;
            scrollbar-color: rgba(49, 133, 167, 0.3) transparent;
            /* More transparent scrollbar color */
        }

        .main-container::-webkit-scrollbar {
            width: 10px;
            background-color: transparent;
            /* Transparent background */
        }

        .main-container::-webkit-scrollbar-thumb {
            background-color: rgba(49, 133, 167, 0.3);
            /* Very transparent primary color */
            border-radius: 5px;
            border: 3px solid transparent;
            /* Creates a border effect */
            background-clip: content-box;
            /* Allows border to show through */
        }

        .main-container::-webkit-scrollbar-track {
            background: transparent;
            /* Completely transparent track */
            border-radius: 5px;
        }


        .left-panel,
        .right-panel {
            flex: 1;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            transition: all var(--transition-speed) ease;
        }

        .left-panel {
            background: linear-gradient(160deg, #f0f4f8 0%, #e6f2f1 100%);
            text-align: center;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            margin-bottom: 35px;
            perspective: 1000px;
        }

        .logo-container img {
            max-height: 120px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .logo-container img:hover {
            transform: rotateY(15deg) scale(1.05);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
        }

        .btn-custom {
            background-color: var(--primary-color);
            color: white;
            border: none;
            margin: 15px 0;
            padding: 14px 25px;
            width: 100%;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            font-weight: 600;
            letter-spacing: 0.7px;
            position: relative;
            overflow: hidden;
            z-index: 1;
            transition: all 0.3s ease;
        }

        /* Enhanced hover effects for buttons */
        .btn-custom:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-custom.btn-admin {
            background-color: var(--primary-color);
            transition: all 0.3s ease;
        }

        .btn-custom.btn-admin:hover {
            background-color: white;
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: all 0.5s ease;
            z-index: -1;
        }

        .btn-custom:hover::before {
            left: 100%;
        }
        .version-footer {
            position: fixed;
            bottom: 10px;
            right: 10px;
            font-size: 0.7rem;
            color: var(--primary-color);
            opacity: 0.5;
            transition: opacity 0.3s ease;
        }

        /* Improved Carousel Styles */
        #aboutCarousel {
            position: relative;
            overflow: hidden;
            height: 400px;
            /* Fixed height for consistent layout */
            display: flex;
            flex-direction: column;
        }

        .carousel-inner {
            height: 100%;
        }

        .carousel-item {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transform: scale(0.9) translateY(20px);
            transition: all 0.7s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .carousel-item.active {
            opacity: 1;
            transform: scale(1) translateY(0);
        }

        .carousel-item i {
            transition: all 0.5s ease;
        }

        .carousel-item:hover i {
            transform: scale(1.1) rotate(360deg);
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 30px;
            height: 30px;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(26, 95, 122, 0.2);
            border-radius: 50%;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0.7;
            border: 2px solid rgba(26, 95, 122, 0.1);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .carousel-control-prev {
            left: 20px;
        }

        .carousel-control-next {
            right: 20px;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: var(--primary-color);
            color: white;
            opacity: 1;
            transform: translateY(-50%) scale(1.1) rotate(5deg);
            border-color: var(--primary-color);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 35px;
            height: 35px;
            background-size: 60% 60%;
            background-position: center;
            background-repeat: no-repeat;
            filter: brightness(0.8);
            transition: filter 0.3s ease;
        }

        .carousel-control-prev:hover .carousel-control-prev-icon,
        .carousel-control-next:hover .carousel-control-next-icon {
            filter: brightness(1);
        }

        @media (max-width: 992px) {
            .main-container {
                flex-direction: column;
                max-width: 95%;
                margin: 20px 0;
            }

            .left-panel,
            .right-panel {
                padding: 30px;
            }

            #aboutCarousel {
                height: 300px;
                /* Adjusted for smaller screens */
            }

            .carousel-control-prev,
            .carousel-control-next {
                width: 50px;
                height: 50px;
                background-color: rgba(26, 95, 122, 0.3);
            }

            .carousel-control-prev {
                left: 10px;
            }

            .carousel-control-next {
                right: 10px;
            }

            .carousel-control-prev-icon,
            .carousel-control-next-icon {
                width: 30px;
                height: 30px;
            }
        }
    </style>
</head>

<body>
    <div class="main-container">
        <!-- Left Panel: Magang Data and Admin Login -->
        <div class="left-panel">
            <div class="logo-container">
                <img src="{{ asset('images/2.png') }}" alt="Logo Diskominfo Kubu Raya">
                <img src="{{ asset('images/logoKubu.png') }}" alt="Logo Kubu Raya">
            </div>

            <h2 class="mb-4 text-center" style="color: var(--primary-color); font-weight: 700;">Sistem Magang Diskominfo
            </h2>

            <a href="{{ route('readonly') }}" class="btn btn-custom">
                <i class="bi bi-list-check"></i> Lihat Daftar Peserta Magang
            </a>

            <a href="{{ route('login') }}" class="btn btn-custom btn-admin">
                <i class="bi bi-box-arrow-in-right"></i> Login Admin
            </a>

            <div class="contact-info mt-4 p-3 text-center"
                style="background-color: rgba(21, 152, 149, 0.05); border-radius: 10px;">
                <h4 class="mb-2" style="color: var(--primary-color);">Total Peserta Magang</h4>
                <p class="h3" style="color: var(--secondary-color);">{{ $jumlahPesertaMagang }}</p>
            </div>
            <div class="version-footer">
                version 0.0.0.0
            </div>
        </div>

        <!-- Right Panel: About Us and Contact Carousel -->
        <div class="right-panel">
            <div class="carousel-container">
                <div id="aboutCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="About Us"></button>
                        <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="1"
                            aria-label="Contact"></button>
                        <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="2"
                            aria-label="Location"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="text-center">
                                <i class="bi bi-info mb-3" style="font-size: 4rem; color: var(--primary-color);"></i>
                                <h3 class="mb-3" style="color: var(--primary-color);">Tentang Kami</h3>
                                <p class="text-muted">Dinas Komunikasi dan Informatika (Diskominfo) Kubu Raya adalah
                                    <br>
                                    institusi pemerintah yang bertanggung jawab <br>
                                    dalam mengembangkan sistem komunikasi <br>
                                    dan teknologi informasi.
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="text-center">
                                <i class="bi bi-headset mb-3"
                                    style="font-size: 4rem; color: var(--secondary-color);"></i>
                                <h3 class="mb-3" style="color: var(--secondary-color);">Hubungi Kami</h3>
                                <p><strong>Telepon:</strong> (0561) 123456</p>
                                <p><strong>Email:</strong> diskominfo@kuburaya.go.id</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="text-center">
                                <i class="bi bi-pin-map-fill mb-3"
                                    style="font-size: 4rem; color: var(--accent-color);"></i>
                                <h3 class="mb-3" style="color: var(--accent-color);">Lokasi Kami</h3>
                                <p>
                                    Jl. Arteri Supadio, Kecamatan Sungai Raya, Kab. Kubu Raya. Kabupaten Kubu Raya,
                                    Provinsi: Kalimantan Barat</p>
                                <p><strong>Jam Kerja:</strong> Senin - Jumat, 08.00 - 16.00 WIB</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#aboutCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#aboutCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.getElementById('aboutCarousel');
            const carouselItems = carousel.querySelectorAll('.carousel-item');

            // Enhanced smooth transition function with cubic-bezier easing
            const smoothTransition = () => {
                carouselItems.forEach(item => {
                    if (item.classList.contains('active')) {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1) translateY(0)';
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.9) translateY(20px)';
                    }
                });
            };

            // Advanced slide transition handling
            carousel.addEventListener('slide.bs.carousel', (event) => {
                carouselItems.forEach(item => {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.9) translateY(20px)';
                });
            });

            carousel.addEventListener('slid.bs.carousel', smoothTransition);

            // Create carousel instance with enhanced options
            const carouselInstance = new bootstrap.Carousel(carousel, {
                interval: 7000,
                pause: 'hover',
                ride: 'carousel'
            });

            // Pause on hover, resume on leave
            carousel.addEventListener('mouseenter', () => carouselInstance.pause());
            carousel.addEventListener('mouseleave', () => carouselInstance.cycle());
        });
    </script>
</body>

</html>
