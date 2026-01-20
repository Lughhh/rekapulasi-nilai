@extends('layouts.master')

@section('content')
<h4>Tambah Mata Kuliah</h4>

<form method="POST" action="{{ route('kaprodi.mata-kuliah.store') }}">
@csrf

<input name="kode_mk" class="form-control mb-2" placeholder="Kode MK">
<input name="nama_mk" class="form-control mb-2" placeholder="Nama MK">
<input name="sks" type="number" class="form-control mb-2" placeholder="SKS">
<input name="semester" type="number" class="form-control mb-2" placeholder="Semester">

<button class="btn btn-success">💾 Simpan</button>
</form>
@endsection
