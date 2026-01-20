@extends('layouts.master')

@section('content')
<h4>Tambah Mahasiswa</h4>

<form method="POST" action="{{ route('kaprodi.mahasiswa.store') }}">
@csrf

<div class="mb-3">
    <label>Nama</label>
    <input name="name" class="form-control">
</div>

<div class="mb-3">
    <label>NIM</label>
    <input name="nim" class="form-control">
</div>

<div class="mb-3">
    <label>Password</label>
    <input name="password" type="password" class="form-control">
</div>

<button class="btn btn-success">Simpan</button>
</form>
@endsection
