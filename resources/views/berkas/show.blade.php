@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Detail Berkas</h3>
                <a href="{{ route('berkas.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-circle-left me-2"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <!-- Bagian Informasi Berkas -->
                <div class="row mb-4">
                    <div class="col-md-4 text-center">
                        @if ($berkas->file_path)
                            @php
                                $extension = pathinfo($berkas->file_path, PATHINFO_EXTENSION);
                                $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
                            @endphp
                            @if ($isImage)
                                <div class="image-container">
                                    <img src="{{ asset('storage/berkas/' . basename($berkas->file_path)) }}"
                                        alt="{{ $berkas->nama_berkas }}" class="img-thumbnail image-hover"
                                        style="max-width: 100%; max-height: 250px; object-fit: cover;">
                                    <div class="image-overlay">
                                        <div class="overlay-buttons">
                                            <a href="{{ asset('storage/berkas/' . basename($berkas->file_path)) }}"
                                                class="btn btn-primary btn-sm" target="_blank">
                                                <i class="fas fa-eye"></i> Lihat Detail
                                            </a>
                                            <a href="{{ asset('storage/berkas/' . basename($berkas->file_path)) }}"
                                                class="btn btn-success btn-sm ml-2" download>
                                                <i class="fas fa-download"></i> Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    <i class="fas fa-file-alt fa-3x mb-2"></i>
                                    <p class="mb-0">File Tersedia</p>
                                </div>
                            @endif
                        @else
                            <div class="alert alert-secondary">
                                <i class="fas fa-file fa-3x mb-2"></i>
                                <p>Berkas tidak tersedia</p>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <p><strong>Nama Berkas:</strong><br>{{ $berkas->nama_berkas }}</p>

                        <p><strong>Asal Berkas:</strong><br>{{ $berkas->institusi->nama_institusi }}</p>

                        <p><strong>Nomor Berkas:</strong><br>{{ $berkas->nomor_berkas }}</p>

                        <p><strong>Tanggal Berkas :</strong><br>{{ $berkas->tanggal_berkas }}</p>
                    </div>
                </div>

                <!-- Bagian Informasi Terkait -->
                <h5 class="border-bottom pb-2">Informasi anak magang</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nomor induk</th>
                                <th>Instansi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($berkas->anakMagang as $index => $magang)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><a href="{{ route('magang.show', $magang->id_magang) }}"
                                            class="font-weight-bold nama-lengkap">
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
            transition: opacity 0.3s ease;
        }

        .image-container {
            position: relative;
            display: inline-block;
        }

        .image-hover {
            transition: opacity 0.3s ease;
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .image-container:hover .image-overlay {
            opacity: 1;
        }

        .overlay-buttons {
            display: flex;
            gap: 10px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .alert {
            border-radius: 0.5rem;
        }

        .nama-lengkap {
            color: black;
            text-decoration: none;
            transition: text-decoration 0.3s ease-in-out;
        }

        .nama-lengkap:hover {
            text-decoration: underline;
        }

        h6{
            color: #a6a6a7;
        }
    </style>
@endsection
