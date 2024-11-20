<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $primaryKey = 'id_berkas';
    protected $fillable = ['id_magang', 'nama_berkas', 'jenis_berkas'];

    public function anakMagang()
    {
        return $this->belongsTo(AnakMagang::class, 'id_magang');
    }
}
