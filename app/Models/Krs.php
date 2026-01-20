<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    protected $table = 'krs';
    protected $fillable = ['mahasiswa_id', 'kelas_id'];

    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    public function nilai()
    {
        return $this->hasOne(Nilai::class);
    }


}