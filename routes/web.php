<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Kaprodi\DashboardController as KaprodiDashboard;
use App\Http\Controllers\Dosen\DashboardController as DosenDashboard;
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboard;
use App\Http\Controllers\Kaprodi\MahasiswaController;
use App\Http\Controllers\Kaprodi\DosenController;
use App\Http\Controllers\Kaprodi\MataKuliahController;
use App\Http\Controllers\Kaprodi\KelasController;
use App\Http\Controllers\Dosen\NilaiController;
use App\Http\Controllers\Mahasiswa\MahasiswaNilaiController;
use App\Http\Controllers\Mahasiswa\MahasiswaKrsController;

Route::get('/login', [LoginController::class, 'form'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| SEMUA USER LOGIN
|--------------------------------------------------------------------------
*/

/// ===== KAPRODI ===== //
Route::middleware(['auth'])->prefix('kaprodi')->group(function () {

    Route::get('/dashboard', [KaprodiDashboard::class, 'index'])
        ->name('kaprodi.dashboard');

    Route::get('/data-master', function () {
        return view('kaprodi.data-master');
    })->name('kaprodi.data-master');

            Route::resource(
                'mahasiswa',
                \App\Http\Controllers\Kaprodi\MahasiswaController::class,
                ['as' => 'kaprodi']
            );
            
            Route::resource(
                'dosen',
                \App\Http\Controllers\Kaprodi\DosenController::class,
                ['as' => 'kaprodi']
            );

             Route::resource(
                'mata-kuliah',
                \App\Http\Controllers\Kaprodi\MataKuliahController::class,
                ['as' => 'kaprodi']
            );
            
        
                Route::resource('kelas', \App\Http\Controllers\Kaprodi\KelasController::class,
                ['as' => 'kaprodi']);

    Route::get('/rekap-nilai', function () {
        return view('kaprodi.rekap-nilai');
    })->name('kaprodi.rekap-nilai');

    Route::get('/ekspor-laporan', function () {
        return view('kaprodi.ekspor');
    })->name('kaprodi.ekspor-laporan');
    });


/* ===== DOSEN ===== */
Route::middleware(['auth', 'role:dosen'])->prefix('dosen')->group(function () {
    Route::get('/dashboard', [DosenDashboard::class, 'index'])->name('dosen.dashboard');


      // daftar kelas yang diampu dosen
    Route::get('/kelas', [NilaiController::class, 'kelasSaya'])
        ->name('dosen.kelas');

    // pilih kelas → tampil mahasiswa (KRS)
    Route::get('/kelas/{kelas}/nilai', [NilaiController::class, 'inputNilai'])
        ->name('dosen.nilai.input');

    // simpan / update nilai per mahasiswa (KRS)
    Route::post('/nilai/{krs}', [NilaiController::class, 'simpanNilai'])
        ->name('dosen.nilai.simpan');

    // kunci nilai kelas
    Route::post('/kelas/{kelas}/lock', [NilaiController::class, 'kunciKelas'])
        ->name('dosen.kelas.lock');

        Route::get('/cetak-nilai', function () {
        return view('dosen.nilai.cetak');
    })->name('dosen.cetak-nilai');
});

    /* ===== MAHASISWA ===== */
Route::middleware('auth')->prefix('mahasiswa')->group(function () {

    Route::get('/dashboard', function () {
        return view('mahasiswa.dashboard');
    })->name('mahasiswa.dashboard');

    // ===== KRS =====
    Route::get('/krs', [KrsController::class, 'index'])
        ->name('mahasiswa.krs');

    Route::post('/krs/{kelas}', [KrsController::class, 'store'])
        ->name('mahasiswa.krs.store');

    // ===== NILAI =====
    Route::get('/nilai', [NilaiController::class, 'index'])
        ->name('mahasiswa.nilai');

    Route::get('/khs', [NilaiController::class, 'khs'])
        ->name('mahasiswa.khs');

    Route::get('/cetak-khs', [MahasiswaNilaiController::class,'cetakKhs'])
        ->name('khs.cetak');


    Route::get('/cetak', [MahasiswaNilaiController::class, 'cetak'])
                ->name('cetak');
});

