@extends('layouts.app')
@section('content')
<style>
    select {
        background-color: white;
        border: 1px solid #ced4da;
        padding: 8px;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    select:hover {
        background-color: #e6f7ff;
        cursor: pointer;
    }

    select:focus {
        background-color: #e6f7ff;
        outline: none;
        border-color: #80bdff;
        box-shadow: 0 0 4px rgba(128, 189, 255, 0.5);
    }
</style>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Anak Magang</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('magang.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Instansi</label>
                    <select name="id_institusi" id="institusi" class="form-control @error('id_institusi') is-invalid @enderror">
                        <option value="" disabled selected>Pilih Instansi</option>
                        @foreach ($institusi as $inst)
                            <option value="{{ $inst->id_institusi }}">{{ $inst->nama_institusi }}</option>
                        @endforeach
                    </select>
                    @error('id_institusi')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            <div class="form-group">
                <label>Divisi</label>
                <select name="id_divisi" class="form-control @error('id_divisi') is-invalid @enderror">
                    <option value="" disabled selected>Pilih Divisi</option>
                    @foreach ($divisi as $div)
                        <option value="{{ $div->id_divisi }}">{{ $div->nama_divisi }}</option>
                    @endforeach
                </select>
                @error('id_divisi')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Berkas</label>
                <select name="id_berkas" id="berkas" class="form-control @error('id_berkas') is-invalid @enderror">
                    <option value="" disabled selected>Pilih Berkas</option>
                    @foreach ($berkas as $berk)
                        <option value="{{ $berk->id_berkas }}" 
                            data-institusi="{{ $berk->asal_berkas }}">
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
                            class="form-control @error('nomor_induk') is-invalid @enderror">
                        @error('nomor_induk')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group"><label>Nama Lengkap</label><input type="text" name="nama_lengkap"
                            class="form-control @error('nama_lengkap') is-invalid @enderror">
                        @error('nama_lengkap')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group"><label>Jenis Kelamin</label><select name="jenis_kelamin"
                            class="form-control @error('jenis_kelamin') is-invalid @enderror">
                            <option value=""disabled selected>Pilih Jenis Kelamin</option>
                            <option value="l">Laki-laki</option>
                            <option value="p">Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group"><label>Jurusan</label><input type="text" name="jurusan"
                            class="form-control @error('jurusan') is-invalid @enderror">
                        @error('jurusan')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group"><label>Tanggal Mulai</label><input type="date" name="tanggal_mulai"
                            class="form-control @error('tanggal_mulai') is-invalid @enderror">
                        @error('tanggal_mulai')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group"><label>Tanggal Selesai</label><input type="date" name="tanggal_selesai"
                            class="form-control @error('tanggal_selesai') is-invalid @enderror">
                        @error('tanggal_selesai')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group"><label>Status</label><select name="status"
                            class="form-control @error('status') is-invalid @enderror">
                            <option value=""disabled selected>Pilih Status</option>
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="siswa">Siswa</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <br>
                    </div><button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('magang.index') }}" class="btn btn-secondary">Kembali</a>
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

            // Reset berkas selection
            berkasSelect.selectedIndex = 0;
        }

        // Initially hide irrelevant options if an institusi is pre-selected
        if (institusiSelect.value) {
            filterBerkasOptions();
        }

        // Add event listener to filter options when institusi changes
        institusiSelect.addEventListener('change', filterBerkasOptions);
    });
</script>
@endsection
    @endsection
