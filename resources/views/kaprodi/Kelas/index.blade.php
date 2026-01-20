@extends('layouts.master')

@section('content')
<h4>Data Kelas</h4>

<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambahKelas">
    + Tambah Kelas
</button>


<table class="table table-bordered">
<thead>
<tr>
<th>No</th>
<th>Nama Kelas</th>
<th>Mata Kuliah</th>
<th>Dosen</th>
<th>Semester</th>
<th>Jumlah Mahasiswa</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach($kelas as $k)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $k->nama_kelas }}</td>
<td>{{ $k->mataKuliah->nama_mk }}</td>
<td>{{ $k->dosen->name ?? '-' }}</td>
<td>{{ $k->semester }}</td>
<td>{{ $k->jumlah_mahasiswa }}</td>
<td>
<form action="{{ route('kaprodi.kelas.destroy', $k->id) }}" 
      method="POST" 
      onsubmit="return confirm('Yakin hapus kelas?')">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger btn-sm">
        Hapus
    </button>
</form>

</td>
</tr>
@endforeach
</tbody>
</table>

{{-- MODAL TAMBAH --}}
<div class="modal fade" id="modalTambahKelas" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <form action="{{ route('kaprodi.kelas.store') }}" method="POST">
        @csrf

        <div class="modal-header">
          <h5 class="modal-title">Tambah Kelas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label>Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Mata Kuliah</label>
            <select name="mata_kuliah_id" class="form-control" required>
              <option value="">-- Pilih Mata Kuliah --</option>
              @foreach($matkul as $m)
                <option value="{{ $m->id }}">{{ $m->nama_mk }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label>Dosen</label>
            <select name="dosen_id" class="form-control" required>
              <option value="">-- Pilih Dosen --</option>
              @foreach($dosen as $d)
                <option value="{{ $d->id }}">{{ $d->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label>Semester</label>
            <input type="number" name="semester" class="form-control" required>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button class="btn btn-primary">Simpan</button>
        </div>

      </form>

    </div>
  </div>
</div>

@endsection
