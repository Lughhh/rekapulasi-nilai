<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliah = MataKuliah::all();
        return view('kaprodi.mata_kuliah.index', compact('mataKuliah'));

    }


    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|unique:mata_kuliah,kode_mk',
            'nama_mk' => 'required',
            'sks' => 'required|integer',
        ]);

        MataKuliah::create($request->only([
            'kode_mk','nama_mk','sks'
        ]));

        return back()->with('success','Mata kuliah berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        MataKuliah::findOrFail($id)->update(
            $request->only(['kode_mk','nama_mk','sks'])
        );

        return back()->with('success','Data berhasil diupdate');
    }

    public function destroy($id)
    {
        MataKuliah::findOrFail($id)->delete();
        return back()->with('success','Data berhasil dihapus');
    }
}
