<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peserta Magang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="">
    <style>
        :root {
            --primary-color: #3b82f6;
            --secondary-color: #6366f1;
            --accent-color: #10b981;
            --background-color: #f0f9ff;
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --border-color: #e2e8f0;
            --border-radius: 16px;
            --transition-speed: 0.4s;
            --box-shadow-smooth: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
        }

        body {
            background: linear-gradient(135deg, var(--background-color), #e6f2ff);
            font-family: 'Poppins', 'Inter', sans-serif;
            color: var(--text-primary);
            min-height: 100vh;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow-smooth);
            padding: 2rem;
            margin: 1rem auto;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        h1 {
            color: var(--primary-color);
            font-weight: bold;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .form-control,
        .form-select {
            border-radius: var(--border-radius);
            border: 1px solid var(--border-color);
            padding: 0.75rem;
            font-size: 0.95rem;
            transition: all var(--transition-speed);
        }

        .table-responsive {
            margin-top: 2rem;
            overflow-x: auto;
        }

        table {
            width: 100%;
            /* Tabel selalu mengambil lebar penuh */
            table-layout: auto;
            /* Kolom akan menyesuaikan kontennya */
            border-spacing: 0;
        }

        th,
        td {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        thead th {
            background: var(--primary-color);
            color: #fff;
            font-size: 0.85rem;
            padding: 1rem;
        }

        tbody tr {
            border-bottom: 1px solid var(--border-color);
            transition: background 0.3s;
        }

        tbody tr:hover {
            background: rgba(37, 99, 235, 0.1);
        }

        tbody td {
            padding: 1rem;
            color: var(--text-secondary);
        }

        .btn-primary {
            background: var(--primary-color);
            border-radius: var(--border-radius);
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            transition: all var(--transition-speed);
        }

        .btn-primary:hover {
            background: #1d4ed8;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .pagination .page-link {
            border-radius: var(--border-radius);
            transition: background var(--transition-speed);
        }

        @media (max-width: 768px) {

            table {
                font-size: 0.85rem;
            }

            .container {
                padding: 1.5rem;
            }

            h1 {
                font-size: 1.5rem;
            }

            .form-control,
            .form-select {
                padding: 0.6rem;
                font-size: 0.85rem;
            }

            table thead th,
            table tbody td {
                font-size: 0.8rem;
                padding: 0.75rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Data Peserta Magang</h1>

        <!-- Filter Section -->
        <form method="GET" action="{{ route('readonly') }}" class="row g-2 justify-content-center mb-3">
            <div class="col-md-6">
                <input type="text" name="search" id="searchBox" class="form-control"
                    placeholder="Cari nama atau institusi..." value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <select name="status" id="filterRole" class="form-select">
                    <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua</option>
                    <option value="mahasiswa" {{ request('status') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa
                    </option>
                    <option value="siswa" {{ request('status') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                </select>
            </div>
        </form>

        <!-- Table Section -->
        <div class="table-responsive">
            <table class="table table-bordered text-center table-sm">
                <thead>
                    <tr>
                        <th style="min-width: 50px;">No</th>
                        <th style="min-width: 150px;">Nama</th>
                        <th style="min-width: 200px;">Universitas/Sekolah</th>
                        <th style="min-width: 150px;">Tanggal Mulai</th>
                        <th style="min-width: 150px;">Tanggal Selesai</th>
                        <th style="min-width: 100px;">Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($magangList as $index => $magang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $magang->nama_lengkap }}</td>
                            <td>{{ $magang->institusi->nama_institusi }}</td>
                            <td>{{ $magang->tanggal_mulai }}</td>
                            <td>{{ $magang->tanggal_selesai }}</td>
                            <td>{{ ucfirst($magang->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $magangList->links() }}
        </div>

        <div class="text-center mt-3">
            @auth
                <a href="{{ route('dashboard.index') }}" class="btn btn-primary">Kembali Ke Dashboard</a>
            @else
                <a href="{{ route('home') }}" class="btn btn-primary">Kembali Ke Halaman Utama</a>
            @endauth
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchBox = document.getElementById('searchBox');
            const filterRole = document.getElementById('filterRole');
            const rows = Array.from(document.querySelectorAll('tbody tr'));

            const filterTable = () => {
                const searchTerm = searchBox.value.toLowerCase();
                const roleFilter = filterRole.value;

                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    const role = row.cells[5].textContent.toLowerCase();

                    row.style.display = (text.includes(searchTerm) && (roleFilter === 'all' || role ===
                        roleFilter)) ? '' : 'none';
                });
            };

            searchBox.addEventListener('input', filterTable);
            filterRole.addEventListener('change', filterTable);
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
