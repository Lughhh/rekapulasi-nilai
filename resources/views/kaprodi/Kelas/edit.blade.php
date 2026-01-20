@extends('layouts.master')

@section('title', 'Edit Kelas')

@section('content')
<div class="container-fluid">
    <h4 class="mb-4">✏️ Edit Data Kelas</h4>

    {{-- ALERT ERROR VALIDASI --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="POST" action="{{ route('kaprodi.kelas.update', $kelas->id) }}">
                @csrf
                @method('PUT')

                {{-- NAMA KELAS --}}
                <div class="mb-3">
                    <label class="form-label">Nama Kelas</label>
                    <input
                        type="text"
                        name="nama_kelas"
                        class="form-control"
                        value="{{ old('nama_kelas', $kelas->nama_kelas) }}"
                        required
                    >
                </div>

                {{-- MATA KULIAH --}}
                <div class="mb-3">
                    <label class="form-label">Mata Kuliah</label>
                    <select name="mata_kuliah_id" class="form-control" required>
                        <option value="">-- Pilih Mata Kuliah --</option>
                        @foreach($mataKuliah as $mk)
                            <option value="{{ $mk->id }}"
                                {{ $kelas->mata_kuliah_id == $mk->id ? 'selected' : '' }}>
                                {{ $mk->kode_mk ?? '' }} - {{ $mk->nama_mk }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- DOSEN --}}
                <div class="mb-3">
                    <label class="form-label">Dosen Pengampu</label>
                    <select name="dosen_id" class="form-control" required>
                        <option value="">-- Pilih Dosen --</option>
                        @foreach($dosen as $d)
                            <option value="{{ $d->id }}"
                                {{ $kelas->dosen_id == $d->id ? 'selected' : '' }}>
                                {{ $d->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- JUMLAH MAHASISWA --}}
                <div class="mb-3">
                    <label class="form-label">Jumlah Mahasiswa</label>
                    <input
                        type="number"
                        name="jumlah_mahasiswa"
                        class="form-control"
                        value="{{ old('jumlah_mahasiswa', $kelas->jumlah_mahasiswa) }}"
                        min="0"
                    >
                </div>

                {{-- BUTTON --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('kaprodi.kelas.index') }}" class="btn btn-secondary">
                        ⬅️ Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        💾 Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
