@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Anak Magang</h3>
            <div class="card-tools"><a href="{{ route('magang.create') }}" class="btn btn-primary">Tambah Data</a></div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered"<thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Institusi</th>
                    <th>Divisi</th>
                    <th>Status</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($magangList as $index => $magang)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $magang->nama_lengkap }}</td>
                            <td>{{ $magang->institusi->nama_institusi }}</td>
                            <td>{{ $magang->divisi->nama_divisi }}</td>
                            <td>{{ ucfirst($magang->status) }}</td>
                            <td>{{ $magang->tanggal_mulai }}</td>
                            <td>{{ $magang->tanggal_selesai }}</td>
                            <td><a href="{{ route('magang.edit', $magang->id_magang) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('magang.destroy', $magang->id_magang) }}" method="POST"
                                    class="d-inline">@csrf@method('DELETE')<button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</button></form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>{{ $magangList->links() }}</div< /div>
        </div>
    @endsection
