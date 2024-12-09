<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Footer Diskominfo Kubu Raya</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
        }

        /* Footer Styling */
        footer {
            background-color: #c2e9f7;
            border-top: 1px solid #c2e9f7;
            padding: 2.5rem 1rem;
        }

        footer .container {
            max-width: 1200px;
            margin: 100px auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        footer .logo-section {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        footer .logo-section img {
            max-width: 150px;
            height: auto;
        }

        footer h4 {
            color: #1f2937;
            font-weight: 700;
            margin-bottom: 1rem;
            border-bottom: 2px solid #3b82f6;
            padding-bottom: 0.5rem;
        }

        footer p,
        footer a {
            color: #6b7280;
            text-decoration: none;
            margin-bottom: 0.5rem;
            line-height: 1.6;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #2563eb;
            text-decoration: underline;
        }

        footer i {
            color: #3b82f6;
            margin-right: 0.75rem;
            width: 20px;
            text-align: center;
        }

        footer .footer-section {
            display: flex;
            flex-direction: column;
        }

        footer .footer-bottom {
            text-align: center;
            margin-top: 2rem;
            color: #9ca3af;
            font-size: 0.675rem;
            padding-top: 1rem;
            border-top: 1px solid #b9b9b9;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            footer .container {
                grid-template-columns: 1fr;
                text-align: center;
            }

            footer .logo-section {
                justify-content: center;
            }

            footer .footer-section {
                align-items: center;
            }
        }

        /* Accessibility and Touch-friendly Improvements */
        footer a {
            display: inline-flex;
            align-items: center;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        footer a:focus {
            outline: 2px solid #3b82f6;
            outline-offset: 2px;
        }

        /* Hover and focus effect */
        footer a:hover,
        footer a:focus {
            transform: translateX(5px);
        }
    </style>
</head>

<body>
    <footer>
        <div class="container">
            <!-- Logo Section -->
            <div class="footer-section logo-section">
                <img src="{{ asset('images/diskominfo.png') }}" alt="Logo Diskominfo Kubu Raya">
            </div>

            <!-- About Us Section -->
            <div class="footer-section">
                <h4>About Us</h4>
                <p>Sistem Informasi Magang adalah platform untuk mengelola data magang dengan efisien di Diskominfo Kubu Raya.</p>
                <p>Kami berdedikasi untuk memberikan layanan terbaik kepada siswa, mahasiswa, dan instansi.</p>
            </div>

            <!-- Connect & Contact Us Section -->
            <div class="footer-section">
                <h4>Connect & Contact Us</h4>
                <p>
                    <i class="fab fa-instagram"></i>
                    <a href="https://www.instagram.com/diskominfokuburaya" target="_blank" rel="noopener noreferrer">@diskominfokuburaya</a>
                </p>
                <p>
                    <i class="fas fa-globe"></i>
                    <a href="https://kominfo.kuburaya.go.id/" target="_blank" rel="noopener noreferrer">kominfo.kuburaya.go.id</a>
                </p>
                <p>
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:diskominfo@kuburayakab.go.id">diskominfo@kuburayakab.go.id</a>
                </p>
                <p>
                    <i class="fas fa-phone"></i>+62 815 7977 743
                </p>
            </div>

            <!-- Location Section -->
            <div class="footer-section">
                <h4>Location</h4>
                <p>
                    <i class="fas fa-map-marker-alt"></i>
                    <a href="https://maps.app.goo.gl/5A613qYP1bMfx2Kz5" target="_blank" rel="noopener noreferrer">
                        Jl. Arteri Supadio, Kecamatan Sungai Raya, Kab. Kubu Raya
                    </a>
                </p>
            </div>
            <div class="footer-section">
                <p>&copy; 2024 Sistem Informasi Magang. All rights reserved.</p>
            </div>
        </div>

        <!-- Footer Bottom -->

    </footer>
</body>

</html>
