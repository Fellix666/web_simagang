@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Berkas</h3>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Form to create a new berkas -->
            <form action="{{ route('berkas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Hidden field for id_magang (this can be passed from a parent view or controller) -->
                <input type="hidden" name="id_magang" value="{{ $id_magang ?? '' }}">

                <div class="form-group mb-3">
                    <label for="nama_berkas">Nama Berkas</label>
                    <input type="text" name="nama_berkas" id="nama_berkas" class="form-control @error('nama_berkas') is-invalid @enderror" value="{{ old('nama_berkas') }}" required>
                    @error('nama_berkas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Asal Berkas</label>
                    <input type="text" name="asal_berkas" class="form-control @error('asal_berkas') is-invalid @enderror" value="{{ old('asal_berkas') }}" required>
                    @error('asal_berkas')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Nomor Berkas</label>
                    <input type="text" name="nomor_berkas" class="form-control @error('nomor_berkas') is-invalid @enderror" value="{{ old('nomor_berkas') }}" required>
                    @error('nomor_berkas')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Tanggal Berkas</label>
                    <input type="date" name="tanggal_berkas" class="form-control @error('tanggal_berkas') is-invalid @enderror" value="{{ old('tanggal_berkas') }}" required>
                    @error('tanggal_berkas')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="file">File</label>
                    <input type="file" name="file_path" id="file" class="form-control @error('file_path') is-invalid @enderror">
                    @error('file_path')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('berkas.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
