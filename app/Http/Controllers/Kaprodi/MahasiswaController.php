<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index()
{
    $mahasiswa = User::where('role', 'mahasiswa')->get();
    return view('kaprodi.mahasiswa.index', compact('mahasiswa'));
}


    public function create()
    {
        return view('kaprodi.mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nim_nik' => 'required|unique:users',
            'password' => 'required|min:6'
        ]);

       User::create([
        'name' => $request->name,
        'nim_nik' => $request->nim_nik,
        'tahun_angkatan' => $request->tahun_angkatan,
        'password' => bcrypt($request->password),
        'role' => 'mahasiswa'
    ]);

    return back()->with('success','Mahasiswa ditambahkan');
    }

    public function edit(User $mahasiswa)
    {
        return view('kaprodi.mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, User $mahasiswa)
    {
        $data = [
            'name' => $request->name,
            'nim_nik' => $request->nim_nik,
            'tahun_angkatan' => $request->tahun_angkatan,
        ];

        return redirect()->route('kaprodi.mahasiswa.index')
            ->with('success', 'Mahasiswa diperbarui');
    }

    public function destroy(User $mahasiswa)
    {
        $mahasiswa->delete();
        return back()->with('success', 'Mahasiswa dihapus');
    }

    public function ambilKelas($kelas_id)
    {
        auth()->user()->kelas()->attach($kelas_id);
        return back();
    }

}
