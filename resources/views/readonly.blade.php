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

        .pagination {
            margin-top: 2rem;
            gap: 0.5rem;
        }

        .pagination .page-link {
            border-radius: var(--border-radius);
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border: 1px solid #e2e8f0;
            transition: all var(--transition-speed);
        }

        .pagination .page-link:hover {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
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
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mb-4 text-center">Data Peserta Magang</h1>

        <!-- Filter Section -->
        <form id="filterForm" method="GET" action="{{ route('readonly') }}" class="row g-2 justify-content-center mb-3">
            <div class="col-md-4">
                <input type="text" name="search" id="searchBox" class="form-control"
                    placeholder="Cari nama atau institusi..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <select name="status" id="filterRole" class="form-select">
                    <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua</option>
                    <option value="mahasiswa" {{ request('status') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                    <option value="siswa" {{ request('status') == 'siswa' ? 'selected' : '' }}>Siswa</option>
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
                    @if ($magangList->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center text-secondary">Data belum ada</td>
                        </tr>
                    @else
                        @foreach ($magangList as $index => $magang)
                            @php
                                $isOverdue = \Carbon\Carbon::parse($magang->tanggal_selesai)->isPast();
                                $startYear = \Carbon\Carbon::parse($magang->tanggal_mulai)->year;
                            @endphp
                            <tr class="{{ $isOverdue ? 'table-danger' : '' }}" data-year="{{ $startYear }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $magang->nama_lengkap }}</td>
                                <td>{{ $magang->institusi->nama_institusi }}</td>
                                <td>{{ $magang->tanggal_mulai }}</td>
                                <td>{{ $magang->tanggal_selesai }}</td>
                                <td>{{ ucfirst($magang->status) }}</td>
                                <td>{{ $magang->jurusan }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>                
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $magangList->links() }}
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
    const tableBody = document.querySelector('tbody');

    // Store original rows for reference
    const originalRows = Array.from(document.querySelectorAll('tbody tr'));
    let rows = [...originalRows]; // Create a copy of original rows for manipulation

    const noDataRow = document.createElement('tr');
    noDataRow.innerHTML = `<td colspan="7" class="text-center text-secondary">Data belum ada</td>`;
    noDataRow.style.display = 'none'; // Awalnya tersembunyi
    tableBody.appendChild(noDataRow);

    // Mencegah form submit saat menekan Enter
    filterForm.addEventListener('submit', function(event) {
        event.preventDefault();
    });

    // Elemen untuk pesan "Data tidak ditemukan"
    const noDataRow = document.createElement('tr');
    noDataRow.innerHTML = `<td colspan="7" class="text-center text-secondary">Data tidak ditemukan</td>`;
    noDataRow.style.display = 'none';
    tableBody.appendChild(noDataRow);

    const sortRowsByYear = () => {
        const sortedRows = rows.sort((a, b) => {
            const yearA = parseInt(a.getAttribute('data-year'));
            const yearB = parseInt(b.getAttribute('data-year'));
            return yearB - yearA;
        });

        tableBody.innerHTML = ''; // Bersihkan semua baris
        sortedRows.forEach((row, index) => {
            row.querySelector('td:first-child').textContent = index + 1; // Reset nomor urut
            tableBody.appendChild(row);
        });

        tableBody.appendChild(noDataRow); // Tambahkan elemen "Data tidak ditemukan" di akhir
    };

    const filterTable = () => {
        const searchTerm = searchBox.value.toLowerCase();
        const roleFilter = filterRole.value;
        const yearFilter = filterYear.value;
        let visibleRowCount = 0;

        // Reset rows to original state
        rows = [...originalRows];

        // Apply filters
        rows = rows.filter(row => {
            const text = row.textContent.toLowerCase();
            const role = row.cells[5].textContent.toLowerCase();
            const rowYear = row.getAttribute('data-year');

            return (
                text.includes(searchTerm) &&
                (roleFilter === 'all' || role === roleFilter) &&
                (yearFilter === 'all' || rowYear === yearFilter)
            );
        });

        // Update table display
        tableBody.innerHTML = ''; // Clear the table

        if (rows.length > 0) {
            rows.forEach((row, index) => {
                row.querySelector('td:first-child').textContent = index + 1; // Reset nomor urut
                tableBody.appendChild(row);
            });
            noDataRow.style.display = 'none';
        } else {
            noDataRow.style.display = '';
        }

        tableBody.appendChild(noDataRow);
    };

    // Add event listeners
    searchBox.addEventListener('input', filterTable);
    filterRole.addEventListener('change', filterTable);
    filterYear.addEventListener('change', filterTable);

    // Initial sort
    sortRowsByYear();
});x
        </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
