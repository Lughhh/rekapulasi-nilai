<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Krs;
use App\Models\Nilai;
use Illuminate\Http\Request;

class DosenNilaiController extends Controller
{
    // STEP 1: pilih kelas
    public function kelas()
    {
        $kelas = Kelas::where('dosen_id', auth()->id())->get();
        return view('dosen.nilai.kelas', compact('kelas'));
    }

    // STEP 2: mahasiswa dari KRS
    public function mahasiswa(Kelas $kelas)
    {
        $krs = Krs::with('mahasiswa')
            ->where('kelas_id', $kelas->id)
            ->get();

        return view('dosen.nilai.input', compact('kelas', 'krs'));
    }

    // STEP 3: simpan nilai
    public function simpan(Request $request)
    {
        foreach ($request->nilai as $krs_id => $n) {

            $nilai_akhir =
                ($n['tugas'] * 0.2) +
                ($n['kuis'] * 0.2) +
                ($n['uts'] * 0.3) +
                ($n['uas'] * 0.3);

            $grade = match (true) {
                $nilai_akhir >= 85 => 'A',
                $nilai_akhir >= 75 => 'B',
                $nilai_akhir >= 65 => 'C',
                default => 'D',
            };

            Nilai::updateOrCreate(
                ['krs_id' => $krs_id],
                [
                    'tugas' => $n['tugas'],
                    'kuis' => $n['kuis'],
                    'uts' => $n['uts'],
                    'uas' => $n['uas'],
                    'nilai_akhir' => $nilai_akhir,
                    'grade' => $grade,
                ]
            );
        }

        return back()->with('success', 'Nilai berhasil disimpan');
    }
}
