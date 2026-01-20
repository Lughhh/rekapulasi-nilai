<?php

namespace App\Http\Controllers\Kaprodi;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class KelasController extends Controller
{
    public function index()
    {
        return view('kaprodi.kelas.index', [
            'kelas' => Kelas::with(['mataKuliah','dosen'])->get(),
            'matkul' => MataKuliah::all(),
            'dosen' => User::where('role','dosen')->get()
        ]);
    }

    public function store(Request $request)
    {
        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'dosen_id' => $request->dosen_id,
            'semester' => $request->semester,
            'jumlah_mahasiswa' => 0,
            'is_locked' => false
        ]);

        return back()->with('success','Kelas berhasil dibuat');
    }


    public function edit($id)
    {
        return view('kaprodi.kelas.edit', [
            'kelas' => Kelas::findOrFail($id),
            'matakuliah' => MataKuliah::all(),
            'dosen' => User::where('role','dosen')->get(), 
        ]);
    }

    public function update(Request $request, $id)
    {
        Kelas::findOrFail($id)->update($request->all());
        return back()->with('success','Kelas diupdate');
    }

    public function destroy($id)
    {
        Kelas::findOrFail($id)->delete();
        return back()->with('success','Kelas dihapus');
    }
}
