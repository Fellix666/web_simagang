@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Berkas</h3>
        </div>
        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <form action="{{ route('berkas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="nama_berkas">Nama Berkas</label>
                <input type="text" name="nama_berkas" class="form-control @error('nama_berkas') is-invalid @enderror" value="{{ old('nama_berkas') }}" required>
                @error('nama_berkas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label>Asal Berkas (Instansi)</label>
                <select name="asal_berkas" class="form-control @error('asal_berkas') is-invalid @enderror" required>
                    <option value="" disabled selected>Pilih Instansi</option>
                    @foreach ($institusi as $inst)
                        <option value="{{ $inst->id_institusi }}" 
                            {{ old('asal_berkas') == $inst->id_institusi ? 'selected' : '' }}>
                            {{ $inst->nama_institusi }}
                        </option>
                    @endforeach
                </select>
                @error('asal_berkas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label>Nomor Berkas</label>
                <input type="text" name="nomor_berkas" class="form-control @error('nomor_berkas') is-invalid @enderror" value="{{ old('nomor_berkas') }}" required>
                @error('nomor_berkas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label>Tanggal Berkas</label>
                <input type="date" name="tanggal_berkas" class="form-control @error('tanggal_berkas') is-invalid @enderror" value="{{ old('tanggal_berkas') }}" required>
                @error('tanggal_berkas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label>File</label>
                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" required>
                @error('file')
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