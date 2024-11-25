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
            <table class="table table-bordered"> 
                <thead> 
                    <tr> 
                        <th>No</th>
                        <th>Nama Berkas</th>
                        <th>Jenis Berkas</th>
                        <th>File</th>
                        <th>Aksi</th>
                    </tr> 
                </thead> 
                <tbody> 
                    @foreach($berkas as $index => $item) 
                    <tr> 
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama_berkas }}</td>
                        <td>{{ $item->jenis_berkas }}</td>
                        <td> 
                            @if($item->file_path)
                                @php
                                    $extension = pathinfo($item->file_path, PATHINFO_EXTENSION);
                                    $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
                                @endphp
                                @if($isImage)
                                    <img src="{{ asset('storage/berkas_photos/' . basename($item->file_path)) }}" 
                                            alt="{{ $item->nama_berkas }}" 
                                            style="max-width: 100px; max-height: 100px;">
                                @else
                                    <a href="{{ asset('storage/berkas_photos/' . basename($item->file_path)) }}" 
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
    </div> 
</div> 
@endsection