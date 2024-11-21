<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peserta Magang - Diskominfo Kubu Raya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .table-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 20px;
            margin-top: 30px;
        }
        .table-hover tbody tr:hover {
            background-color: rgba(52,152,219,0.1);
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-container {
            display: flex;
            gap: 10px;
        }
        .btn-custom {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .pagination {
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="table-container">
            <div class="header-container">
                <h2 class="text-primary">
                    <i class="bi bi-people-fill me-2"></i>Daftar Peserta Magang
                </h2>
                <div class="search-container">
                    <form class="d-flex" method="GET" action="{{ route('magang.index') }}">
                        <input class="form-control me-2" type="search" name="search" placeholder="Cari Peserta..." value="{{ request('search') }}">
                        <button class="btn btn-primary btn-custom" type="submit">
                            <i class="bi bi-search"></i>Cari
                        </button>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Institusi</th>
                            <th>Divisi</th>
                            <th>Tanggal Mulai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($magangList as $index => $magang)
                            <tr>
                                <td>{{ $magangList->firstItem() + $index }}</td>
                                <td>{{ $magang->nama }}</td>
                                <td>{{ $magang->institusi->nama }}</td>
                                <td>{{ $magang->divisi->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($magang->tanggal_mulai)->format('d M Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('magang.show', $magang->id) }}" class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('magang.edit', $magang->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    Tidak ada data peserta magang
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-muted">
                    Menampilkan {{ $magangList->firstItem() }} - {{ $magangList->lastItem() }}
                    dari {{ $magangList->total() }} peserta
                </div>
                <div>
                    {{ $magangList->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

        <div class="text-center mt-3">
            <a href="{{ route('home') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali ke Beranda
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
