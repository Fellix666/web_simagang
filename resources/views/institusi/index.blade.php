@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Institusi</h3>
            <div class="card-tools">
                <a href="{{ route('institusi.create') }}" class="btn btn-primary">Tambah Institusi</a>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Institusi</th>
                        <th>Alamat</th>
                        <th>Website</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($institusi as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama_institusi }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->website }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a href="{{ route('institusi.edit', $item->id_institusi) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('institusi.destroy', $item->id_institusi) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="confirmDelete(event)">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $institusi->links() }}
        </div>
    </div>
</div>
@endsection