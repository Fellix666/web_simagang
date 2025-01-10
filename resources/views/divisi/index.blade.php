@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Divisi</h3>
                <div class="card-tools">
                    <a href="{{ route('divisi.create') }}" class="btn btn-primary">Tambah Divisi</a>
                </div>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Divisi</th>
                                <th>Kepala Divisi</th>
                                <th>Pangkat Golongan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($divisi as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama_divisi }}</td>
                                    <td>{{ $item->kepala_divisi }}</td>
                                    <td>{{ $item->pangkat }}</td>
                                    <td>
                                        <a href="{{ route('divisi.edit', $item->id_divisi) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('divisi.destroy', $item->id_divisi) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete(event)">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $divisi->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
