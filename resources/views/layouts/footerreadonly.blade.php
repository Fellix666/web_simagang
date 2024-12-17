<!-- Footer Section -->
<footer class="footer bg-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo Section (Left Side) -->
            <div class="col-md-3 text-center mb-3 mb-md-0">
                <img src="{{ asset('images/diskominfo.png') }}" alt="Logo Diskominfo Kubu Raya" class="img-fluid" style="max-height: 120px;">
            </div>

            <!-- About Us Section -->
            <div class="col-md-3 mb-4">
                <h5 class="text-primary mb-3">Tentang Kami</h5>
                <p class="text-secondary">
                    Sistem Informasi dan Manajemen Magang adalah platform digital yang dirancang untuk memudahkan
                    proses pendaftaran, pelacakan, dan pengelolaan program magang.
                </p>
            </div>

            <!-- Contact Section -->
            <div class="col-md-3 mb-4">
                <h5 class="text-primary mb-3">Hubungi Kami</h5>
                <div class="social-links">
                    <p class="mb-2">
                        <a href="https://www.instagram.com/diskominfokuburaya" target="_blank" class="text-secondary text-decoration-none">
                            <i class="bi bi-instagram me-2"></i>@diskominfokuburaya
                        </a>
                    </p>
                    <p class="mb-2">
                        <a href="https://kominfo.kuburaya.go.id/" target="_blank" class="text-secondary text-decoration-none">
                            <i class="bi bi-globe me-2"></i>kominfo.kuburaya.go.id
                        </a>
                    </p>
                    <p class="mb-2">
                        <a href="mailto:diskominfo@kuburayakab.go.id" class="text-secondary text-decoration-none">
                            <i class="bi bi-envelope me-2"></i>diskominfo@kuburayakab.go.id
                        </a>
                    </p>
                </div>
            </div>

            <!-- Location Section -->
            <div class="col-md-3 mb-4">
                <h5 class="text-primary mb-3">Lokasi</h5>
                <p class="text-secondary">
                    Jl. Arteri Supadio, Kecamatan Sungai Raya,
                    Kab. Kubu Raya, Kalimantan Barat
                </p>
                <a href="https://maps.app.goo.gl/5A613qYP1bMfx2Kz5" target="_blank" class="text-secondary text-decoration-none">
                    <i class="bi bi-map me-2"></i>Lihat Peta
                </a>
            </div>
        </div>

        <!-- Copyright -->
        <hr class="my-4 border-secondary">
        <div class="text-center text-secondary">
            &copy; 2024 Sistem Informasi Manajemen Magang. All Rights Reserved.
        </div>
    </div>
</footer>

<!-- Additional CSS -->
<style>
    .footer {
        background-color: #ffffff;
        color: var(--text-secondary);
        border-top: 1px solid #e2e8f0;
        margin: 260px auto;
    }

    .footer h5 {
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .footer .social-links a {
        transition: color 0.3s ease;
    }

    .footer .social-links a:hover {
        color: var(--primary-color, #007bff);
    }

    @media (max-width: 768px) {
        .footer .row {
            text-align: center;
        }
    }
</style>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
