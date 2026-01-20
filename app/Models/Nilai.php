<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $fillable = [
        'krs_id','tugas','kuis','uts','uas','nilai_akhir','grade'
    ];

    public function krs() {
        return $this->belongsTo(Krs::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
