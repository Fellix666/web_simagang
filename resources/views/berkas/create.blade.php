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

                <div class="form-group">
                    <label for="nama_berkas">Nama Berkas</label>
                    <input type="text" name="nama_berkas" id="nama_berkas" class="form-control" value="{{ old('nama_berkas') }}" required>
                    @error('nama_berkas')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                

                <div class="form-group">
                    <label for="jenis_berkas">Jenis Berkas</label>
                    <input type="text" name="jenis_berkas" id="jenis_berkas" class="form-control" value="{{ old('jenis_berkas') }}" required>
                    @error('jenis_berkas')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" name="file" id="file" class="form-control">
                    @error('file')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('berkas.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection