@extends('layouts.master-dosen')

@section('title', 'Cetak Laporan Nilai')

@section('content')


<div class="d-flex justify-content-between mb-3">
    <h5>Cetak Laporan Nilai</h5>

    <div>
        <a href="{{ route('nilai.index') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <button onclick="window.print()" class="btn btn-primary btn-sm">
            <i class="bi bi-printer"></i> Print
        </button>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Nilai Akhir</th>
            <th>Grade</th>
        </tr>
    </thead>
</table>
@endsection
