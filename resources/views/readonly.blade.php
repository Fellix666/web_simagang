<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peserta Magang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="">
    <style>
        * {
            /* border: 1px solid red !important; */
        }

        :root {
            --primary-color: #2563eb;
            --secondary-color: #999999;
            --background-color: #c2e9f7;
            --text-primary: #1e293b;
            --text-secondary: #999999;
            --border-radius: 12px;
            --transition-speed: 0.3s;
            --card-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --hover-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        }

        body {
            background-color: var(--background-color);
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            /* Tambahkan */
            justify-content: center;
            /* Pusatkan secara horizontal */
            align-items: center;
            /* Pusatkan secara vertikal */
            padding: 2rem;
            /* Pastikan ada ruang jika di mobile */
            margin: 0;
            /* Hilangkan margin bawaan */
        }

        .container {
            background: #ffffff;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            padding: 2rem;
            transition: box-shadow var(--transition-speed);
            max-width: 1200px;
            margin: 0 auto;
        }

        .container:hover {
            box-shadow: var(--hover-shadow);
        }

        h1 {
            color: var(--text-primary);
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 2rem;
            position: relative;
            padding-bottom: 1rem;
        }

        h1:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: var(--primary-color);
            border-radius: 2px;
        }

        .form-control,
        .form-select {
            border-radius: var(--border-radius);
            border: 1px solid #e2e8f0;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            transition: all var(--transition-speed);
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .table-responsive {
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            margin: 2rem 0;
        }

        table {
            margin-bottom: 0 !important;
        }

        table thead th {
            background-color: var(--primary-color);
            color: #ffffff;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 1rem;
            border: none;
        }

        table tbody tr {
            transition: background-color var(--transition-speed);
        }

        table tbody tr:hover {
            background-color: rgba(37, 99, 235, 0.05);
        }

        table td {
            padding: 1rem;
            color: var(--text-secondary);
            border-bottom: 1px solid #e2e8f0;
            font-size: 0.95rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            transition: all var(--transition-speed);
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.1), 0 2px 4px -1px rgba(37, 99, 235, 0.06);
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
                margin: 1rem;
            }

            h1 {
                font-size: 1.5rem;
            }

            table thead th {
                font-size: 0.75rem;
                padding: 0.75rem;
            }

            table td {
                padding: 0.75rem;
                font-size: 0.85rem;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--secondary-color);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-color);
        }
        .status-badge {
            font-weight: 500;
            font-size: 0.675rem;
            text-align: justify;
        }

        td.status-cell-inactive {
            background-color: #e24d4d !important;
            color: white !important;
            text-align: justify !important;
        }
        td.status-cell-active {
            text-align: justify !important;
        }

        .status-active {
            background-color: transparent;
            color: inherit;
            text-align: justify !important;
        }

        .table-striped tbody tr:nth-of-type(odd) td.status-cell-inactive,
        .table-striped tbody tr:nth-of-type(even) td.status-cell-inactive,
        .table tbody tr:hover td.status-cell-inactive {
            background-color:  #f8d7da!important;
            color: #721c24 !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mb-4 text-center">Data Peserta Magang</h1>

        <!-- Filter Section -->
        <form id="filterForm" method="GET" action="{{ route('readonly') }}" class="row g-2 justify-content-center mb-3">
            <div class="col-md-4">
                <input type="text" name="search" id="searchBox" class="form-control"
                    placeholder="Cari nama atau instansi..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <select name="status" id="filterRole" class="form-select">
                    <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="year" id="filterYear" class="form-select">
                    <option value="all" {{ request('year') == 'all' ? 'selected' : '' }}>Semua Tahun</option>
                    @php
                        $uniqueYears = $magangList
                            ->map(function ($magang) {
                                return \Carbon\Carbon::parse($magang->tanggal_mulai)->year;
                            })
                            ->unique()
                            ->sort()
                            ->values();
                    @endphp
                    @foreach ($uniqueYears as $year)
                        <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        <!-- Table Section -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th style="min-width: 50px;">No</th>
                        <th style="min-width: 150px;">Nama</th>
                        <th style="min-width: 200px;">Universitas/Sekolah</th>
                        <th style="min-width: 150px;">Tanggal Mulai</th>
                        <th style="min-width: 150px;">Tanggal Selesai</th>
                        <th style="min-width: 100px;">Status</th>
                        <th style="min-width: 100px;">Jurusan</th>
                    </tr>
                </thead>
                 <tbody>
            @foreach ($magangList as $index => $magang)
                @php
                    $now = \Carbon\Carbon::now();
                    $endDate = \Carbon\Carbon::parse($magang->tanggal_selesai);
                    $isActive = $endDate->isFuture();
                    $startYear = \Carbon\Carbon::parse($magang->tanggal_mulai)->year;
                @endphp
                 <tr data-year="{{ $startYear }}" data-status="{{ $isActive ? 'active' : 'inactive' }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $magang->nama_lengkap }}</td>
                    <td>{{ $magang->institusi->nama_institusi }}</td>
                    <td>{{ $magang->tanggal_mulai }}</td>
                    <td>{{ $magang->tanggal_selesai }}</td>
                    <td class="{{ !$isActive ? 'status-cell-inactive' : 'status-cell-active' }}">
                        {{ $isActive ? 'Aktif' : 'Tidak Aktif' }}
                    </td>
                    <td>{{ $magang->jurusan }}</td>
                </tr>
            @endforeach
        </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div>
            {{ $magangList->links('pagination::bootstrap-5') }}
        </div>

        <div class="text-center mt-3">
            @auth
                @if (auth())
                    {{-- Assuming user ID 1 is the admin --}}
                    <a href="{{ route('dashboard.index') }}" class="btn btn-primary">Dashboard Admin</a>
                @endif
            @else
                <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Halaman Utama</a>
            @endauth
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
    const filterForm = document.getElementById('filterForm');
    const searchBox = document.getElementById('searchBox');
    const filterRole = document.getElementById('filterRole');
    const filterYear = document.getElementById('filterYear');

    // Function to handle filter changes
    const handleFilterChange = () => {
        filterForm.submit();
    };

    // Add debounce function for search
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Debounced search handler
    const debouncedSearch = debounce(() => {
        handleFilterChange();
    }, 500);

    // Event listeners
    searchBox.addEventListener('input', debouncedSearch);
    filterRole.addEventListener('change', handleFilterChange);
    filterYear.addEventListener('change', handleFilterChange);
});
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
