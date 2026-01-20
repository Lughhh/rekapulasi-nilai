<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Krs;
use App\Models\Kelas;
use App\Models\Nilai;
use Illuminate\Http\Request;

class MahasiswaNilaiController extends Controller
{
    public function khs($semester)
{
    $nilai = Nilai::whereHas('krs', function($q) use ($semester){
        $q->where('mahasiswa_id', auth()->id())
          ->whereHas('kelas', fn($k)=>$k->where('semester',$semester));
    })->with('krs.kelas.mataKuliah')->get();

    return view('mahasiswa.nilai.khs', compact('nilai','semester'));
}
    public function index()
    {
        $mahasiswa = Auth::user();

        return view('mahasiswa.nilai.index', [
            'kelas' => Kelas::all(),
            'nilai' => Nilai::whereHas('krs', function($q) use ($mahasiswa){
                $q->where('mahasiswa_id',$mahasiswa->id);
            })->with('krs.kelas.mataKuliah')->get(),
            'ipk' => $mahasiswa->hitungIpk(),
            'mode' => request('mode','krs')
        ]);
    }

    public function cetakKhs()
    {
        $mahasiswa = Auth::user();

        $nilai = Nilai::whereHas('krs', function($q) use ($mahasiswa){
            $q->where('mahasiswa_id',$mahasiswa->id);
        })->with('krs.kelas.mataKuliah')->get();

        $pdf = \PDF::loadView('mahasiswa.nilai.cetak', compact('mahasiswa','nilai'))
                    ->setPaper('A4','portrait');

        return $pdf->stream('KHS-'.$mahasiswa->nim.'.pdf');
    }


    public function semua()
{
    $nilai = Nilai::whereHas('krs', fn($q)=>
        $q->where('mahasiswa_id', auth()->id())
    )->with('krs.kelas.mataKuliah')->get();

    return view('mahasiswa.nilai.semua', compact('nilai'));

    $ipk = Nilai::whereHas('krs', fn($q)=>$q->where('mahasiswa_id',auth()->id()))
    ->join('krs','krs.id','=','nilai.krs_id')
    ->join('kelas','kelas.id','=','krs.kelas_id')
    ->join('mata_kuliah','mata_kuliah.id','=','kelas.mata_kuliah_id')
    ->selectRaw('SUM(
        CASE grade
            WHEN "A" THEN 4
            WHEN "B" THEN 3
            WHEN "C" THEN 2
            WHEN "D" THEN 1
            WHEN "E" THEN OR 0
        END * mata_kuliah.sks
    ) / SUM(mata_kuliah.sks) as ipk')
    ->value('ipk');
    

}
    public function cetak()
    {
        return view('mahasiswa.cetak');
    }
    

}
