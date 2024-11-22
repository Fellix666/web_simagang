@extends('layouts.app')@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data Anak Magang</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('magang.update', $magang->id_magang) }}" method="POST">@csrf
                @method('PUT')<div
                    class="form-group"><label>Institusi</label><select name="id_institusi"
                        class="form-control @error('id_institusi') is-invalid @enderror">
                        <option value="">Pilih Institusi</option>
                        @foreach ($institusi as $inst)
                            <option value="{{ $inst->id_institusi }}"
                                {{ $magang->id_institusi == $inst->id_institusi ? 'selected' : '' }}>
                                {{ $inst->nama_institusi }}</option>
                        @endforeach
                    </select>
                    @error('id_institusi')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group"><label>Divisi</label><select name="id_divisi"
                        class="form-control @error('id_divisi') is-invalid @enderror">
                        <option value="">Pilih Divisi</option>
                        @foreach ($divisi as $div)
                            <option value="{{ $div->id_divisi }}"
                                {{ $magang->id_divisi == $div->id_divisi ? 'selected' : '' }}>{{ $div->nama_divisi }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_divisi')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Berkas</label>
                    <select name="id_berkas" class="form-control @error('id_berkas') is-invalid @enderror">
                        <option value="">Pilih Berkas</option>
                        @foreach ($berkas as $berk)
                            <option value="{{ $berk->id_berkas }}" {{ $magang->id_berkas == $berk->id_berkas ? 'selected' : '' }}>
                                {{ $berk->nama_berkas }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_berkas')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group"><label>Nomor Induk</label><input type="text" name="nomor_induk"
                        class="form-control @error('nomor_induk') is-invalid @enderror"
                        value="{{ $magang->nomor_induk }}">
                    @error('nomor_induk')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group"><label>Nama Lengkap</label><input type="text" name="nama_lengkap"
                        class="form-control @error('nama_lengkap') is-invalid @enderror"value="{{ $magang->nama_lengkap }}">
                    @error('nama_lengkap')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group"><label>Jenis Kelamin</label><select name="jenis_kelamin"
                        class="form-control @error('jenis_kelamin') is-invalid @enderror">
                        <option value="l" {{ $magang->jenis_kelamin == 'l' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="p" {{ $magang->jenis_kelamin == 'p' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group"><label>Jurusan</label><input type="text" name="jurusan"
                        class="form-control @error('jurusan') is-invalid @enderror"value="{{ $magang->jurusan }}">
                    @error('jurusan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group"><label>Tanggal Mulai</label><input type="date" name="tanggal_mulai"
                        class="form-control @error('tanggal_mulai') is-invalid @enderror"value="{{ $magang->tanggal_mulai }}">
                    @error('tanggal_mulai')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group"><label>Tanggal Selesai</label><input type="date" name="tanggal_selesai"
                        class="form-control @error('tanggal_selesai') is-invalid @enderror"value="{{ $magang->tanggal_selesai }}">
                    @error('tanggal_selesai')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group"><label>Status</label><select name="status"
                        class="form-control @error('status') is-invalid @enderror">
                        <option value="mahasiswa" {{ $magang->status == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa
                        </option>
                        <option value="siswa" {{ $magang->status == 'siswa' ? 'selected' : '' }}>Siswa</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div><button type="submit" class="btn btn-primary">Update</button><a
                    href="{{ route('magang.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
