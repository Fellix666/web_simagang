<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $primaryKey = 'id_berkas';
    protected $fillable = ['nama_berkas', 'asal_berkas', 'nomor_berkas', 'tanggal_berkas', 'file_path'];

    public function anakMagang()
    {
        return $this->hasMany(AnakMagang::class, 'id_berkas');
    }

    public function institusi()
    {
        return $this->belongsTo(Institusi::class, 'asal_berkas', 'id_institusi');
    }
}
