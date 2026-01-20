@extends('layouts.master')

@section('content')
<h4>KHS & IPK</h4>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Nilai</th>
            <th>Grade</th>
        </tr>
    </thead>
    <tbody>
        @foreach($krs as $row)
        <tr>
            <td>{{ $row->kelas->mataKuliah->nama }}</td>
            <td>{{ $row->kelas->mataKuliah->sks }}</td>
            <td>{{ $row->nilai->nilai_akhir }}</td>
            <td>{{ $row->nilai->grade }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h5 class="mt-3">IPK : <strong>{{ $ipk }}</strong></h5>
@endsection
