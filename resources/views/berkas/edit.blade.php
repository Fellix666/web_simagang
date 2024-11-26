@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Berkas</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('berkas.update', $berkas->id_berkas) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group mb-3">
                    <label>Nama Berkas</label>
                    <input type="text" name="nama_berkas" class="form-control @error('nama_berkas') is-invalid @enderror" value="{{ old('nama_berkas', $berkas->nama_berkas) }}">
                    @error('nama_berkas')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label>Jenis Berkas</label>
                    <input type="text" name="jenis_berkas" class="form-control @error('jenis_berkas') is-invalid @enderror" value="{{ old('jenis_berkas', $berkas->jenis_berkas) }}">
                    @error('jenis_berkas')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label>File</label>
                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                    @error('file')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label>Current File</label>
                    <div>
                        @php
                            $extension = pathinfo($berkas->file_path, PATHINFO_EXTENSION);
                            $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
                        @endphp
                
                        @if($isImage)
                            <!-- Menampilkan gambar jika file adalah gambar -->
                            <img src="{{ Storage::url($berkas->file_path) }}" 
                                 alt="Current File" 
                                 style="max-width: 200px; max-height: 200px;" 
                                 class="img-thumbnail">
                        @else
                            <!-- Jika file bukan gambar, tetap tampilkan tautan -->
                            <a href="{{ Storage::url($berkas->file_path) }}" target="_blank">View Current File</a>
                        @endif
                    </div>
                </div>                
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('berkas.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
