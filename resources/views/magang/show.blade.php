@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Internship Details</h3>
                <a href="{{ route('magang.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-circle-left me-2"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Kolom Kiri: Foto dan Info Dasar -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                @if ($magang->berkas && $magang->berkas->file_path)
                                    @php
                                        $extension = pathinfo($magang->berkas->file_path, PATHINFO_EXTENSION);
                                        $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
                                    @endphp
                                    @if ($isImage)
                                        <img src="{{ asset('storage/berkas_photos/' . basename($magang->berkas->file_path)) }}"
                                            alt="{{ $magang->berkas->nama_berkas }}" class="img-thumbnail mb-3"
                                            style="max-width: 100%; max-height: 250px; object-fit: cover;">
                                    @else
                                        <div class="alert alert-info">
                                            <i class="fas fa-file-alt fa-2x mb-2"></i>
                                            <p class="mb-0">File tersedia</p>
                                            <a href="{{ asset('storage/berkas_photos/' . basename($magang->berkas->file_path)) }}"
                                                class="btn btn-sm btn-primary mt-2" target="_blank">
                                                Download File
                                            </a>
                                        </div>
                                    @endif
                                @else
                                    <div class="alert alert-secondary">
                                        <i class="fas fa-user fa-3x mb-2"></i>
                                        <p>Foto tidak tersedia</p>
                                    </div>
                                @endif

                                <h4 class="font-weight-bold mt-3">{{ $magang->nama_lengkap }}</h4>
                                <p class="text-muted mb-2">{{ ucfirst($magang->status) }}</p>
                                <p class="text-muted">{{ $magang->nomor_induk }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan: Detail Informasi -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="border-bottom pb-2">Informasi Akademik</h5>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <p><strong>Nama Lengkap:</strong><br>{{ $magang->nama_lengkap }}</p>
                                        <p><strong>Nomor Induk:</strong><br>{{ $magang->nomor_induk }}</p>
                                        <p><strong>Jenis Kelamin:</strong><br>
                                            {{ $magang->jenis_kelamin === 'l' ? 'Laki-laki' : 'Perempuan' }}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Instansi:</strong><br>{{ $magang->institusi->nama_institusi }}</p>
                                        <p><strong>Jurusan:</strong><br>{{ $magang->jurusan }}</p>
                                        <p><strong>Status:</strong><br>{{ ucfirst($magang->status) }}</p>
                                    </div>
                                </div>

                                <h5 class="border-bottom pb-2">Informasi Magang</h5>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <p><strong>Divisi:</strong><br>{{ $magang->divisi->nama_divisi }}</p>
                                        <p><strong>Kepala Divisi:</strong><br>{{ $magang->divisi->kepala_divisi }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Tanggal Mulai:</strong><br>
                                            {{ \Carbon\Carbon::parse($magang->tanggal_mulai)->format('d F Y') }}
                                        </p>
                                        <p><strong>Tanggal Selesai:</strong><br>
                                            {{ \Carbon\Carbon::parse($magang->tanggal_selesai)->format('d F Y') }}
                                        </p>
                                    </div>
                                </div>

                                @php
                                    $startDate = \Carbon\Carbon::parse($magang->tanggal_mulai);
                                    $endDate = \Carbon\Carbon::parse($magang->tanggal_selesai);
                                    $duration = $startDate->diffInDays($endDate);
                                @endphp
                                <div class="alert alert-info">
                                    <h6 class="mb-0">Durasi Magang:</h6>
                                    <p class="mb-0">{{ $duration }} hari</p>
                                </div>
                                <div id="countdown"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const startDate = new Date('{{ $magang->tanggal_mulai }}');
            const endDate = new Date('{{ $magang->tanggal_selesai }}');
            const countdownElement = document.getElementById('countdown');

            function updateCountdown() {
                const now = new Date();

                if (now < startDate) {
                    const timeToStart = Math.ceil((startDate - now) / (1000 * 60 * 60 * 24));
                    countdownElement.innerHTML = `
                        <div class="alert alert-primary">
                            Magang akan dimulai dalam ${timeToStart} hari
                        </div>`;
                } else if (now > endDate) {
                    countdownElement.innerHTML = `
                        <div class="alert alert-secondary">
                            Magang telah selesai
                        </div>`;
                } else {
                    const daysLeft = Math.ceil((endDate - now) / (1000 * 60 * 60 * 24));
                    countdownElement.innerHTML = `
                        <div class="alert alert-success">
                            Sisa waktu magang: ${daysLeft} hari
                        </div>`;
                }
            }

            updateCountdown();
            setInterval(updateCountdown, 1000);
        });
    </script>
@endsection

@section('styles')
    <style>
        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        .alert {
            border-radius: 0.5rem;
        }

        strong {
            color: #2c3e50;
        }
    </style>
@endsection
