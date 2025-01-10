@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Berkas</h3>
            <div class="card-tools">
                <a href="{{ route('berkas.create') }}" class="btn btn-primary">Tambah Berkas</a>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Berkas</th>
                            <th>Asal Berkas</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal Surat</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($berkas as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <a href="{{ route('berkas.show', $item->id_berkas) }}" class="font-weight-bold nama-berkas" style="color: inherit" >
                                    {{ $item->nama_berkas }}
                                </a>
                            </td>
                            <td>{{ $item->institusi->nama_institusi }}</td>
                            <td>{{ $item->nomor_berkas }}</td>
                            <td>{{ $item->tanggal_berkas }}</td>

                            <td>
                                @if($item->file_path)
                                @php
                                    $extension = pathinfo($item->file_path, PATHINFO_EXTENSION);
                                    $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
                                    @endphp
                                @if($isImage)
                                <img src="{{ asset('storage/berkas/' . basename($item->file_path)) }}"
                                alt="{{ $item->nama_berkas }}"
                                style="max-width: 100px; max-height: 100px;">
                                @else
                                <a href="{{ asset('storage/berkas/' . basename($item->file_path)) }}"
                                    target="_blank">Download</a>
                                    @endif
                                    @else
                                    <span class="text-muted">No file</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('berkas.edit', $item->id_berkas) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('berkas.destroy', $item->id_berkas) }}"
                                            method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="confirmDelete(event)">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $berkas->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Menambahkan efek hover untuk garis bawah pada link */
    .nama-berkas {
        color: black;
        text-decoration: none; /* Menghilangkan garis bawah default */
        transition: text-decoration 0.3s ease-in-out; /* Menambahkan transisi */
    }

    .nama-berkas:hover {
        text-decoration: underline; /* Menambahkan garis bawah saat hover */
    }
</style>
@endsection
