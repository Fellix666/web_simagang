@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Institusi</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('institusi.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label>Nama Institusi</label>
                    <input type="text" name="nama_institusi" class="form-control @error('nama_institusi') is-invalid @enderror" value="{{ old('nama_institusi') }}">
                    @error('nama_institusi')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}">
                    @error('alamat')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label>Website</label>
                    <input type="text" name="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website') }}">
                    @error('website')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('institusi.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection