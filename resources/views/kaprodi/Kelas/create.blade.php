@extends('layouts.master')

@section('content')
<h4>Tambah Kelas</h4>

<form method="POST" action="{{ route('kaprodi.kelas.store') }}">
@csrf

<input name="nama_kelas" class="form-control mb-2" placeholder="Nama Kelas">

<select name="mata_kuliah_id" class="form-control mb-2">
@foreach($mataKuliah as $mk)
<option value="{{ $mk->id }}">{{ $mk->nama_mk }}</option>
@endforeach
</select>

<select name="dosen_id" class="form-control mb-2">
@foreach($dosen as $d)
<option value="{{ $d->id }}">{{ $d->name }}</option>
@endforeach
</select>

<input name="jumlah_mahasiswa" type="number" class="form-control mb-2" placeholder="Jumlah Mahasiswa">

<button class="btn btn-success">💾 Simpan</button>
</form>
@endsection
