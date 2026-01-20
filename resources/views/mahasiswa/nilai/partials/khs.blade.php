@extends('layouts.master-mahasiswa')

@section('content')
<h4 class="mb-3">Kartu Hasil Studi (KHS)</h4>

<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Nilai Akhir</th>
            <th>Grade</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($krs as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->kelas->mataKuliah->nama_mk }}</td>
            <td>{{ $item->kelas->mataKuliah->sks }}</td>
            <td>{{ $item->nilai->nilai_akhir ?? '-' }}</td>
            <td>
                <span class="badge bg-success">
                    {{ $item->nilai->grade ?? '-' }}
                </span>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Belum ada data nilai</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    <h5>IPK : <strong>{{ $ipk }}</strong></h5>
</div>
@endsection
