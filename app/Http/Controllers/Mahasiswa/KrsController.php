<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Krs;
use Illuminate\Support\Facades\Auth;

class KrsController extends Controller
{
    public function index()
    {
        return view('mahasiswa.krs.index', [
            'kelas' => Kelas::with('mataKuliah','dosen')
                ->where('is_locked', false)
                ->get()
        ]);
    }

    public function store(Kelas $kelas)
    {
        $mahasiswaId = Auth::id();

        // Cegah double ambil kelas
        if (Krs::where('mahasiswa_id',$mahasiswaId)
            ->where('kelas_id',$kelas->id)->exists()) {
            return back()->with('error','Kelas sudah diambil');
        }

        Krs::create([
            'mahasiswa_id' => $mahasiswaId,
            'kelas_id' => $kelas->id
        ]);

        // update jumlah mahasiswa
        $kelas->increment('jumlah_mahasiswa');

        return back()->with('success','Berhasil mengambil KRS');
    }
}
