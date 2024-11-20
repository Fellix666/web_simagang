<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $primaryKey = 'id_divisi';
    protected $fillable = ['nama_divisi', 'kepala_divisi'];
    public function anakMagang()
    {
        return $this->hasMany(AnakMagang::class, 'id_divisi');
    }
}
