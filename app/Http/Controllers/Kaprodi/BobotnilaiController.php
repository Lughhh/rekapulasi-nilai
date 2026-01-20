<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Models\BobotNilai;
use Illuminate\Http\Request;

class BobotNilaiController extends Controller
{
    public function index()
    {
        $bobot = BobotNilai::first();
        return view('kaprodi.bobot-nilai', compact('bobot'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'tugas' => 'required|integer',
            'kuis' => 'required|integer',
            'uts' => 'required|integer',
            'uas' => 'required|integer',
        ]);

        BobotNilai::updateOrCreate(
            ['id' => 1],
            $request->only('tugas', 'kuis', 'uts', 'uas')
        );

        return back()->with('success', 'Bobot nilai diperbarui');
    }
}
