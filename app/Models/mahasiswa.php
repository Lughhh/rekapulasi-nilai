<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'krs');
    }
}