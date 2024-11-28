@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Detail Berkas</h3>
            <a href="{{ route('berkas.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <!-- Bagian Informasi Berkas -->
            <div class="row mb-4">
                <div class="col-md-4 text-center">
                    @if($berkas->file_path)
                        @php
                            $extension = pathinfo($berkas->file_path, PATHINFO_EXTENSION);
                            $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
                        @endphp
                        @if($isImage)
                            <img src="{{ asset('storage/berkas_photos/' . basename($berkas->file_path)) }}" 
                                 alt="{{ $berkas->nama_berkas }}" 
                                 class="img-thumbnail"
                                 style="max-width: 100%; max-height: 250px; object-fit: cover;">
                        @else
                            <div class="alert alert-info">
                                <i class="fas fa-file-alt fa-3x mb-2"></i>
                                <p class="mb-0">File Tersedia</p>
                            </div>
                        @endif
                        <br>
                        <a href="{{ asset('storage/berkas_photos/' . basename($berkas->file_path)) }}" 
                           class="btn btn-sm btn-primary mt-2" 
                           download>
                            Download Foto
                        </a>
                    @else
                        <div class="alert alert-secondary">
                            <i class="fas fa-file fa-3x mb-2"></i>
                            <p>Berkas tidak tersedia</p>
                        </div>
                    @endif
                </div>
                <div class="col-md-8">
                    <h5><strong>Nama Berkas:</strong></h5>
                    <h6>{{ $berkas->nama_berkas }}</h6>

                    <h5><strong>Jenis Berkas:</strong></h5>
                    <h6>{{ $berkas->jenis_berkas }}</h6>
                </div>
            </div>

            <!-- Bagian Informasi Terkait -->
            <h5 class="border-bottom pb-2">Informasi Terkait</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Institusi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($berkas->anakMagang as $index => $magang)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><a href="{{ route('magang.show', $magang->id_magang) }}" class="font-weight-bold nama-lengkap">
                                    {{ $magang->nama_lengkap }}
                                </a></td>
                                <td>{{ $magang->nomor_induk }}</td>
                                <td>{{ $magang->institusi->nama_institusi }}</td>
                                <td>{{ ucfirst($magang->status) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data terkait</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
.card {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #eee;
}

.img-thumbnail {
    border-radius: 0.5rem;
    margin-bottom: 15px;
}

.table th, .table td {
    vertical-align: middle;
}

.alert {
    border-radius: 0.5rem;
}
.nama-lengkap {
            color: black;
            text-decoration: none; /* Menghilangkan garis bawah default */
            transition: text-decoration 0.3s ease-in-out; /* Menambahkan transisi */
        }

        .nama-lengkap:hover {
            text-decoration: underline; /* Menambahkan garis bawah saat hover */
        }
</style>
@endsection
