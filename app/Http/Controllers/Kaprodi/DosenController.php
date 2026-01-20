<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = User::where('role', 'dosen')->get();
        return view('kaprodi.dosen.index', compact('dosen'));
    }

     public function create()
    {
        return view('kaprodi.dosen.modal-create');
    }
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'nim_nik' => 'required|unique:users,nim_nik',
        'bidang_keahlian' => 'required',
        'password' => 'required|min:6',
    ]);

    User::create([
        'name' => $request->name,
        'nim_nik' => $request->nim_nik,
        'bidang_keahlian' => $request->bidang_keahlian,
        'password' => bcrypt($request->password), // 🔥 WAJIB
        'role' => 'dosen',
    ]);

    return redirect()->route('kaprodi.dosen.index')
        ->with('success', 'Dosen berhasil ditambahkan');
}



    public function update(Request $request, $id)
    {
        $dosen = User::findOrFail($id);

        $data = $request->only('name', 'nim_nik', 'bidang_keahlian');

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $dosen->update($data);

        return redirect()->route('kaprodi.dosen.index')
            ->with('success', 'Dosen berhasil diupdate');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('kaprodi.dosen.index')
            ->with('success', 'Dosen berhasil dihapus');
    }
}
