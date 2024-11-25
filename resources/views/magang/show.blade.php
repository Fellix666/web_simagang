@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Detail Anak Magang</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Foto -->
                <div class="col-md-4">
                    @if($magang->berkas && $magang->berkas->file_path)
                        @php
                            // Ambil ekstensi file untuk memeriksa apakah itu gambar atau bukan
                            $extension = pathinfo($magang->berkas->file_path, PATHINFO_EXTENSION);
                            $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
                        @endphp
                        @if($isImage)
                            <!-- Jika file adalah gambar, tampilkan gambar -->
                            <img src="{{ asset('storage/berkas_photos/' . basename($magang->berkas->file_path)) }}" 
                                 alt="{{ $magang->berkas->nama_berkas }}" 
                                 style="max-width: 100%; max-height: 250px;">
                        @else
                            <!-- Jika bukan gambar, tampilkan link download -->
                            <a href="{{ asset('storage/berkas_photos/' . basename($magang->berkas->file_path)) }}" target="_blank">
                                Download Berkas
                            </a>
                        @endif
                    @else
                        <p>No photo available</p>
                    @endif
                </div>

                <!-- Informasi Detail -->
                <div class="col-md-8">
                    <h4>{{ $magang->nama_lengkap }}</h4>
                    <p><strong>Institusi:</strong> {{ $magang->institusi->nama_institusi }}</p>
                    <p><strong>Divisi:</strong> {{ $magang->divisi->nama_divisi }}</p>
                    <p><strong>Kepala Divisi:</strong> {{ $magang->divisi->kepala_divisi }}</p>
                    <p><strong>Tanggal Mulai:</strong> {{ $magang->tanggal_mulai }}</p>
                    <p><strong>Tanggal Selesai:</strong> {{ $magang->tanggal_selesai }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
