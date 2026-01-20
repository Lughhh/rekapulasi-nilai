@extends('layouts.master-mahasiswa')

@section('title','Dashboard Mahasiswa')
@section('page-title','Dashboard Mahasiswa')

@section('content')

<p class="mb-4">
    Selamat datang, <strong>{{ Auth::user()->name }}</strong>.
    Berikut adalah ringkasan progres studi Anda.

</p>

{{-- CARD RINGKASAN --}}
<div class="row g-3 mb-4">

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="p-3 rounded" style="background:#f3e8ff">
                    <i class="fa-solid fa-award text-purple fs-4" style="color:#7b2cbf"></i>
                </div>
                <div>
                    <small class="text-muted">IPK Kumulatif</small>
                    <h5 class="mb-0">3.85</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="p-3 rounded" style="background:#e6f4ea">
                    <i class="fa-solid fa-book-open text-success fs-4"></i>
                </div>
                <div>
                    <small class="text-muted">Total SKS Lulus</small>
                    <h5 class="mb-0">72</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="p-3 rounded" style="background:#fff4e5">
                    <i class="fa-solid fa-graduation-cap text-warning fs-4"></i>
                </div>
                <div>
                    <small class="text-muted">Mata Kuliah Diambil</small>
                    <h5 class="mb-0">20</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="p-3 rounded" style="background:#fdeaea">
                    <i class="fa-solid fa-calendar-days text-danger fs-4"></i>
                </div>
                <div>
                    <small class="text-muted">Semester Aktif</small>
                    <h6 class="mb-0">Ganjil 2024/2025</h6>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- TABEL NILAI RINGKAS --}}
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <strong>Daftar Nilai Semester Ganjil 2024/2025 (Ringkas)</strong>

        <a href="{{ route('mahasiswa.nilai') }}"
           class="btn btn-sm"
           style="background:#7b2cbf;color:#fff">
            <i class="fa-solid fa-eye"></i> Lihat Detail Nilai
        </a>
    </div>

    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Kode MK</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Nilai Akhir</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>TIF301</td>
                    <td>Struktur Data Lanjut</td>
                    <td>4</td>
                    <td class="text-success fw-bold">89.4</td>
                    <td><span class="badge bg-success">A</span></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>IND305</td>
                    <td>Kewirausahaan Digital</td>
                    <td>3</td>
                    <td class="text-success fw-bold">76.5</td>
                    <td><span class="badge bg-success">B</span></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>MTK303</td>
                    <td>Kalkulus Lanjut</td>
                    <td>2</td>
                    <td class="text-warning fw-bold">58.0</td>
                    <td><span class="badge bg-warning text-dark">D</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="card-footer bg-white">
        <small class="text-muted">
            Klik <strong>Lihat Detail Nilai</strong> untuk melihat komponen nilai
            (Tugas, Kuis, UTS, UAS).
        </small>
    </div>
</div>

@endsection
