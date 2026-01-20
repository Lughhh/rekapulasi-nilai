@extends('layouts.master')

@section('content')
<h4>Ambil KRS</h4>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Kelas</th>
            <th>Mata Kuliah</th>
            <th>Dosen</th>
            <th>Semester</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kelas as $k)
        <tr>
            <td>{{ $k->nama_kelas }}</td>
            <td>{{ $k->mataKuliah->nama }}</td>
            <td>{{ $k->dosen->name }}</td>
            <td>{{ $k->semester }}</td>
            <td>
                <form method="POST" action="{{ route('mahasiswa.krs.store',$k->id) }}">
                    @csrf
                    <button class="btn btn-primary btn-sm">Ambil</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
