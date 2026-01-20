@extends('layouts.kaprodi')

@section('content')
<h4>Edit Mahasiswa</h4>

<form method="POST" action="{{ route('kaprodi.mahasiswa.update', $mahasiswa->id) }}">
@csrf @method('PUT')

<div class="mb-3">
    <label>Nama</label>
    <input type="text" name="name" value="{{ $mahasiswa->name }}" class="form-control">
</div>

<div class="mb-3">
    <label>NIM</label>
    <input type="text" name="nim_nik" value="{{ $mahasiswa->nim_nik }}" class="form-control">
</div>

<div class="mb-3">
    <label>Password (opsional)</label>
    <input type="password" name="password" class="form-control">
</div>

<button class="btn btn-primary">Update</button>
<a href="{{ route('kaprodi.mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>

</form>
@endsection
