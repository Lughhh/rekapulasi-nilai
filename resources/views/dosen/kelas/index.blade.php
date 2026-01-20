@extends('layouts.master-dosen')

@section('content')
<h4 class="mb-3">Kelas Yang Diampu</h4>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Mata Kuliah</th>
            <th>Semester</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kelas as $i => $k)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $k->nama_kelas }}</td>
            <td>{{ $k->mataKuliah->nama }}</td>
            <td>{{ $k->semester }}</td>
            <td>
                @if($k->is_locked)
                    <span class="badge bg-danger">Terkunci</span>
                @else
                    <span class="badge bg-success">Aktif</span>
                @endif
            </td>
            <td>
                <a href="{{ route('dosen.nilai.input',$k->id) }}"
                   class="btn btn-primary btn-sm">
                    Input Nilai
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
