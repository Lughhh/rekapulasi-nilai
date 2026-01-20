<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'mata_kuliah_id',
        'dosen_id',
        'semester',
        'jumlah_mahasiswa',
        'is_locked'
    ];

    // ✅ RELASI KE MATA KULIAH
    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }

    // ✅ RELASI KE DOSEN
    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }

    // ✅ RELASI KE KRS
    public function krs()
    {
        return $this->hasMany(Krs::class);
    }
}
