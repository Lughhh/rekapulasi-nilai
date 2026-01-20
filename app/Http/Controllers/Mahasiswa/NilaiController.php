<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index()
    {
        $krs = Krs::with(['kelas.mataKuliah','nilai'])
            ->where('mahasiswa_id', Auth::id())
            ->get();

        return view('mahasiswa.nilai.index', compact('krs'));
    }

    public function khs()
    {
        $krs = Krs::with(['kelas.mataKuliah','nilai'])
            ->where('mahasiswa_id', Auth::id())
            ->whereHas('kelas', fn($q) => $q->where('is_locked',true))
            ->get();

        $totalSks = 0;
        $totalBobot = 0;

        foreach ($krs as $row) {
            if ($row->nilai) {
                $bobot = match($row->nilai->grade) {
                    'A'=>4,'B'=>3,'C'=>2,'D'=>1,default=>0
                };
                $sks = $row->kelas->mataKuliah->sks;
                $totalSks += $sks;
                $totalBobot += $bobot * $sks;
            }
        }

        $ipk = $totalSks ? round($totalBobot/$totalSks,2) : 0;

        return view('mahasiswa.nilai.khs', compact('krs','ipk'));
    }
}
