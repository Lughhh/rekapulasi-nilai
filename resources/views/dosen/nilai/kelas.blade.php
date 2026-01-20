@extends('layouts.master-dosen')

@section('content')
<h4>Pilih Kelas</h4>

<table class="table">
@foreach($kelas as $k)
<tr>
    <td>{{ $k->nama_kelas }}</td>
    <td>{{ $k->mataKuliah->nama_mk }}</td>
    <td>
        <a href="{{ route('dosen.nilai.input',$k->id) }}" class="btn btn-primary btn-sm">
            Input Nilai
        </a>
    </td>
</tr>
@endforeach
</table>
@endsection
