<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Nilai;


class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
    'name',
    'nim_nik',
    'password',
    'role',
    'tahun_angkatan', // ⬅️ WAJIB
    'bidang_keahlian',
];


    protected $hidden = ['password'];

    public function getAuthIdentifierName()
    {
        return 'nim_nik';
    }

    public function kelas()
    {
    return $this->belongsToMany(Kelas::class, 'krs', 'mahasiswa_id', 'kelas_id');
    }


    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'mahasiswa_id');
    }

    // ======================
    // HITUNG IPK
    // ======================
    public function krs()
{
    return $this->hasMany(Krs::class, 'mahasiswa_id');
}

    public function nilais()
    {
    return $this->hasManyThrough(
        Nilai::class,
        Krs::class,
        'mahasiswa_id', // FK di krs
        'krs_id',       // FK di nilai
        'id',
        'id'
    );
    }

/* ===== HITUNG IPK ===== */
    public function hitungIpk()
    {
    $nilai = Nilai::whereHas('krs', fn($q)=>$q->where('mahasiswa_id',$this->id))->get();

    if ($nilai->count()==0) return 0;

    $total = 0;
    foreach($nilai as $n){
        $total += match($n->grade){
            'A'=>4,'B'=>3,'C'=>2,'D'=>1, default=>0
        };
    }

    return $total / $nilai->count();
    }
    // ======================
}