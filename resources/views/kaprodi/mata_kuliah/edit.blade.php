@extends('layouts.master')

@section('content')
<h4>Edit Mata Kuliah</h4>

<form method="POST" action="{{ route('kaprodi.mata-kuliah.update',$mk->id) }}">
@csrf
@method('PUT')

<input name="kode_mk" value="{{ $mk->kode_mk }}" class="form-control mb-2">
<input name="nama_mk" value="{{ $mk->nama_mk }}" class="form-control mb-2">
<input name="sks" value="{{ $mk->sks }}" class="form-control mb-2">
<input name="semester" value="{{ $mk->semester }}" class="form-control mb-2">

<button class="btn btn-primary">💾 Update</button>
</form>
@endsection
