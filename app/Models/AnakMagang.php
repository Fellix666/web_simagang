<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnakMagang extends Model
{
    protected $table = 'anak_magang';
    protected $primaryKey = 'id_magang';
    protected $fillable = [
    'id_institusi', 
    'id_divisi', 
    'id_berkas',
    'nomor_induk', 
    'nama_lengkap', 
    'jenis_kelamin', 
    'jurusan', 
    'tanggal_mulai', 
    'tanggal_selesai', 
    'status'];

    public function institusi()
    {
        return $this->belongsTo(Institusi::class, 'id_institusi');
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'id_divisi');
    }

    public function berkas()
    {
        return $this->belongsTo(Berkas::class, 'id_berkas');
    }
}
