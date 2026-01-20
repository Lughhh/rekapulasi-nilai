@extends('layouts.master')

@section('content')
<h4 class="mb-4">Data Master</h4>
                <div class="container-card">
                    <p class="text-gray-700 mb-4">
                        Pilih kategori data master yang ingin Anda kelola (tambah, edit, hapus).
                    </p>
<div class="row g-4">

    <div class="col-md-3">
        <a href="{{ route('kaprodi.mahasiswa.index') }}" class="text-decoration-none">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-mortarboard fs-1 text-primary"></i>
                    <h6 class="mt-2">Mahasiswa</h6>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('kaprodi.dosen.index') }}" class="text-decoration-none">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-person-video3 fs-1 text-success"></i>
                    <h6 class="mt-2">Dosen</h6>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('kaprodi.mata-kuliah.index') }}" class="text-decoration-none">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-book fs-1 text-warning"></i>
                    <h6 class="mt-2">Mata Kuliah</h6>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('kaprodi.kelas.index') }}" class="text-decoration-none">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-diagram-3 fs-1 text-danger"></i>
                    <h6 class="mt-2">Kelas</h6>
                </div>
            </div>
        </a>
    </div>

</div>
@endsection
