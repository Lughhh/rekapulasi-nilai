<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kelas;
use App\Models\Krs;

class MahasiswaKrsController extends Controller
{
    /**
     * Tampilkan daftar kelas untuk KRS
     */
    public function index()
    {
        $kelas = Kelas::with(['mataKuliah', 'dosen'])->get();

        return view('mahasiswa.krs.index', compact('kelas'));
    }

    /**
     * Simpan KRS mahasiswa
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'semester' => 'required|numeric'
        ]);

        // Cegah dobel ambil kelas
        $cek = Krs::where('mahasiswa_id', Auth::id())
            ->where('kelas_id', $request->kelas_id)
            ->first();

        if ($cek) {
            return back()->with('error', 'Kelas ini sudah diambil');
        }

        // Simpan KRS
        Krs::create([
            'mahasiswa_id' => Auth::id(),
            'kelas_id'     => $request->kelas_id,
            'semester'     => $request->semester,
        ]);

        // Tambah jumlah mahasiswa di kelas
        Kelas::where('id', $request->kelas_id)
            ->increment('jumlah_mahasiswa');

        return back()->with('success', 'KRS berhasil disimpan');
    }
}
