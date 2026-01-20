@extends('layouts.dosen')

@section('content')
<h5>Kelas: {{ $kelas->nama_kelas }}</h5>

<form method="POST" action="{{ route('dosen.nilai.simpan') }}">
@csrf
<table class="table">
@foreach($krs as $k)
<tr>
    <td>{{ $k->mahasiswa->name }}</td>
    <td><input name="nilai[{{ $k->id }}][tugas]" class="form-control"></td>
    <td><input name="nilai[{{ $k->id }}][kuis]" class="form-control"></td>
    <td><input name="nilai[{{ $k->id }}][uts]" class="form-control"></td>
    <td><input name="nilai[{{ $k->id }}][uas]" class="form-control"></td>
</tr>
@endforeach
</table>

<button class="btn btn-success">Simpan Nilai</button>
</form>
@endsection