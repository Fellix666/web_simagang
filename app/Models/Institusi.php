<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institusi extends Model
{
    protected $primaryKey = 'id_institusi';
    protected $fillable = ['nama_institusi', 'alamat', 'website', 'email'];
    public function anakMagang()
    {
        return $this->hasMany(AnakMagang::class, 'id_institusi');
    }
}
