@extends('layouts.master-mahasiswa')

@section('content')
<h4>Daftar Nilai</h4>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mata Kuliah</th>
            <th>Kelas</th>
            <th>Nilai Akhir</th>
            <th>Grade</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($krs as $row)
        <tr>
            <td>{{ $row->kelas->mataKuliah->nama }}</td>
            <td>{{ $row->kelas->nama_kelas }}</td>
            <td>{{ $row->nilai->nilai_akhir ?? '-' }}</td>
            <td>{{ $row->nilai->grade ?? '-' }}</td>
            <td>
                {{ $row->kelas->is_locked ? 'Final' : 'Proses' }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
