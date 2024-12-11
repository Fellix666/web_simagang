@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Divisi</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('divisi.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label>Nama Divisi</label>
                    <input type="text" name="nama_divisi" class="form-control @error('nama_divisi') is-invalid @enderror" value="{{ old('nama_divisi') }}">
                    @error('nama_divisi')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label>Kepala Divisi</label>
                    <input type="text" name="kepala_divisi" class="form-control @error('kepala_divisi') is-invalid @enderror" value="{{ old('kepala_divisi') }}">
                    @error('kepala_divisi')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label>Pangkat Golongan</label>
                    <select name="pangkat" class="form-control @error('pangkat') is-invalid @enderror">
                        <option value="" disabled selected>Pilih Pangkat Golongan</option>
                        <option value="I/a" {{ old('pangkat') == 'I/a' ? 'selected' : '' }}>I/a - Juru Muda</option>
                        <option value="I/b" {{ old('pangkat') == 'I/b' ? 'selected' : '' }}>I/b - Juru Muda Tingkat I</option>
                        <option value="I/c" {{ old('pangkat') == 'I/c' ? 'selected' : '' }}>I/c - Juru</option>
                        <option value="I/d" {{ old('pangkat') == 'I/d' ? 'selected' : '' }}>I/d - Juru Tingkat I</option>
                        <option value="II/a" {{ old('pangkat') == 'II/a' ? 'selected' : '' }}>II/a - Pengatur Muda</option>
                        <option value="II/b" {{ old('pangkat') == 'II/b' ? 'selected' : '' }}>II/b - Pengatur Muda Tingkat I</option>
                        <option value="II/c" {{ old('pangkat') == 'II/c' ? 'selected' : '' }}>II/c - Pengatur</option>
                        <option value="II/d" {{ old('pangkat') == 'II/d' ? 'selected' : '' }}>II/d - Pengatur Tingkat I</option>
                        <option value="III/a" {{ old('pangkat') == 'III/a' ? 'selected' : '' }}>III/a - Penata Muda</option>
                        <option value="III/b" {{ old('pangkat') == 'III/b' ? 'selected' : '' }}>III/b - Penata Muda Tingkat I</option>
                        <option value="III/c" {{ old('pangkat') == 'III/c' ? 'selected' : '' }}>III/c - Penata</option>
                        <option value="III/d" {{ old('pangkat') == 'III/d' ? 'selected' : '' }}>III/d - Penata Tingkat I</option>
                        <option value="IV/a" {{ old('pangkat') == 'IV/a' ? 'selected' : '' }}>IV/a - Pembina</option>
                        <option value="IV/b" {{ old('pangkat') == 'IV/b' ? 'selected' : '' }}>IV/b - Pembina Tingkat I</option>
                        <option value="IV/c" {{ old('pangkat') == 'IV/c' ? 'selected' : '' }}>IV/c - Pembina Utama Muda</option>
                        <option value="IV/d" {{ old('pangkat') == 'IV/d' ? 'selected' : '' }}>IV/d - Pembina Utama Madya</option>
                        <option value="IV/e" {{ old('pangkat') == 'IV/e' ? 'selected' : '' }}>IV/e - Pembina Utama</option>
                    </select>
                    @error('pangkat')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('divisi.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
