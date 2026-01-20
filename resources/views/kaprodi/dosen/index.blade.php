@extends('layouts.master')

@section('title', 'Data Dosen')

@section('content')

<a href="{{ route('kaprodi.data-master') }}" class="btn btn-secondary mb-2">
        ← Kembali
    </a>

<h4 class="mb-3">Data Dosen</h4>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- BUTTON TAMBAH -->
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
    <i class="bi bi-plus-circle"></i> Tambah Dosen
</button>

<!-- TABLE -->
<table class="table table-bordered bg-white shadow-sm">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Bidang Keahlian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dosen as $dos)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $dos->name }}</td>
            <td>{{ $dos->nim_nik }}</td>
            <td>{{ $dos->bidang_keahlian }}</td>
            <td>
                <!-- EDIT -->
                <button class="btn btn-warning btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#edit{{ $dos->id }}">
                    <i class="bi bi-pencil"></i>
                </button>

                <!-- HAPUS -->
                <form action="{{ route('kaprodi.dosen.destroy', $dos->id) }}"
                      method="POST"
                      class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus mahasiswa?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>

        <!-- MODAL EDIT (WAJIB DI DALAM FOREACH) -->
        <div class="modal fade" id="edit{{ $dos->id }}" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ route('kaprodi.dosen.update', $dos->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Dosen</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-2">
                                <label>Nama</label>
                                <input type="text" name="name"
                                       class="form-control"
                                       value="{{ $dos->name }}" required>
                            </div>

                            <div class="mb-2">
                                <label>NIK</label>
                                <input type="text" name="nim_nik"
                                       class="form-control"
                                       value="{{ $dos->nim_nik }}" required>
                            </div>

                            <div class="mb-2">
                                <label>Bidang Keahlian</label>
                                <input type="text" name="bidang_keahlian"
                                       class="form-control"
                                       value="{{ $dos->bidang_keahlian }}" required>
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
        @endforeach
    </tbody>
</table>

<!-- MODAL TAMBAH (DI LUAR FOREACH) -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('kaprodi.dosen.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Dosen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-2">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-2">
                        <label> NIK</label>
                        <input type="text" name="nim_nik" class="form-control" required>
                    </div>

                    <div class="mb-2">
                        <label>Bidang Keahlian</label>
                        <input type="text" name="bidang_keahlian" class="form-control" required>
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

@endsection
