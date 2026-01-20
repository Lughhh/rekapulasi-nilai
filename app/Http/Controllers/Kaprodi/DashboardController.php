<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\MataKuliah;

class DashboardController extends Controller
{
    public function index()
    {
        return view('kaprodi.dashboard', [
            'totalMahasiswa' => User::where('role','mahasiswa')->count(),
            'totalDosen' => User::where('role','dosen')->count(),
            'totalMatkul' => MataKuliah::count(),
            'semesterAktif' => 'Ganjil 2024/2025'
        ]);
    }
}
