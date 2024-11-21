<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peserta Magang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .filter-section {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Data Peserta Magang</h1>


        <form method="GET" action="{{ route('readonly') }}" class="mb-4">
            <div class="row g-2">
                <div class="col-md-6">
                    <input type="text" name="search" id="searchBox" class="form-control" placeholder="Cari nama atau institusi..." value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <select name="status" id="filterRole" class="form-select">
                        <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua</option>
                        <option value="mahasiswa" {{ request('status') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                        <option value="siswa" {{ request('status') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                    </select>
                </div>
            </div>
        </form>

        <!-- Table Section -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Universitas/Sekolah</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($magangList as $index => $magang)
                        <tr data-role="{{ $magang->status }}">
                            <td>{{ $index + 1 }}</td>
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
        <div class="d-flex justify-content-center mt-4">
            {{ $magangList->links() }}
        </div>


        <!-- Back Button -->
        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Halaman Utama</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dataTable = document.getElementById('dataTable');
            const searchBox = document.getElementById('searchBox');
            const filterRole = document.getElementById('filterRole');

            // Filter and Search in the Frontend
            const filterTable = () => {
                const searchTerm = searchBox.value.toLowerCase();
                const roleFilter = filterRole.value.toLowerCase();
                const rows = dataTable.querySelectorAll('tbody tr');

                rows.forEach(row => {
                    const rowRole = row.getAttribute('data-role').toLowerCase();
                    const rowText = row.textContent.toLowerCase();

                    const matchesSearch = rowText.includes(searchTerm);
                    const matchesRole = roleFilter === 'all' || rowRole === roleFilter;

                    row.style.display = matchesSearch && matchesRole ? '' : 'none';
                });
            };

            // Attach Events
            searchBox.addEventListener('input', filterTable);
            filterRole.addEventListener('change', filterTable);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
