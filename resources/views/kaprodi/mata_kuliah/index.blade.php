@extends('layouts.master')

@section('content')
<h4>Data Mata Kuliah</h4>

<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahMK">
+ Tambah Mata Kuliah
</button>

<table class="table table-bordered">
<tr>
<th>No</th><th>Kode</th><th>Nama</th><th>SKS</th><th>Aksi</th>
</tr>
@foreach($mataKuliah as $mk)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $mk->kode_mk }}</td>
<td>{{ $mk->nama_mk }}</td>
<td>{{ $mk->sks }}</td>
<td>
<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $mk->id }}">
✏️
</button>

<form action="{{ route('kaprodi.mata-kuliah.destroy',$mk->id) }}" method="POST" style="display:inline">
@csrf @method('DELETE')
<button class="btn btn-danger btn-sm">🗑️</button>
</form>
</td>
</tr>

{{-- MODAL EDIT --}}
<div class="modal fade" id="edit{{ $mk->id }}">
<div class="modal-dialog">
<form method="POST" action="{{ route('kaprodi.mata-kuliah.update',$mk->id) }}">
@csrf @method('PUT')
<div class="modal-content">
<div class="modal-header"><h5>Edit MK</h5></div>
<div class="modal-body">
<input name="kode_mk" value="{{ $mk->kode_mk }}" class="form-control mb-2">
<input name="nama_mk" value="{{ $mk->nama_mk }}" class="form-control mb-2">
<input name="sks" value="{{ $mk->sks }}" class="form-control">
</div>
<div class="modal-footer">
<button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
<button class="btn btn-primary">Update</button>
</div>
</div>
</form>
</div>
</div>
@endforeach
</table>

{{-- MODAL TAMBAH --}}
<div class="modal fade" id="tambahMK">
<div class="modal-dialog">
<form method="POST" action="{{ route('kaprodi.mata-kuliah.store') }}">
@csrf
<div class="modal-content">
<div class="modal-header"><h5>Tambah MK</h5></div>
<div class="modal-body">
<input name="kode_mk" class="form-control mb-2" placeholder="Kode MK">
<input name="nama_mk" class="form-control mb-2" placeholder="Nama MK">
<input name="sks" class="form-control" placeholder="SKS">
</div>
<div class="modal-footer">
<button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
<button class="btn btn-primary">Simpan</button>
</div>
</div>
</form>
</div>
</div>
@endsection
