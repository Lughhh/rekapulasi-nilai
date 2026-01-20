@extends('layouts.app')

@section('content')
<div class="container">

    <a href="{{ route('kaprodi.dashboard') }}" class="btn btn-secondary mb-2">
        ← Kembali
    </a>

    <h4>Data Dosen</h4>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
        + Tambah Dosen
    </button>

    <table class="table table-bordered">
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
            @foreach ($dosen as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->name }}</td>
                <td>{{ $d->nim_nik }}</td>
                <td>{{ $d->bidang_keahlian }}</td>
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                        data-bs-target="#edit{{ $d->id }}">✏</button>

                    <form action="{{ route('kaprodi.dosen.destroy', $d->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">🗑</button>
                    </form>
                </td>
            </tr>

            @include('kaprodi.dosen.modal-edit')
            @endforeach
        </tbody>
    </table>
</div>

@include('kaprodi.dosen.modal-create')
@endsection
