@extends('layouts.master')
@section('title', 'Data Mahasiswa')

@section('content')
<div class="container">

    <a href="{{ route('kaprodi.data-master') }}" class="btn btn-secondary mb-2">
        ← Kembali
    </a>

<h4 class="mb-3">Data Mahasiswa</h4>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- BUTTON MODAL -->
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
    <i class="bi bi-plus-circle"></i> Tambah Mahasiswa
</button>

<!-- TABLE -->
<table class="table table-bordered bg-white shadow-sm">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Tahun Angkatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswa as $m)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $m->name }}</td>
                <td>{{ $m->nim_nik }}</td>
                <td>{{ $m->tahun_angkatan }}</td>
            </tr>


                <!-- EDIT -->
                <button class="btn btn-warning btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#edit{{ $m->id }}">
                    <i class="bi bi-pencil"></i>
                </button>

                <!-- HAPUS -->
                <form action="{{ route('kaprodi.mahasiswa.destroy', $m->id) }}"
                    method="POST" 
                    class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus mahasiswa?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('kaprodi.mahasiswa.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-2">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>NIM</label>
                        <input type="text" name="nim_nik" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>Tahun Angkatan</label>
                        <input type="number" name="tahun_angkatan" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>
                    

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="edit{{ $m->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('kaprodi.mahasiswa.update', $m->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-2">
                        <label>Nama</label>
                        <input type="text" name="name"
                               class="form-control"
                               value="{{ $m->name }}" required>
                    </div>

                    <div class="mb-2">
                        <label>NIM</label>
                        <input type="text" name="nim_nik"
                               class="form-control"
                               value="{{ $m->nim_nik }}" required>
                    </div>
                    <div class="mb-2">
                        <label>Tahun Angkatan</label>
                        <input type="text"
                            name="tahun_angkatan"
                            class="form-control"
                            placeholder="Contoh: 2023"
                            required>

                    </div>

                    <div class="mb-2">
                        <label>Password (opsional)</label>
                        <input type="password" name="password"
                               class="form-control"
                               placeholder="Kosongkan jika tidak diganti">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-warning">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
