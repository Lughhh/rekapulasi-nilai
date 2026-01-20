@extends('layouts.master-dosen')

@section('title', 'Dashboard')

@section('content')
<h4>Dashboard Dosen</h4>
<p>Selamat datang di dashboard dosen</p>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <i class="bi bi-journal-text fs-2 text-primary"></i>
                <h6 class="mt-2">Total Mata Kuliah</h6>
                <h4>3</h4>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <i class="bi bi-people fs-2 text-success"></i>
                <h6 class="mt-2">Total Mahasiswa</h6>
                <h4>120</h4>
            </div>
        </div>
    </div>
</div>
@endsection
