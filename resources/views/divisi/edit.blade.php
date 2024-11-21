@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Divisi</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('divisi.update', $divisi->id_divisi) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label>Nama Divisi</label>
                    <input type="text" name="nama_divisi" class="form-control @error('nama_divisi') is-invalid @enderror" value="{{ old('nama_divisi', $divisi->nama_divisi) }}">
                    @error('nama_divisi')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label>Kepala Divisi</label>
                    <input type="text" name="kepala_divisi" class="form-control @error('kepala_divisi') is-invalid @enderror" value="{{ old('kepala_divisi', $divisi->kepala_divisi) }}">
                    @error('kepala_divisi')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('divisi.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection