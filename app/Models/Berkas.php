<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $primaryKey = 'id_berkas';
    protected $fillable = [ 'nama_berkas', 'jenis_berkas', 'file_path'];

    public function anakMagang()
    {
        return $this->belongsTo(AnakMagang::class, 'id_magang');
    }
}
