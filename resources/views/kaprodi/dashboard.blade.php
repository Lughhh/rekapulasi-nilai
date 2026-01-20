@extends('layouts.master')

@section('title', 'Dashboard Kaprodi')

@section('content')
<h4 class="mb-4">Dashboard Kaprodi</h4>

<div class="row g-3">
    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <small>Total Mahasiswa</small>
                    <h4>{{ $totalMahasiswa }}</h4>
                </div>
                <i class="bi bi-mortarboard fs-1 text-primary"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <small>Total Dosen</small>
                    <h4>{{ $totalDosen }}</h4>
                </div>
                <i class="bi bi-person-video3 fs-1 text-success"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <small>Total Mata Kuliah</small>
                    <h4>{{ $totalMatkul }}</h4>
                </div>
                <i class="bi bi-book fs-1 text-warning"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <small>Semester Aktif</small>
                    <h6>Ganjil 2024/2025</h6>
                </div>
                <i class="bi bi-calendar-event fs-1 text-danger"></i>
            </div>
        </div>
    </div>
</div>
@endsection
