<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Krs;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Kelas yang diampu dosen
     */
    public function kelasSaya()
    {
        $kelas = Kelas::where('dosen_id', auth()->id())
            ->with('mataKuliah')
            ->get();

        return view('dosen.kelas.index', compact('kelas'));
    }

    /**
     * Input nilai (berdasarkan KRS mahasiswa)
     */
    public function inputNilai(Kelas $kelas)
    {
        // keamanan
        abort_if($kelas->dosen_id !== auth()->id(), 403);

        $krs = $kelas->krs()
            ->with(['mahasiswa', 'nilai'])
            ->get();

        return view('dosen.nilai.input', compact('kelas', 'krs'));
    }

    /**
     * Simpan nilai mahasiswa
     */
    public function simpanNilai(Request $request, Krs $krs)
    {
        // jika kelas terkunci → stop
        if ($krs->kelas->is_locked) {
            return back()->with('error', 'Nilai kelas sudah dikunci');
        }

        $request->validate([
            'tugas' => 'required|numeric|min:0|max:100',
            'kuis'  => 'required|numeric|min:0|max:100',
            'uts'   => 'required|numeric|min:0|max:100',
            'uas'   => 'required|numeric|min:0|max:100',
        ]);

        $nilaiAkhir =
            ($request->tugas * 0.20) +
            ($request->kuis  * 0.10) +
            ($request->uts   * 0.30) +
            ($request->uas   * 0.40);

        Nilai::updateOrCreate(
            ['krs_id' => $krs->id],
            [
                'tugas' => $request->tugas,
                'kuis'  => $request->kuis,
                'uts'   => $request->uts,
                'uas'   => $request->uas,
                'nilai_akhir' => $nilaiAkhir,
                'grade' => $this->grade($nilaiAkhir),
            ]
        );

        return back()->with('success', 'Nilai berhasil disimpan');
    }

    /**
     * Kunci nilai satu kelas
     */
    public function kunciKelas(Kelas $kelas)
    {
        abort_if($kelas->dosen_id !== auth()->id(), 403);

        $kelas->update([
            'is_locked' => true
        ]);

        return back()->with('success', 'Nilai kelas berhasil dikunci');
    }

    private function grade($n)
    {
        return match (true) {
            $n >= 85 => 'A',
            $n >= 75 => 'B',
            $n >= 65 => 'C',
            $n >= 50 => 'D',
            default  => 'E',
        };
    }
}
