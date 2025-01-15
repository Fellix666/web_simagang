@extends('layouts.app')@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data Anak Magang</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('magang.update', $magang->id_magang) }}" method="POST">@csrf
                @method('PUT')<div
                    class="form-group"><label>Instansi</label><select name="id_institusi"
                        class="form-control @error('id_institusi') is-invalid @enderror">
                        <option value="">Pilih Instansi</option>
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
                    <select name="id_berkas" id="berkas" class="form-control @error('id_berkas') is-invalid @enderror">
                        <option value="">Pilih Berkas</option>
                        @foreach ($berkas as $berk)
                            <option value="{{ $berk->id_berkas }}"
                                data-institusi="{{ $berk->asal_berkas }}"
                                {{ $magang->id_berkas == $berk->id_berkas ? 'selected' : '' }}>
                                {{ $berk->nomor_berkas }} -
                                {{ $berk->institusi ? $berk->institusi->nama_institusi : 'Institusi Tidak Tersedia' }}
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
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const institusiSelect = document.getElementById('institusi');
        const berkasSelect = document.getElementById('berkas');
        const berkasOptions = berkasSelect.querySelectorAll('option');

        // Function to filter berkas options
        function filterBerkasOptions() {
            const selectedInstitusi = institusiSelect.value;

            berkasOptions.forEach(option => {
                if (option.value === '') return; // Keep the default option

                const optionInstitusi = option.getAttribute('data-institusi');

                if (selectedInstitusi === optionInstitusi) {
                    option.style.display = '';
                } else {
                    option.style.display = 'none';
                }
            });
        }

        // Initially filter options if an institusi is pre-selected
        if (institusiSelect.value) {
            filterBerkasOptions();
        }

        // Add event listener to filter options when institusi changes
        institusiSelect.addEventListener('change', filterBerkasOptions);
    });
</script>
@endsection
@endsection
