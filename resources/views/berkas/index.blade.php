@extends('layouts.app')@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Berkas {{ $magang->nama_lengkap }}</h3>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('berkas.store', $magang->id_magang) }}" method="POST" enctype="multipart/form-data">
                @csrf<div class="form-group"><label>Nama Berkas</label><input type="text" name="nama_berkas"
                        class="form-control @error('nama_berkas') is-invalid @enderror">
                    @error('nama_berkas')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group"><label>Jenis Berkas</label><input type="text" name="jenis_berkas"
                        class="form-control @error('jenis_berkas') is-invalid @enderror">
                    @error('jenis_berkas')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group"><label>File</label><input type="file" name="file"
                        class="form-control @error('file') is-invalid @enderror">
                    @error('file')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Berkas</th>
                        <th>Jenis Berkas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($berkas as $file)
                        <tr>
                            <td>{{ $file->nama_berkas }}</td>
                            <td>{{ $file->jenis_berkas }}</td>
                            <td>
                                <form action="{{ route('berkas.destroy', $file->id_berkas) }}" method="POST"
                                    class="d-inline">@csrf@method('DELETE')<button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</button></form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
